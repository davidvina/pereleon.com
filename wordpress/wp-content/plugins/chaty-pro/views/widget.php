<?php
/* Initialize widget if widget is enable for current page */
$social = $this->get_social_icon_list();            // get active icon list
$cht_active = get_option("cht_active");

//$bg_color = $this->get_current_color();
// get custom background color for widget
$def_color = get_option('cht_color' . $this->widget_number);
$custom_color = get_option('cht_custom_color' . $this->widget_number);     // checking for custom color
if (!empty($custom_color)) {
    $color = $custom_color;
} else {
    $color = $def_color;
}
$bg_color = strtoupper($color);

$len = count($social);                              // get total active channels
$cta =nl2br(get_option('cht_cta'. $this->widget_number));
$cta = str_replace(array("\r","\n"),"",$cta);
$cta = esc_attr__(wp_unslash($cta));

$isPro = get_option('cht_token');                                 // is PRO version
$isPro = (empty($isPro) || $isPro == null)?0:1;

$positionSide = get_option('positionSide'.$this->widget_number);                             // get widget position
$cht_bottom_spacing = get_option('cht_bottom_spacing'.$this->widget_number);                 // get widget position from bottom
$cht_side_spacing = get_option('cht_side_spacing'.$this->widget_number);                     // get widget position from left/Right
$cht_widget_size = get_option('cht_widget_size'.$this->widget_number);                       // get widget size
$positionSide = empty($positionSide) ? 'right' : $positionSide;         // Initialize widget position if not exists
$cht_side_spacing = ($cht_side_spacing) ? $cht_side_spacing : '25';     // Initialize widget from left/Right if not exists
$cht_widget_size = ($cht_widget_size) ? $cht_widget_size : '54';        // Initialize widget size if not exists
$position = get_option('cht_position'.$this->widget_number);
$position = ($position) ? $position : 'right';                          // Initialize widget position if not exists
$total = $cht_side_spacing+$cht_widget_size+$cht_side_spacing;
$close_option = get_option("cht_close_settings".$this->widget_number);                       // get close button settings
$cht_bottom_spacing = ($cht_bottom_spacing) ? $cht_bottom_spacing : '25';   // Initialize widget bottom position if not exists
$cht_side_spacing = ($cht_side_spacing) ? $cht_side_spacing : '25';     // Initialize widget left/Right position if not exists
$image_id = "";
$close_text = "Hide";
$imageUrl = plugin_dir_url("")."chaty-pro/admin/assets/images/chaty-default.png";       // Initialize default image
$analytics = get_option("cht_google_analytics".$this->widget_number);                       // check for google analytics enable or not
$analytics = empty($analytics)?0:$analytics;                            // Initialize google analytics flag to 0 if not data not exists
if(isset($close_option['image_id'])) {
    $image_id = $close_option['image_id'];                              // check for close image id
}
if(isset($close_option['close_text'])) {
    $close_text = $close_option['close_text'];                          // check for close button text
}
if(empty($close_text)) {
    $close_text = "Hide";
}
$close_text = (wp_unslash($close_text));



$imageUrl = "";
if($image_id != "") {
    $image_data = wp_get_attachment_image_src($image_id, "full");
    if(!empty($image_data) && is_array($image_data)) {
        $imageUrl = $image_data[0];                                     // change close button image if exists
    }
}
$font_family = get_option('cht_widget_font'.$this->widget_number);
/* add inline css for custom position */
ob_start();
?>
<style>
<?php if($position == "left") { ?>
    #wechat-qr-code{left: {<?php esc_attr_e($total) ?>}px; right:auto;}
<?php } else if($position == "right") { ?>
    #wechat-qr-code{right: {<?php esc_attr_e($total) ?>}px; left:auto;}
<?php } else if($position == "custom") { ?>
    <?php if($positionSide == "left") { ?>
        #wechat-qr-code{left: {<?php esc_attr_e($total) ?>}px; right:auto;}
    <?php } else { ?>
        #wechat-qr-code{right: {<?php esc_attr_e($total) ?>}px; left:auto;}
    <?php } ?>
<?php } ?>
.chaty-widget-is a{display: block; margin:0; padding:0; }
.chaty-widget-is svg{margin:0; padding:0;}
.chaty-main-widget { display: none; }
.chaty-in-desktop .chaty-main-widget.is-in-desktop { display: block; }
.chaty-in-mobile .chaty-main-widget.is-in-mobile { display: block; }
.chaty-widget.hide-widget { display: none !important; }
<?php if(!empty($font_family)) { ?>
    .chaty-widget { font-family: <?php echo esc_attr($font_family) ?>; }
<?php } ?>
</style>
<?php
echo ob_get_clean();

$current_count = get_option("chaty_total_channel_click");
if($current_count === false || empty($current_count)) {
    $current_count = 0;
}
$current_count = intval($current_count);
$save_user_clicks = ($current_count < 35)?"1":"0";

/* widget setting array */
$settings = array();
$settings['isPRO'] = $isPro;
$settings['position'] = $position;;
$settings['social'] = $this->get_social_icon_list();
$settings['pos_side'] = $positionSide;
$settings['bot'] = $cht_bottom_spacing;
$settings['side'] = $cht_side_spacing;
$settings['device'] = $this->device();
$settings['color'] = ($bg_color) ? $bg_color : '#A886CD';
$settings['widget_size'] = $cht_widget_size;
$settings['widget_type'] = get_option('widget_icon'.$this->widget_number);
$settings['widget_img'] = $this->getCustomWidgetImg();
$settings['cta'] = $cta;
$settings['link_active'] = get_option('cht_credit'.$this->widget_number);
$settings['active'] = ($cht_active && $len >= 1) ? 'true' : 'false';
$settings['close_text'] = $close_text;
$settings['analytics'] = $analytics;
$settings['save_user_clicks'] = $save_user_clicks;
$settings['close_img'] = "";
$settings['is_mobile'] = (wp_is_mobile())?1:0;
$settings['ajax_url'] = admin_url('admin-ajax.php');
$data = array();
$data['object_settings'] = $settings;
if($len >= 1 && !empty($settings['social'])) {
    /* add js for front end widget */
    if(!empty($font_family)) {
        wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family='.urlencode($font_family), false );
    }
    wp_enqueue_script( "chaty-pro-front-end", CHT_PLUGIN_URL."js/cht-front-script.js", array( 'jquery' ), rand());
    wp_localize_script('chaty-pro-front-end', 'chaty_settings',  $data);
} ?>
