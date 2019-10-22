<?php
/*
  Plugin Name: Chaty Pro
  Contributors: galdub, tomeraharon
  Description: Chat with your website visitors via their favorite channels. Show a chat icon on the bottom of your site and communicate with your customers.
  Author: Premio
  Author URI: https://premio.io/downloads/chaty/
  Version: 2.2.9
  License: GPL2
*/

if (!defined('ABSPATH')) {
    wp_die(); // don't access directly
};

/* variables for chaty plugin */
define('CHT_PRO_FILE', __FILE__); // this file
define('CHT_PRO_OPT', 'chaty');
define('CHT_PRO_DIR', dirname(CHT_PRO_FILE)); // our directory
define('WCP_PRO_CHATY_BASE', plugin_basename(CHT_PRO_FILE ) );
define('CHT_PRO_ADMIN_INC', CHT_PRO_DIR . '/admin'); // admin path
define('CHT_PRO_FRONT_INC', CHT_PRO_DIR . '/frontend'); // frontend path
define('CHT_PRO_INC', CHT_PRO_DIR . '/includes'); // include folder path
define('CHT_PLUGIN_URL', plugins_url() . "/chaty-pro/"); // chaty plugin URL
define('CHT_CHATY_PLUGIN_ID', 185); // EDD: Item ID
define('CHT_CHATY_PLUGIN_URL', "https://go.premio.io/"); // Domain to activate/deactivate key
define('CHT_CURRENT_VERSION', "2.2.9"); // Plugin current version

if (!function_exists('wp_doing_ajax')) {
    function wp_doing_ajax()
    {
        /**
         * Filters whether the current request is a WordPress Ajax request.
         *
         * @since 4.7.0
         *
         * @param bool $wp_doing_ajax Whether the current request is a WordPress Ajax request.
         */
        return apply_filters('wp_doing_ajax', defined('DOING_AJAX') && DOING_AJAX);
    }
}

/* clear cache when any option is updated */
if(!function_exists("cht_clear_all_caches")) {
    function cht_clear_all_caches()
    {
        try {
            global $wp_fastest_cache;
            // if W3 Total Cache is being used, clear the cache
            if (function_exists('w3tc_flush_all')) {
                w3tc_flush_all();
                /* if WP Super Cache is being used, clear the cache */
            } else if (function_exists('wp_cache_clean_cache')) {
                global $file_prefix, $supercachedir;
                if (empty($supercachedir) && function_exists('get_supercache_dir')) {
                    $supercachedir = get_supercache_dir();
                }
                wp_cache_clean_cache($file_prefix);
            } else if (class_exists('WpeCommon')) {
                //be extra careful, just in case 3rd party changes things on us
                if (method_exists('WpeCommon', 'purge_memcached')) {
                    //WpeCommon::purge_memcached();
                }
                if (method_exists('WpeCommon', 'clear_maxcdn_cache')) {
                    //WpeCommon::clear_maxcdn_cache();
                }
                if (method_exists('WpeCommon', 'purge_varnish_cache')) {
                    //WpeCommon::purge_varnish_cache();
                }
            } else if (method_exists('WpFastestCache', 'deleteCache') && !empty($wp_fastest_cache)) {
                $wp_fastest_cache->deleteCache();
            } else if (function_exists('rocket_clean_domain')) {
                rocket_clean_domain();
                // Preload cache.
                if (function_exists('run_rocket_sitemap_preload')) {
                    run_rocket_sitemap_preload();
                }
            } else if (class_exists("autoptimizeCache") && method_exists("autoptimizeCache", "clearall")) {
                autoptimizeCache::clearall();
            } else if (class_exists("LiteSpeed_Cache_API") && method_exists("autoptimizeCache", "purge_all")) {
                LiteSpeed_Cache_API::purge_all();
            }

            if (class_exists( '\Hummingbird\Core\Utils' ) ) {
                $modules   = \Hummingbird\Core\Utils::get_active_cache_modules();
                foreach ( $modules as $module => $name ) {
                    $mod = \Hummingbird\Core\Utils::get_module( $module );
                    if ( $mod->is_active() ) {
                        if ( 'minify' === $module ) {
                            $mod->clear_files();
                        } else {
                            $mod->clear_cache();
                        }
                    }
                }
            }

        } catch (Exception $e) {
            return 1;
        }
    }
}

if(is_admin()) {
    require_once CHT_PRO_INC . '/class-review-box.php';
}

/* Chaty icon class*/
require_once CHT_PRO_INC . '/class-cht-icons.php';

/* Frontend widget class */
require_once CHT_PRO_INC . '/class-frontend.php';

/* EDD Plugin update class */
require_once CHT_PRO_INC . '/EDD_SL_Plugin_Updater.php';

/* EDD check for licence */
$licenseKey = get_option("cht_token");
if (!empty($licenseKey)) {
    /* EDD checking for plugin update is available on premio.io or not */
    $result = new Chaty_SL_Plugin_Updater(CHT_CHATY_PLUGIN_URL, __FILE__, array(
            'version' => CHT_CURRENT_VERSION,
            'license' => $licenseKey,
            'item_id' => CHT_CHATY_PLUGIN_ID,
            'item_name' => "Chaty",
            'author' => 'Premio.io',
            'url' => home_url(),
            'sslverify' => false
        )
    );
}

/* checking for chaty version directory on plugin folder on Pro plugin activation  */
register_activation_hook(CHT_PRO_FILE, 'check_for_chaty_free_version', 10);

/* checking for chaty free version */
function check_for_chaty_free_version() {

    /* check for existing value */
    $widgetSize = get_option('cht_numb_slug');
    $cht_devices = get_option('cht_devices');

    /* deactivating chaty free version if exists */
    if (is_plugin_active("chaty/cht-icons.php")) {
        deactivate_plugins("chaty/cht-icons.php");
    }

    $DS = DIRECTORY_SEPARATOR;
    $dirName = ABSPATH . "wp-content{$DS}plugins{$DS}chaty{$DS}";

    /* Remove free version files from wp-content/plugins to avoid conflict */
    cht_delete_directory($dirName);

    if (empty($widgetSize) && empty($cht_devices)) {
        $options = array(
            'mobile' => '1',
            'desktop' => '1',
        );

        update_option('cht_devices', $options);
        update_option('cht_active', '1');
        update_option('cht_position', 'right');
        update_option('cht_cta', 'Contact us');
        update_option('cht_numb_slug', ',Phone,Whatsapp');
        update_option('cht_social_whatsapp', '');
        update_option('cht_social_phone', '');
        update_option('cht_widget_size', '54');
        update_option('widget_icon', 'chat-base');
        update_option('cht_widget_img', '');
        update_option('cht_color', '#A886CD');
    }
}

/* initialize action to redirect user to Chaty setting page on activation */
add_action('activated_plugin', 'cht_pro_activation_redirect');

/* chaty PRO redirect function */
function cht_pro_activation_redirect($plugin)
{
    if ($plugin == plugin_basename(__FILE__)) {
        wp_safe_redirect(admin_url('admin.php?page=chaty-app'));
        exit;
    }
}

/* function to remove chaty free version files from wp-content/plugins */
function cht_delete_directory($dir) {
    global $wp_filesystem;
    // Initialize the WP filesystem, no more using 'file-put-contents' function
    if (empty($wp_filesystem)) {
        require_once (ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }
    global $wp_filesystem;

    if ($wp_filesystem->is_dir($dir)) {
        /* removing free version directory */
        $wp_filesystem->rmdir($dir, true);
    }
}

