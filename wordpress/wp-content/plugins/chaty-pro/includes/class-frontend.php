<?php

namespace CHT\frontend;

use CHT\admin\CHT_PRO_Admin_Base;
use CHT\admin\CHT_PRO_Social_Icons;

require_once CHT_PRO_ADMIN_INC . '/class-admin-base.php';
require_once CHT_PRO_ADMIN_INC . '/class-social-icons.php';

class CHT_PRO_Frontend extends CHT_PRO_Admin_Base {

    public $widget_number = "";
    /**
     * CHT_PRO_Frontend constructor.
     */
    public function __construct()
    {
        $this->socials = CHT_PRO_Social_Icons::get_instance()->get_icons_list();            // collecting default social media icons
        if (wp_doing_ajax()) {
            /* initialize function it is AJAX request */
            add_action('wp_ajax_choose_social', array($this, 'choose_social_handler'));     // return setting for a social media in html
            add_action('wp_ajax_remove_chaty_widget', array($this, 'remove_chaty_widget'));     // remove social media widget
        }
        add_action('wp_head', array($this, 'insert_widget'));                             // initialize widget in footer
        add_action('wp_ajax_chaty_check_for_mobile', array($this, 'chaty_check_for_mobile'));                             // initialize widget in footer
        add_action('wp_ajax_nopriv_chaty_check_for_mobile', array($this, 'chaty_check_for_mobile'));                             // initialize widget in footer

        add_action('wp_ajax_nopriv_chaty_update_counter', array($this, 'chaty_update_counter'));
        add_action('wp_ajax_chaty_update_counter', array($this, 'chaty_update_counter'));
    }

    public function chaty_update_counter() {
        $current_count = get_option("chaty_total_channel_click");
        if($current_count === false || empty($current_count)) {
            $current_count = 1;
            add_option("chaty_total_channel_click", $current_count);
        } else {
            $current_count = intval($current_count);
            $current_count++;
            update_option("chaty_total_channel_click", $current_count);
        }
        echo "true";
        die;
    }

    public function chaty_check_for_mobile() {
        if(wp_is_mobile()) {
            echo "yes";
        } else {
            echo "no";
        }
        wp_die();
    }

    /**
     *  Returns html for social media settings
     */

    /* function choose_social_handler start */
    public function choose_social_handler()
    {
        check_ajax_referer('cht_nonce_ajax', 'nonce_code');
        $social = filter_input(INPUT_POST, 'social', FILTER_SANITIZE_STRING);

            if ($social !== null && !empty($social)) {                         // get social media default setting if $social != null
            foreach ($this->socials as $item) {
                if ($item['slug'] == $social) {             // compare social media slug
                    break;
                }
            }

            if (!$item) {
                return;                                     // return if social media setting not found
            }

            $widget_index = filter_input(INPUT_POST, 'widget_index', FILTER_SANITIZE_STRING);

            $value = get_option('cht_social'.$widget_index.'_' . $social);   // get setting for media if already saved

            if (empty($value)) {
                $value = [
                    'value' => '',
                    'is_mobile' => 'checked',
                    'is_desktop' => 'checked'
                ];                                          // Initialize default values if not found
            } else {
                $value['is_desktop'] = isset($value['is_desktop']) ? $value['is_desktop'] : '';     // checking for desktop flag
                $value['is_mobile'] = isset($value['is_mobile']) ? $value['is_mobile'] : '';        // checking for mobile flag
            }

            if(!isset($social_opt['bg_color']) || empty($social_opt['bg_color'])) {
                $value['bg_color'] = $item['color'];                                                // Initialize background color value if not exists. 2.1.0 change
            }
            if(!isset($social_opt['image_id'])) {
                $value['image_id'] = '';                                                            // Initialize custom image id if not exists. 2.1.0 change
            }
            if(!isset($social_opt['title']) || $social_opt['title'] == "") {
                $value['title'] = $item['title'];                                                   // Initialize title if not exists. 2.1.0 change
            }

            $imageId = $value['image_id'];
            $imageUrl = "";
            $status = 0;
            if(!empty($imageId)) {
                $imageUrl = wp_get_attachment_image_src($imageId, "full")[0];                       // get custom image URL if exists
                $status = 1;
            }
            if($imageUrl == "") {
                $imageUrl = plugin_dir_url("")."chaty-pro/admin/assets/images/chaty-default.png";   // Initialize with default image if custom image is not exists
                $status = 0;
                $imageId = "";
            }
            if(isset($value['value'])) {
                $value['value'] = esc_attr__(wp_unslash($value['value']));
            }
            if(isset($value['title'])) {
                $value['title'] = esc_attr__(wp_unslash($value['title']));
            }
            ob_start();
            $is_pro = $this->is_pro();
            $class_name = $is_pro?"pro":"free";
            ?>
            <!-- Social media setting box: start -->
            <li data-id="<?php echo esc_attr($item['slug']) ?>" id="chaty-social-<?php echo esc_attr($item['slug']) ?>">
                <div class="channels-selected__item <?php esc_attr_e(($status)?"img-active":"") ?> <?php esc_attr_e($class_name) ?> 1 available">
                    <div class="chaty-default-settings">
                        <div class="move-icon">
                            <?php $image_url = plugin_dir_url("")."/chaty-pro/admin/assets/images/move-icon.png"; ?>
                            <img src="<?php echo esc_url($image_url) ?>" />
                        </div>
                        <div class="icon icon-md active" data-title="<?php esc_attr_e($item['title']); ?>">
                            <span style="" class="custom-chaty-image custom-image-<?php echo esc_attr($item['slug']) ?>" id="image_data_<?php echo esc_attr($item['slug']) ?>">
                                <img src="<?php echo esc_url($imageUrl) ?>" />
                                <span onclick="remove_chaty_image('<?php echo esc_attr($item['slug']) ?>')" class="remove-icon-img"></span>
                            </span>
                            <span class="default-chaty-icon custom-icon-<?php echo esc_attr($item['slug']) ?> default_image_<?php echo esc_attr($item['slug']) ?>" >
                                <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <?php echo $item['svg']; ?>
                                </svg>
                            </span>
                        </div>
                        <!-- Social Media input  -->
                        <div class="channels__input-box">
                            <input type="text" class="channels__input" name="cht_social_<?php echo esc_attr($item['slug']); ?>[value]" value="<?php esc_attr_e($value['value']); ?>" data-gramm_editor="false" id="<?php echo esc_attr($item['slug']); ?>" />
                        </div>
                        <?php
                        $channel_id = $this->del_space($item['slug']);
                        $channel_id = str_replace(' ', '_', $channel_id);
                        $channel_slug = strtolower($channel_id);
                        ?>
                        <div>
                            <!-- setting for desktop -->
                            <label class="channels__view" for="<?php echo esc_attr($channel_id); ?>Desktop">
                                <input type="checkbox" id="<?php echo esc_attr($channel_id); ?>Desktop" class="channels__view-check js-chanel-icon js-chanel-desktop" data-type="<?php esc_attr_e($channel_slug) ?>" name="cht_social_<?php echo esc_attr($item['slug']); ?>[is_desktop]" value="checked" data-gramm_editor="false" <?php esc_attr_e($value['is_desktop']) ?> >
                                <span class="channels__view-txt">Desktop</label>
                            </label>

                            <!-- setting for mobile -->
                            <label class="channels__view" for="<?php echo esc_attr($channel_id); ?>Mobile" >
                                <input type="checkbox" id="<?php echo esc_attr($channel_id); ?>Mobile" class="channels__view-check js-chanel-icon js-chanel-mobile" data-type="<?php esc_attr_e($channel_slug); ?>" name="cht_social_<?php echo esc_attr($item['slug']); ?>[is_mobile]" value="checked" data-gramm_editor="false" <?php esc_attr_e($value['is_mobile']) ?> />
                                <span class="channels__view-txt">Mobile</span>
                            </label>
                        </div>

                        <!-- button for advance setting -->
                        <div class="chaty-settings" onclick="toggle_chaty_setting('<?php echo esc_attr($item['slug']); ?>')">
                            <a href="javascript:;"><span class="dashicons dashicons-admin-generic"></span></a>
                        </div>

                        <!-- example for social media -->
                        <div class="input-example">
                            <?php esc_attr_e('For example', CHT_PRO_OPT); ?>: <?php esc_attr_e($item['example']); ?>
                        </div>

                        <!-- checking for extra help message for social media -->
                        <?php if((isset($item['help']) && !empty($item['help'])) || isset($item['help_link'])) { ?>
                            <div class="viber-help">
                                <?php if(isset($item['help_link'])) { ?>
                                    <?php $help_text = isset($item['help_title'])?$item['help_title']:"Doesn't work?"; ?>
                                    <a href="<?php echo esc_url($item['help_link']) ?>" target="_blank"><?php esc_attr_e($help_text); ?></a>
                                <?php } else { ?>
                                    <?php $help_title = isset($item['help_title'])?$item['help_title']:"Doesn't work?" ?>
                                    <span><?php echo $item['help']; ?></span>
                                    <?php esc_attr_e($help_title) ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- advance setting fields: start -->
                    <div class="chaty-advance-settings">
                        <!-- Settings for custom icon and color -->
                        <div class="chaty-setting-col">
                            <label>Icon Appearance</label>
                            <div>
                                <!-- input for custom color -->
                                <input type="text" name="cht_social_<?php echo esc_attr($item['slug']); ?>[bg_color]" class="chaty-color-field" value="<?php esc_attr_e($value['bg_color']) ?>" />

                                <!-- button to upload custom image -->
                                <a onclick="upload_chaty_image('<?php echo esc_attr($item['slug']); ?>')" href="javascript:;" class="upload-chaty-icon"><span class="dashicons dashicons-upload"></span> Custom Image</a>

                                <!-- hidden input value for image -->
                                <input id="cht_social_image_<?php echo esc_attr($item['slug']); ?>" type="hidden" name="cht_social_<?php echo esc_attr($item['slug']); ?>[image_id]" value="<?php esc_attr_e($imageId) ?>" />
                            </div>
                        </div>
                        <div class="clear clearfix"></div>

                        <!-- Settings for custom title -->
                        <div class="chaty-setting-col">
                            <label>On Hover Text</label>
                            <div>
                                <!-- input for custom title -->
                                <input type="text" name="cht_social_<?php echo esc_attr($item['slug']); ?>[title]" value="<?php esc_attr_e($value['title']) ?>">
                            </div>
                        </div>
                        <div class="clear clearfix"></div>

                        <?php if($item['slug'] == "Whatsapp") { ?>
                            <!-- advance setting for Whatsapp -->
                            <div class="clear clearfix"></div>
                            <div class="chaty-setting-col">
                                <label>Pre Set Message</label>
                                <div>
                                    <?php $pre_set_message = isset($value['pre_set_message'])?$value['pre_set_message']:""; ?>
                                    <input id="cht_social_message_<?php echo esc_attr($item['slug']); ?>" type="text" name="cht_social_<?php echo esc_attr($item['slug']); ?>[pre_set_message]" value="<?php esc_attr_e($pre_set_message) ?>" >
                                </div>
                            </div>
                        <?php } else if($item['slug'] == "Email") { ?>
                            <!-- advance setting for Email -->
                            <div class="clear clearfix"></div>
                            <div class="chaty-setting-col">
                                <label>Mail Subject</label>
                                <div>
                                    <?php $mail_subject = isset($value['mail_subject'])?$value['mail_subject']:"" ?>
                                    <input id="cht_social_message_<?php echo esc_attr($item['slug']); ?>" type="text" name="cht_social_<?php echo esc_attr($item['slug']); ?>[mail_subject]" value="<?php esc_attr_e($mail_subject) ?>" >
                                </div>
                            </div>
                        <?php } else if($item['slug'] == "WeChat") { ?>
                            <!-- advance setting for WeChat -->
                            <?php
                            $qr_code = isset($value['qr_code'])?$value['qr_code']:"";                   // Initialize QR code value if not exists. 2.1.0 change
                            $imageUrl = "";
                            $status = 0;
                            if($qr_code != "") {
                                $imageUrl = wp_get_attachment_image_src($qr_code, "full")[0];           // get custom Image URL if exists
                            }
                            if($imageUrl == "") {
                                $imageUrl = plugin_dir_url("")."chaty-pro/admin/assets/images/chaty-default.png";       // Initialize with default image URL if URL is not exists
                            } else {
                                $status = 1;
                            }
                            ?>
                            <div class="clear clearfix"></div>
                            <div class="chaty-setting-col">
                                <label>Upload QR Code</label>
                                <div>
                                    <!-- Button to upload QR Code image -->
                                    <a class="cht-upload-image <?php esc_attr_e(($status)?"active":"") ?>" id="upload_qr_code" href="javascript:;" onclick="upload_qr_code()">
                                        <img id="cht_social_image_src_<?php echo esc_attr($item['slug']); ?>" src="<?php echo esc_url($imageUrl) ?>" alt="<?php esc_attr_e($value['title']) ?>">
                                        <span class="dashicons dashicons-upload"></span>
                                    </a>

                                    <!-- Button to remove QR Code image -->
                                    <a href="javascript:;" class="remove-qr-code <?php esc_attr_e(($status)?"active":"") ?>" onclick="remove_qr_code()"><span class="dashicons dashicons-no-alt"></span></a>

                                    <!-- input hidden field for QR Code -->
                                    <input id="upload_qr_code_val" type="hidden" name="cht_social_<?php echo esc_attr($item['slug']); ?>[qr_code]" value="<?php esc_attr_e($qr_code) ?>" >
                                </div>
                            </div>
                        <?php } else if($item['slug'] == "Link" || $item['slug'] == "Custom_Link") {
                            $is_checked = (!isset($value['new_window']) || $value['new_window'] == 1)?1:0;
                            ?>
                            <!-- Advance setting for Custom Link -->
                            <div class="clear clearfix"></div>
                            <div class="chaty-setting-col">
                                <label >Open In a New Tab</label>
                                <div>
                                    <input type="hidden" name="cht_social_<?php echo esc_attr($item['slug']); ?>[new_window]" value="0" >
                                    <label class="channels__view" for="cht_social_window_<?php echo esc_attr($item['slug']); ?>">
                                        <input id="cht_social_window_<?php echo esc_attr($item['slug']); ?>" type="checkbox" class="channels__view-check" name="cht_social_<?php echo esc_attr($item['slug']); ?>[new_window]" value="1" <?php checked($is_checked, "checked"); ?> >
                                        <span class="channels__view-txt">&nbsp;</span>
                                    </label>
                                </div>
                            </div>
                        <?php } else if($item['slug'] == "Linkedin") {
                            $is_checked = isset($value['link_type'])?$value['link_type']:"personal";
                            ?>
                            <!-- Advance setting for Custom Link -->
                            <div class="clear clearfix"></div>
                            <div class="chaty-setting-col">
                                <label >LinkedIn</label>
                                <div>
                                    <label>
                                        <input type="radio" <?php checked($is_checked, "personal") ?> name="cht_social_<?php echo esc_attr($item['slug']); ?>[link_type]" value="personal">
                                        Personal
                                    </label>
                                    <label>
                                        <input type="radio" <?php checked($is_checked, "company") ?> name="cht_social_<?php echo esc_attr($item['slug']); ?>[link_type]" value="company">
                                        Company
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(!$this->is_pro()) { ?>
                            <div class="chaty-pro-feature">
                                <a target="_blank" href="<?php echo esc_url($this->getUpgradeMenuItemUrl()) ?>">
                                    <?php esc_attr_e('Activate your license key', CHT_PRO_OPT); ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- advance setting fields: end -->

                    <!-- remove social media setting button: start -->
                    <button class="btn-cancel" data-social="<?php echo esc_attr($item['slug']); ?>">
                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect width="15.6301" height="2.24494" rx="1.12247" transform="translate(2.26764 0.0615997) rotate(45)" fill="white"/>
                            <rect width="15.6301" height="2.24494" rx="1.12247" transform="translate(13.3198 1.649) rotate(135)" fill="white"/>
                        </svg>
                    </button>
                    <!-- remove social media setting button: end -->
                </div>
            </li>
            <!-- Social media setting box: end -->
            <?php
            $html = ob_get_clean();
            echo json_encode($html);
        }
        wp_die();
    }
    /* function choose_social_handler end */

    public function remove_chaty_widget() {
        $widget_index = filter_input(INPUT_REQUEST, 'widget_index', FILTER_SANITIZE_STRING);
        if(isset($widget_index) && !empty($widget_index)) {

            $index = $widget_index;
            $index = trim($index, "_");

            $deleted_list = get_option("chaty_deleted_settings");
            if(empty($deleted_list) || !is_array($deleted_list)) {
                $deleted_list = array();
            }

            if(!in_array($index, $deleted_list)) {
                $deleted_list[] = $index;
                update_option("chaty_deleted_settings", $deleted_list);
            }

            echo esc_url(admin_url("admin.php?page=chaty-app"));
            exit;
        }
    }

    /* get social media list for front end widget */
    public function get_social_icon_list()
    {
        $social = get_option('cht_numb_slug'.$this->widget_number); // get saved social media list
        $social = explode(",", $social);

        $arr = array();
        foreach ($social as $key_soc):
            foreach ($this->socials as $key => $social) :       // compare with Default Social media list
                if ($social['slug'] != $key_soc) {
                    continue;                                   // return if slug is not equal
                }
                $value = get_option('cht_social'.$this->widget_number.'_' . $social['slug']);   //  get saved settings for button
                if ($value) {
                    if (!empty($value['value'])) {
                        $slug = strtolower($social['slug']);
                        $url = "";
                        $desktop_target = "";
                        $mobile_target = "";
                        $qr_code_image = "";

                        if($social['slug'] == "Viber") {
                            /* Viber change to exclude + from number for desktop */
                            $val = $value['value'];
                            $fc = substr($val, 0, 1);
                            if($fc == "+") {
                                $length = -1*(strlen($val)-1);
                                $val = substr($val, $length);
                            }
                            if(!wp_is_mobile()) {
                                /* Viber change to include + from number for mobile */
                                $val = "+".$val;
                            }
                        } else if($social['slug'] == "Whatsapp") {
                            /* Whatspp change to exclude + from phone number */
                            $val = $value['value'];
                            $val = str_replace("+","", $val);
                        } else if($social['slug'] == "Facebook_Messenger") {
                            /* Facebook change to change URL from facebook.com to m.me version 2.1.0 change */
                            $val = $value['value'];
                            $val = str_replace("facebook.com","m.me", $val);
                            /* Facebook change to remove www. from URL. version 2.1.0 change */
                            $val = str_replace("www.","", $val);

                            $val = trim($val, "/");
                            $val_array = explode("/", $val);
                            $total = count($val_array)-1;
                            $last_value = $val_array[$total];
                            $last_value = explode("-", $last_value);
                            $total_text = count($last_value)-1;
                            $total_text = $last_value[$total_text];

                            if(is_numeric($total_text)) {
                                $val_array[$total] = $total_text;
                                $val = implode("/", $val_array);
                            }
                        } else {
                            $val = $value['value'];
                        }
                        if(!isset($value['title']) || empty($value['title'])) {
                            $value['title'] = $social['title'];         // Initialize title with default title if not exists. version 2.1.0 change
                        }
                        $image_url = "";

                        /* get custom image URL if uploaded. version 2.1.0 change */
                        if(isset($value['image_id']) && !empty($value['image_id'])) {
                            $image_id = $value['image_id'];
                            if(!empty($image_id)) {
                                $image_data = wp_get_attachment_image_src($image_id, "full");
                                if(!empty($image_data) && is_array($image_data)) {
                                    $image_url = $image_data[0];
                                }
                            }
                        }

                        /* get custom icon background color if exists. version 2.1.0 change */
                        if(!isset($value['bg_color']) || empty($value['bg_color'])) {
                            $value['bg_color'] = '';
                        }
                        if($slug == "whatsapp") {
                            /* setting for Whatsapp URL */
                            $val = str_replace("+","",$val);
                            $url = "https://api.whatsapp.com/send?phone=".$val;
                            if(isset($value['pre_set_message']) && !empty($value['pre_set_message'])) {
                                $url .= "&text=".$value['pre_set_message'];
                            }
                            if(wp_is_mobile()) {
                                $mobile_target = "";
                            } else {
                                $desktop_target = "_blank";
                            }
                        } else if($slug == "phone") {
                            /* setting for Phone */
                            $url = "tel: ".$val;
                        } else if($slug == "sms") {
                            /* setting for SMS */
                            $url = "sms:".$val;
                        } else if($slug == "telegram") {
                            /* setting for Telegram */
                            $url = "https://telegram.me/".$val;
                            $desktop_target = "_blank";
                            $mobile_target = "_blank";
                        } else if($slug == "line" || $slug == "google_maps" || $slug == "poptin" || $slug == "waze" ) {
                            /* setting for Line, Google Map, Link, Poptin, Waze, Custom Link */
                            $url = esc_url($val);
                            $desktop_target = "_blank";
                            $mobile_target = "_blank";
                        } else if($slug == "link" || $slug == "custom_link") {
                            $url = $val;
                            $is_exist = strpos($val, "javascript");
                            if($is_exist != "") {
                                $url = esc_url($val);
                            } else {
                                if($slug == "custom_link" || $slug == "link") {
                                    $desktop_target = (isset($value['new_window']) && $value['new_window'] == 0)?"":"_blank";
                                    $mobile_target = (isset($value['new_window']) && $value['new_window'] == 0)?"":"_blank";
                                }
                            }
                        }else if($slug == "wechat") {
                            /* setting for WeChat */
                            $url = "javascript:;";
                            $value['title'] .= ": ".$val;
                            $qr_code = isset($value['qr_code'])?$value['qr_code']:"";
                            if(!empty($qr_code)) {
                                $image_data = wp_get_attachment_image_src($qr_code, "full");
                                if(!empty($image_data) && is_array($image_data)) {
                                    $qr_code_image = $image_data[0];
                                }
                            }
                        } else if($slug == "viber") {
                            /* setting for Viber */
                            $url = "viber://chat?number=".$val;
                        } else if($slug == "snapchat") {
                            /* setting for SnapChat */
                            $url = "https://www.snapchat.com/add/".$val;
                            $desktop_target = "_blank";
                            $mobile_target = "_blank";
                        } else if($slug == "waze") {
                            /* setting for Waze */
                            $url = "javascript:;";
                            $value['title'] .= ": ".$val;
                        } else if($slug == "vkontakte") {
                            /* setting for vkontakte */
                            $url = "https://vk.me/".$val;
                            $desktop_target = "_blank";
                            $mobile_target = "_blank";
                        } else if($slug == "skype") {
                            /* setting for Skype */
                            $url = "skype:".$val."?chat";
                        } else if($slug == "email") {
                            /* setting for Email */
                            $url = "mailto:".$val;
                            $mail_subject = (isset($value['mail_subject']) && !empty($value['mail_subject']))?$value['mail_subject']:"";
                            if($mail_subject != "") {
                                $url .= "?subject=".$mail_subject;
                            }
                        } else if($slug == "facebook_messenger") {
                            /* setting for facebook URL */
                            $url = esc_url($val);
                            $url = str_replace("http:", "https:", $url);
                            if(wp_is_mobile()) {
                                $mobile_target = "";
                            } else {
                                $desktop_target = "_blank";
                            }
                        } else if($slug == "twitter") {
                            /* setting for Twitter */
                            $url = "https://twitter.com/".$val;
                            $desktop_target = "_blank";
                            $mobile_target = "_blank";
                        } else if($slug == "instagram") {
                            /* setting for Instagram */
                            $url = "https://www.instagram.com/".$val;
                            $desktop_target = "_blank";
                            $mobile_target = "_blank";
                        } else if($slug == "linkedin") {
                            /* setting for Linkedin */
                            $link_type = !isset($value['link_type']) || $value['link_type'] == "company"?"company":"personal";
                            if($link_type == "personal") {
                                $url = "https://www.linkedin.com/in/".$val;
                            } else {
                                $url = "https://www.linkedin.com/company/".$val;
                            }
                            $desktop_target = "_blank";
                            $mobile_target = "_blank";
                        }

                        /* Instagram checking for custom color */
                        if($slug == "instagram" && $value['bg_color'] == "#ffffff") {
                            $value['bg_color'] = "";
                        }

                        $svg = trim(preg_replace('/\s\s+/', '', $social['svg']));

                        $is_mobile = isset($value['is_mobile']) ? 1 : 0;
                        $is_desktop = isset($value['is_desktop']) ? 1 : 0;

                        $data = array(
                            'val' => esc_attr__(wp_unslash($val)),
                            'default_icon' => $svg,
                            'bg_color' => $value['bg_color'],
                            'title' => esc_attr__(wp_unslash($value['title'])),
                            'img_url' => esc_url($image_url),
                            'social_channel' => $slug,
                            'href_url' => $url,
                            'desktop_target' => $desktop_target,
                            'mobile_target' => $mobile_target,
                            'qr_code_image' => esc_url($qr_code_image),
                            'channel' => $social['slug'],
                            'is_mobile' => $is_mobile,
                            'is_desktop' => $is_desktop
                        );
                        $arr[] = $data;
                    }
                }
            endforeach;
        endforeach;
        return $arr;
    }

    /* add widget to fron end */
    public function insert_widget()
    {
        if ($this->canInsertWidget()):      /* checking for widget is active or not */
            include_once CHT_PRO_DIR . '/views/widget.php';
        endif;
    }

    public function check_for_url() {
        $page_options = get_option("cht_page_settings".$this->widget_number);
        $or_flag = 1;       // for page Rule contain
        /* checking for page visibility settings */
        if (!empty($page_options) && is_array($page_options)) {
            $server = $_SERVER;

            $link = (isset($server['HTTPS']) && $server['HTTPS'] === 'on' ? "https" : "http") . "://" .$server['HTTP_HOST'] . $server['REQUEST_URI'];
            $site_url = site_url("/");
            $request_url = substr($link, strlen($site_url));
            $url = trim($request_url, "/");
            $url = strtolower($url);
            $or_flag = 0;
            $total_option = count($page_options);
            $options = 0;
            /* checking for each page options */
            foreach ($page_options as $option) {
                $key = $option['option'];
                $value = trim(strtolower($option['value']));
                if ($key != '' && $value != '') {
                    if($option['shown_on'] == "show_on") {
                        $value = trim($value, "/");
                        switch ($key) {
                            case 'page_contains':
                                $index = strpos($url, $value);
                                if($index !== false) {
                                    $or_flag = 1;
                                }
                                break;
                            case 'page_has_url':
                                if ($url === $value) {
                                    $or_flag = 1;
                                }
                                break;
                            case 'page_start_with':
                                $length = strlen($value);
                                $result = substr($url, 0, $length);
                                if ($result == $value) {
                                    $or_flag = 1;
                                }
                                break;
                            case 'page_end_with':
                                $length = strlen($value);
                                $result = substr($url, (-1) * $length);
                                if ($result == $value) {
                                    $or_flag = 1;
                                }
                                break;
                        }
                    } else {
                        $options++;
                    }
                }
            }
            if($total_option == $options) {
                $or_flag = 1;
            }
            foreach ($page_options as $option) {
                $key = $option['option'];
                $value = trim(strtolower($option['value']));
                if ($key != '' && $option['shown_on'] == "not_show_on" && $value != '') {
                    $value = trim($value, "/");
                    switch ($key) {
                        case 'page_contains':
                            $index = strpos($url, $value);
                            if($index !== false) {
                                $or_flag = 0;
                            }
                            break;
                        case 'page_has_url':
                            if ($url === $value) {
                                $or_flag = 0;
                            }
                            break;
                        case 'page_start_with':
                            $length = strlen($value);
                            $result = substr($url, 0, $length);
                            if ($result == $value) {
                                $or_flag = 0;
                            }
                            break;
                        case 'page_end_with':
                            $length = strlen($value);
                            $result = substr($url, (-1) * $length);
                            if ($result == $value) {
                                $or_flag = 0;
                            }
                            break;
                    }
                }
            }
        }
        return $or_flag;
    }

    /* returns for widget is active or not */
    private function canInsertWidget() {

        $status = get_option('cht_active') && $this->checkChannels() && $this->check_for_url();

        if($status) {
            return true;
        } else {
            $deleted_list = get_option("chaty_deleted_settings");
            if (empty($deleted_list) || !is_array($deleted_list)) {
                $deleted_list = array();
            }

            $chaty_widgets = get_option("chaty_total_settings");
            if (!empty($chaty_widgets) && $chaty_widgets != null && is_numeric($chaty_widgets) && $chaty_widgets > 0) {
                for ($i = 1; $i <= $chaty_widgets; $i++) {
                    if (!in_array($i, $deleted_list)) {
                        $this->widget_number = "_".$i;
                        $status = get_option('cht_active_'.$i) && $this->checkChannels() && $this->check_for_url();
                        if($status) {
                            return true;
                        }
                    }
                }
            }
            return false;
        }
    }

    /* checking for social channels */
    private function checkChannels() {
        $social = explode(",", get_option('cht_numb_slug'.$this->widget_number));
        $res = false;
        foreach ($social as $name) {
            $value = get_option('cht_social'.$this->widget_number.'_' . strtolower($name));
            $res = $res || !empty($value['value']);
        }
        return $res;
    }
}

return new CHT_PRO_Frontend();
