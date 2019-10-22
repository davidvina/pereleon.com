<div class="preview-section-chaty">
<div class="preview" id="admin-preview">
    <h2><?php esc_attr_e('Preview', CHT_PRO_OPT); ?>:</h2>

    <div class="page">
        <div class="page-header">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <svg width="33" height="38" viewBox="0 0 33 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d)">
                    <ellipse cx="0.855225" cy="0.745508" rx="0.855225" ry="0.745508" transform="translate(15.6492 13.0053) scale(1 -1)" fill="#828282"/>
                </g>
                <g filter="url(#filter1_d)">
                    <ellipse cx="0.855225" cy="0.745508" rx="0.855225" ry="0.745508" transform="translate(15.6492 15.6891) scale(1 -1)" fill="#828282"/>
                </g>
                <g filter="url(#filter2_d)">
                    <ellipse cx="0.855225" cy="0.745508" rx="0.855225" ry="0.745508" transform="translate(15.6492 18.373) scale(1 -1)" fill="#828282"/>
                </g>
                <defs>
                    <filter id="filter0_d" x="0.64917" y="0.514328" width="31.7105" height="31.491" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 255 0"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                    <filter id="filter1_d" x="0.64917" y="3.1981" width="31.7105" height="31.491" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 255 0"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                    <filter id="filter2_d" x="0.64917" y="5.88202" width="31.7105" height="31.491" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 255 0"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                </defs>
            </svg>
        </div>

        <?php $position = $this->get_position_style(); ?>
        <div class="page-body">
            <div class="chaty-widget chaty-widget-icons-<?php if (get_option('cht_position'.$this->widget_index) == "custom") {
                esc_attr_e(get_option('positionSide'.$this->widget_index));
            } else {
                esc_attr_e(get_option('cht_position'.$this->widget_index));
            } ?>  " style="<?php esc_attr_e($position); ?>">
                <?php $cht_cta = get_option('cht_cta'.$this->widget_index) ? get_option('cht_cta'.$this->widget_index) : 'Contact Us'; ?>
                <div class="icon icon-xs active tooltip-show tooltip"
                     data-title="<?php esc_attr_e($cht_cta) ?>">
                    <i id="iconWidget">
                        <?php $bg_color = $this->get_current_color(); ?>
                        <?php $fill = ($bg_color) ? $bg_color : '#A886CD'; ?>
                        <?php $widgetIcon = esc_attr__(get_option('widget_icon'.$this->widget_index)); ?>
                        <?php if (esc_attr__(get_option('widget_icon'.$this->widget_index)) == 'chat-base'): ?>
                            <svg version="1.1" id="ch"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-496 507.7 54 54" style="enable-background:new -496 507.7 54 54;" xml:space="preserve">
                                <style type="text/css">
                                    .st1 {
                                        fill: #FFFFFF;
                                    }
                                    .st0 {
                                        fill: #808080;
                                    }
                                </style>
                                <g><circle cx="-469" cy="534.7" r="27" fill="<?php esc_attr_e($fill) ?>"/></g>
                                <path class="st1" d="M-459.9,523.7h-20.3c-1.9,0-3.4,1.5-3.4,3.4v15.3c0,1.9,1.5,3.4,3.4,3.4h11.4l5.9,4.9c0.2,0.2,0.3,0.2,0.5,0.2 h0.3c0.3-0.2,0.5-0.5,0.5-0.8v-4.2h1.7c1.9,0,3.4-1.5,3.4-3.4v-15.3C-456.5,525.2-458,523.7-459.9,523.7z"/>
                                <path class="st0" d="M-477.7,530.5h11.9c0.5,0,0.8,0.4,0.8,0.8l0,0c0,0.5-0.4,0.8-0.8,0.8h-11.9c-0.5,0-0.8-0.4-0.8-0.8l0,0C-478.6,530.8-478.2,530.5-477.7,530.5z"/>
                                <path class="st0" d="M-477.7,533.5h7.9c0.5,0,0.8,0.4,0.8,0.8l0,0c0,0.5-0.4,0.8-0.8,0.8h-7.9c-0.5,0-0.8-0.4-0.8-0.8l0,0C-478.6,533.9-478.2,533.5-477.7,533.5z"/>
                            </svg>
                        <?php endif; ?>
                        <?php if (esc_attr__(get_option('widget_icon'.$this->widget_index)) == 'chat-smile'): ?>
                            <svg version="1.1" id="smile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-496.8 507.1 54 54" style="enable-background:new -496.8 507.1 54 54;" xml:space="preserve">
                                <style type="text/css">.st1 {
                                        fill: #FFFFFF;
                                    }
                                    .st2 {
                                        fill: none;
                                        stroke: #808080;
                                        stroke-width: 1.5;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                    }
                                </style>
                                <g>
                                    <circle cx="-469.8" cy="534.1" r="27" fill="<?php esc_attr_e($fill) ?>"/>
                                </g>
                                <path class="st1" d="M-459.5,523.5H-482c-2.1,0-3.7,1.7-3.7,3.7v13.1c0,2.1,1.7,3.7,3.7,3.7h19.3l5.4,5.4c0.2,0.2,0.4,0.2,0.7,0.2 c0.2,0,0.2,0,0.4,0c0.4-0.2,0.6-0.6,0.6-0.9v-21.5C-455.8,525.2-457.5,523.5-459.5,523.5z"/>
                                <path class="st2" d="M-476.5,537.3c2.5,1.1,8.5,2.1,13-2.7"/>
                                <path class="st2" d="M-460.8,534.5c-0.1-1.2-0.8-3.4-3.3-2.8"/>
                            </svg>
                        <?php endif; ?>
                        <?php if (esc_attr__(get_option('widget_icon'.$this->widget_index)) == 'chat-bubble'): ?>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-496.9 507.1 54 54" style="enable-background:new -496.9 507.1 54 54;" xml:space="preserve">
                                <style type="text/css">.st1 {
                                    fill: #FFFFFF;
                                }</style>
                                <g>
                                    <circle cx="-469.9" cy="534.1" r="27" fill="<?php esc_attr_e($fill) ?>"/>
                                </g>
                                <path class="st1" d="M-472.6,522.1h5.3c3,0,6,1.2,8.1,3.4c2.1,2.1,3.4,5.1,3.4,8.1c0,6-4.6,11-10.6,11.5v4.4c0,0.4-0.2,0.7-0.5,0.9 c-0.2,0-0.2,0-0.4,0c-0.2,0-0.5-0.2-0.7-0.4l-4.6-5c-3,0-6-1.2-8.1-3.4s-3.4-5.1-3.4-8.1C-484.1,527.2-478.9,522.1-472.6,522.1z M-462.9,535.3c1.1,0,1.8-0.7,1.8-1.8c0-1.1-0.7-1.8-1.8-1.8c-1.1,0-1.8,0.7-1.8,1.8C-464.6,534.6-463.9,535.3-462.9,535.3z M-469.9,535.3c1.1,0,1.8-0.7,1.8-1.8c0-1.1-0.7-1.8-1.8-1.8c-1.1,0-1.8,0.7-1.8,1.8C-471.7,534.6-471,535.3-469.9,535.3z M-477,535.3c1.1,0,1.8-0.7,1.8-1.8c0-1.1-0.7-1.8-1.8-1.8c-1.1,0-1.8,0.7-1.8,1.8C-478.8,534.6-478.1,535.3-477,535.3z"/>
                            </svg>
                        <?php endif; ?>
                        <?php if (esc_attr__(get_option('widget_icon'.$this->widget_index)) == 'chat-db'): ?>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-496 507.1 54 54" style="enable-background:new -496 507.1 54 54;" xml:space="preserve">
                                <style type="text/css">.st1 {
                                    fill: #FFFFFF;
                                }</style>
                                <g>
                                    <circle cx="-469" cy="534.1" r="27" fill="<?php esc_attr_e($fill) ?>"/>
                                </g>
                                <path class="st1" d="M-464.6,527.7h-15.6c-1.9,0-3.5,1.6-3.5,3.5v10.4c0,1.9,1.6,3.5,3.5,3.5h12.6l5,5c0.2,0.2,0.3,0.2,0.7,0.2 c0.2,0,0.2,0,0.3,0c0.3-0.2,0.5-0.5,0.5-0.9v-18.2C-461.1,529.3-462.7,527.7-464.6,527.7z"/>
                                <path class="st1" d="M-459.4,522.5H-475c-1.9,0-3.5,1.6-3.5,3.5h13.9c2.9,0,5.2,2.3,5.2,5.2v11.6l1.9,1.9c0.2,0.2,0.3,0.2,0.7,0.2 c0.2,0,0.2,0,0.3,0c0.3-0.2,0.5-0.5,0.5-0.9v-18C-455.9,524.1-457.5,522.5-459.4,522.5z"/>
                            </svg>
                        <?php endif; ?>

                        <?php if (esc_attr__(get_option('widget_icon'.$this->widget_index)) == 'chat-image'): ?>
                            <img src="<?php echo esc_url($this->getCustomWidgetImg()); ?>"/>
                        <?php else: ?>
                            <style type="text/css">.st1 {fill: #FFFFFF;}.st0{fill: #a886cd;}</style>
                            <g><circle cx="-469" cy="534.7" r="27" fill="<?php esc_attr_e($fill) ?>"/></g>
                            <path class="st1" d="M-459.9,523.7h-20.3c-1.9,0-3.4,1.5-3.4,3.4v15.3c0,1.9,1.5,3.4,3.4,3.4h11.4l5.9,4.9c0.2,0.2,0.3,0.2,0.5,0.2 h0.3c0.3-0.2,0.5-0.5,0.5-0.8v-4.2h1.7c1.9,0,3.4-1.5,3.4-3.4v-15.3C-456.5,525.2-458,523.7-459.9,523.7z"/>
                            <path class="st0" d="M-477.7,530.5h11.9c0.5,0,0.8,0.4,0.8,0.8l0,0c0,0.5-0.4,0.8-0.8,0.8h-11.9c-0.5,0-0.8-0.4-0.8-0.8l0,0C-478.6,530.8-478.2,530.5-477.7,530.5z"/>
                            <path class="st0" d="M-477.7,533.5h7.9c0.5,0,0.8,0.4,0.8,0.8l0,0c0,0.5-0.4,0.8-0.8,0.8h-7.9c-0.5,0-0.8-0.4-0.8-0.8l0,0C-478.6,533.9-478.2,533.5-477.7,533.5z"/>
                            </svg>
                        <?php endif; ?>

                    </i>
                    <?php
                    $cht_cta = get_option('cht_cta'.$this->widget_index);
                    $display_status = ($cht_cta == "")?"none":"block";
                    $cht_cta = nl2br($cht_cta);
                    $cta = str_replace(array("\r", "\n"), "", $cht_cta);
                    ?>
                    <span class="tooltiptext" style='display: <?php esc_attr_e($display_status) ?>'><span><?php esc_attr_e($cta) ?></span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="switch-preview">
        <input data-gramm_editor="false" type="radio" id="previewDesktop" name="switchPreview" class="js-switch-preview switch-preview__input" checked="checked">
        <label for="previewDesktop" class="switch-preview__label switch-preview__desktop">
            <?php esc_attr_e('Desktop', CHT_PRO_OPT); ?>
        </label>
        <input data-gramm_editor="false" type="radio" id="previewMobile" name="switchPreview" class="js-switch-preview switch-preview__input">
        <label for="previewMobile" class="switch-preview__label switch-preview__mobile">
            <?php esc_attr_e('Mobile', CHT_PRO_OPT); ?>
        </label>
    </div>
</div>
</div>
<?php $pro_id = $this->is_pro()?"pro":""; ?>
<section class="section one" id="<?php esc_attr_e($pro_id) ?>" style="padding-bottom: 0;" xmlns="http://www.w3.org/1999/html">

    <?php if($this->widget_index != "" || $this->get_total_widgets() > 0) {
        $cht_widget_title = get_option("cht_widget_title".$this->widget_index);
        ?>
        <div class="chaty-input">
            <label><?php esc_attr_e('Name', CHT_PRO_OPT); ?></label>
            <input type="text" name="cht_widget_title" value="<?php esc_attr_e($cht_widget_title) ?>">
        </div>
    <?php } ?>

    <h1 class="section-title">
        <strong><?php esc_attr_e('Step', CHT_PRO_OPT); ?>
            1:</strong> <?php esc_attr_e('Choose your channels', CHT_PRO_OPT) . "--" . $this->is_pro(); ?>
    </h1>
    <?php
    $social_app = get_option('cht_numb_slug'.$this->widget_index);
    $social_app = trim($social_app, ",");
    $social_app = explode(",", $social_app);
    $social_app = array_unique($social_app);
    ?>
    <input type="hidden" id="default_image" value="<?php echo esc_url($imageUrl)  ?>" />
    <div class="channels-icons">
        <?php if ($this->socials) :
            foreach ($this->socials as $key => $social) :
                $value = get_option('cht_social'.$this->widget_index.'_' . $social['slug']);
                $active_class = '';
                foreach ($social_app as $key_soc):
                    if ($key_soc == $social['slug']) {
                        $active_class = 'active';
                    }
                endforeach; ?>
                <div class="icon icon-sm <?php echo esc_attr($channel_class) ?> <?php echo esc_attr($active_class) ?>" data-social="<?php echo esc_attr($social['slug']); ?>" data-title="<?php esc_attr_e($social['title']); ?>">
                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <?php echo $social['svg']; ?>
                    </svg>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php if (!$this->is_pro()) : ?>
    <div class="popover" style="">
        <a target="_blank" href="<?php echo esc_url($this->getUpgradeMenuItemUrl()); ?>">
            <?php esc_attr_e('Get unlimited channels in the Pro plan', CHT_PRO_OPT); ?>
            <strong><?php esc_attr_e('Activate your license key', CHT_PRO_OPT); ?></strong>
        </a>
    </div>
    <?php endif; ?>
    <input type="hidden" class="add_slug" name="cht_numb_slug" placeholder="test" value="<?php esc_attr_e(get_option('cht_numb_slug'.$this->widget_index)); ?>" id="cht_numb_slug" >

    <div class="social-channels">
        <ul id="channels-selected-list" class="channels-selected-list channels-selected">
            <?php if ($this->socials) :
                $social = get_option('cht_numb_slug'.$this->widget_index);
                $social = explode(",", $social);
                $social = array_unique($social);
                foreach ($social as $key_soc):
                foreach ($this->socials as $key => $social) :
                    if ($social['slug'] != $key_soc) {                          // compare social media slug
                        continue;
                    }
                    $value = get_option('cht_social'.$this->widget_index.'_' . $social['slug']);       // get setting for media if already saved
                    $imageUrl = plugin_dir_url("")."chaty-pro/admin/assets/images/chaty-default.png";
                    if (empty($value)) {                                        // Initialize default values if not found
                        $value = [
                            'value' => '',
                            'is_mobile' => 'checked',
                            'is_desktop' => 'checked',
                            'image_id' => '',
                            'title' => $social['title'],
                            'bg_color' => "",
                        ];
                    }
                    if(!isset($value['bg_color']) || empty($value['bg_color'])) {
                        $value['bg_color'] = $social['color'];                  // Initialize background color value if not exists. 2.1.0 change
                    }
                    if(!isset($value['image_id'])) {
                        $value['image_id'] = '';                                // Initialize custom image id if not exists. 2.1.0 change
                    }
                    if(!isset($value['title']) || $value['title'] == "") {
                        $value['title'] = $social['title'];                     // Initialize title if not exists. 2.1.0 change
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
                    $color = "";
                    if(!empty($value['bg_color'])) {
                        $color = "background-color: ".$value['bg_color'];                                   // set background color of icon it it is exists
                    }
                    if($social['slug'] == "Whatsapp"){
                        $val = $value['value'];
                        $val = str_replace("+","", $val);
                        $value['value'] = $val;
                    } else if($social['slug'] == "Facebook_Messenger"){
                        $val = $value['value'];
                        $val = str_replace("facebook.com","m.me", $val);                                    // Replace facebook.com with m.me version 2.0.1 change
                        $val = str_replace("www.","", $val);                                                // Replace www. with blank version 2.0.1 change
                        $value['value'] = $val;

                        $val = trim($val, "/");
                        $val_array = explode("/", $val);
                        $total = count($val_array)-1;
                        $last_value = $val_array[$total];
                        $last_value = explode("-", $last_value);
                        $total_text = count($last_value)-1;
                        $total_text = $last_value[$total_text];

                        if(is_numeric($total_text)) {
                            $val_array[$total] = $total_text;
                            $value['value'] = implode("/", $val_array);
                        }
                    }
                    $value['value'] = esc_attr__(wp_unslash($value['value']));
                    $value['title'] = esc_attr__(wp_unslash($value['title']));
                    ?>
                    <!-- Social media setting box: start -->
                    <li data-id="<?php echo esc_attr($social['slug']) ?>" id="chaty-social-<?php echo esc_attr($social['slug']) ?>">
                        <div class="channels-selected__item <?php esc_attr_e(($status)?"img-active":"") ?> <?php esc_attr_e(($this->is_pro()) ? 'pro' : 'free'); ?> 1 available">
                            <div class="chaty-default-settings">
                                <div class="move-icon">
                                    <img src="<?php echo esc_url(plugin_dir_url("")."/chaty-pro/admin/assets/images/move-icon.png") ?>">
                                </div>
                                <div class="icon icon-md active" data-title="<?php esc_attr_e($value['title']); ?>">
                                    <span style="" class="custom-chaty-image custom-image-<?php echo esc_attr($social['slug']) ?>" id="image_data_<?php echo esc_attr($social['slug']) ?>">
                                        <img src="<?php echo esc_url($imageUrl) ?>" />
                                        <span onclick="remove_chaty_image('<?php echo esc_attr($social['slug']) ?>')" class="remove-icon-img"></span>
                                    </span>
                                    <span class="default-chaty-icon custom-icon-<?php echo esc_attr($social['slug']) ?> default_image_<?php echo esc_attr($social['slug']) ?>" >
                                        <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <?php echo $social['svg']; ?>
                                        </svg>
                                    </span>
                                </div>

                                <!-- Social Media input  -->
                                <div class="channels__input-box">
                                    <input type="text" class="channels__input" name="cht_social_<?php echo esc_attr($social['slug']); ?>[value]" value="<?php esc_attr_e(wp_unslash($value['value'])); ?>" data-gramm_editor="false" id="<?php echo esc_attr($social['slug']); ?>" />
                                </div>
                                <div>
                                    <?php
                                    $slug =  esc_attr__($this->del_space($social['slug']));
                                    $slug = str_replace(' ', '_', $slug);
                                    $is_desktop = isset($value['is_desktop']) ? $value['is_desktop'] : '';
                                    $is_mobile = isset($value['is_mobile']) ? $value['is_mobile'] : '';
                                    ?>
                                    <!-- setting for desktop -->
                                    <label class="channels__view" for="<?php echo esc_attr($slug); ?>Desktop">
                                        <input type="checkbox" id="<?php echo esc_attr($slug); ?>Desktop" class="channels__view-check js-chanel-icon js-chanel-desktop" data-type="<?php echo str_replace(' ', '_', strtolower(esc_attr__($this->del_space($social['slug'])))); ?>" name="cht_social_<?php echo esc_attr($social['slug']); ?>[is_desktop]" value="checked" data-gramm_editor="false" <?php esc_attr_e($is_desktop) ?> />
                                        <span class="channels__view-txt">Desktop</label>
                                    </label>

                                    <!-- setting for mobile -->
                                    <label class="channels__view" for="<?php echo esc_attr($slug); ?>Mobile">
                                        <input type="checkbox" id="<?php echo esc_attr($slug); ?>Mobile" class="channels__view-check js-chanel-icon js-chanel-mobile" data-type="<?php echo str_replace(' ', '_', strtolower(esc_attr__($this->del_space($social['slug'])))); ?>" name="cht_social_<?php echo esc_attr($social['slug']); ?>[is_mobile]" value="checked" data-gramm_editor="false" <?php esc_attr_e($is_mobile) ?> >
                                        <span class="channels__view-txt">Mobile</span>
                                    </label>
                                </div>

                                <!-- button for advance setting -->
                                <div class="chaty-settings" onclick="toggle_chaty_setting('<?php echo esc_attr($social['slug']); ?>')">
                                    <a href="javascript:;"><span class="dashicons dashicons-admin-generic"></span></a>
                                </div>

                                <!-- example for social media -->
                                <div class="input-example">
                                    <?php esc_attr_e('For example', CHT_PRO_OPT); ?>: <?php esc_attr_e($social['example']); ?>
                                </div>

                                <!-- checking for extra help message for social media -->
                                <?php if((isset($social['help']) && !empty($social['help'])) || isset($social['help_link'])) { ?>
                                    <div class="viber-help">
                                        <?php if(isset($social['help_link'])) { ?>
                                            <?php $help_text = isset($social['help_title'])?$social['help_title']:"Doesn't work?"; ?>
                                            <a href="<?php echo esc_url($social['help_link']) ?>" target="_blank"><?php esc_attr_e($help_text); ?></a>
                                        <?php } else { ?>
                                            <?php $help_text = isset($social['help_title'])?$social['help_title']:"Doesn't work?"; ?>
                                            <span><?php echo $social['help']; ?></span>
                                            <?php esc_attr_e($help_text); ?>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- advance setting fields: start -->
                            <?php $class_name = !$this->is_pro()?"not-is-pro":""; ?>
                            <div class="chaty-advance-settings <?php esc_attr_e($class_name); ?>">
                                <!-- Settings for custom icon and color -->
                                <div class="chaty-setting-col">
                                    <label>Icon Appearance</label>
                                    <div>
                                        <!-- input for custom color -->
                                        <input type="text" name="cht_social_<?php echo esc_attr($social['slug']); ?>[bg_color]" class="chaty-color-field" value="<?php esc_attr_e($value['bg_color']) ?>" />

                                        <!-- button to upload custom image -->
                                        <a onclick="upload_chaty_image('<?php echo esc_attr($social['slug']); ?>')" href="javascript:;" class="upload-chaty-icon"><span class="dashicons dashicons-upload"></span> Custom Image</a>

                                        <!-- hidden input value for image -->
                                        <input id="cht_social_image_<?php echo esc_attr($social['slug']); ?>" type="hidden" name="cht_social_<?php echo esc_attr($social['slug']); ?>[image_id]" value="<?php esc_attr_e($imageId) ?>" />
                                    </div>
                                </div>
                                <div class="clear clearfix"></div>

                                <!-- Settings for custom title -->
                                <div class="chaty-setting-col">
                                    <label>On Hover Text</label>
                                    <div>
                                        <!-- input for custom title -->
                                        <input type="text" name="cht_social_<?php echo esc_attr($social['slug']); ?>[title]" value="<?php esc_attr_e($value['title']) ?>">
                                    </div>
                                </div>
                                <div class="clear clearfix"></div>
                                <?php if($social['slug'] == "Whatsapp") { ?>
                                    <!-- advance setting for Whatsapp -->
                                    <div class="clear clearfix"></div>
                                    <div class="chaty-setting-col">
                                        <label>Pre Set Message</label>
                                        <div>
                                            <?php $pre_set_message = isset($value['pre_set_message'])?$value['pre_set_message']:""; ?>
                                            <input id="cht_social_message_<?php echo esc_attr($social['slug']); ?>" type="text" name="cht_social_<?php echo esc_attr($social['slug']); ?>[pre_set_message]" value="<?php esc_attr_e($pre_set_message) ?>" >
                                        </div>
                                    </div>
                                <?php } else if($social['slug'] == "Email") { ?>
                                    <!-- advance setting for Email -->
                                    <div class="clear clearfix"></div>
                                    <div class="chaty-setting-col">
                                        <label>Mail Subject</label>
                                        <div>
                                            <?php $mail_subject = isset($value['mail_subject'])?$value['mail_subject']:""; ?>
                                            <input id="cht_social_message_<?php echo esc_attr($social['slug']); ?>" type="text" name="cht_social_<?php echo esc_attr($social['slug']); ?>[mail_subject]" value="<?php esc_attr_e($mail_subject) ?>" >
                                        </div>
                                    </div>
                                <?php } else if($social['slug'] == "WeChat") { ?>
                                    <!-- advance setting for WeChat -->
                                    <?php
                                    $qr_code = isset($value['qr_code'])?$value['qr_code']:"";                               // Initialize QR code value if not exists. 2.1.0 change
                                    $imageUrl = "";
                                    $status = 0;
                                    if($qr_code != "") {
                                        $imageUrl = wp_get_attachment_image_src($qr_code, "full")[0];                       // get custom Image URL if exists
                                    }
                                    if($imageUrl == "") {
                                        $imageUrl = plugin_dir_url("")."chaty-pro/admin/assets/images/chaty-default.png";   // Initialize with default image URL if URL is not exists
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
                                                <img id="cht_social_image_src_<?php echo esc_attr($social['slug']); ?>" src="<?php echo esc_url($imageUrl) ?>" alt="<?php esc_attr_e($value['title']) ?>">
                                                <span class="dashicons dashicons-upload"></span>
                                            </a>

                                            <!-- Button to remove QR Code image -->
                                            <a href="javascript:;" class="remove-qr-code <?php esc_attr_e(($status)?"active":"") ?>" onclick="remove_qr_code()"><span class="dashicons dashicons-no-alt"></span></a>

                                            <!-- input hidden field for QR Code -->
                                            <input id="upload_qr_code_val" type="hidden" name="cht_social_<?php echo esc_attr($social['slug']); ?>[qr_code]" value="<?php esc_attr_e($qr_code) ?>" >
                                        </div>
                                    </div>
                                <?php } else if($social['slug'] == "Link" || $social['slug'] == "Custom_Link") {
                                    $is_checked = (!isset($value['new_window']) || $value['new_window'] == 1)?1:0;
                                    ?>
                                    <!-- Advance setting for Custom Link -->
                                    <div class="clear clearfix"></div>
                                    <div class="chaty-setting-col">
                                        <label >Open In a New Tab</label>
                                        <div>
                                            <input type="hidden" name="cht_social_<?php echo esc_attr($social['slug']); ?>[new_window]" value="0" >
                                            <label class="channels__view" for="cht_social_window_<?php echo esc_attr($social['slug']); ?>">
                                                <input id="cht_social_window_<?php echo esc_attr($social['slug']); ?>" type="checkbox" class="channels__view-check" name="cht_social_<?php echo esc_attr($social['slug']); ?>[new_window]" value="1" <?php checked($is_checked, 1) ?> >
                                                <span class="channels__view-txt">&nbsp;</span>
                                            </label>
                                        </div>
                                    </div>
                                <?php } else if($social['slug'] == "Linkedin") {
                                    $is_checked = isset($value['link_type'])?$value['link_type']:"personal";
                                    ?>
                                    <!-- Advance setting for Custom Link -->
                                    <div class="clear clearfix"></div>
                                    <div class="chaty-setting-col">
                                        <label >LinkedIn</label>
                                        <div>
                                            <label>
                                                <input type="radio" <?php checked($is_checked, "personal") ?> name="cht_social_<?php echo esc_attr($social['slug']); ?>[link_type]" value="personal">
                                                Personal
                                            </label>
                                            <label>
                                                <input type="radio" <?php checked($is_checked, "company") ?> name="cht_social_<?php echo esc_attr($social['slug']); ?>[link_type]" value="company">
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
                            <button class="btn-cancel" data-social="<?php echo esc_attr($social['slug']); ?>">
                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="15.6301" height="2.24494" rx="1.12247" transform="translate(2.26764 0.0615997) rotate(45)" fill="white"/>
                                    <rect width="15.6301" height="2.24494" rx="1.12247" transform="translate(13.3198 1.649) rotate(135)" fill="white"/>
                                </svg>
                            </button>
                            <!-- remove social media setting button: end -->
                        </div>
                    </li>
                    <!-- Social media setting box: end -->
                <?php endforeach; ?>
            <?php endforeach?>
            <?php endif; ?>
            <?php
            /* Settings for Close button */
            $close_setting = get_option("cht_close_settings".$this->widget_index);
            $image_id = "";
            $close_text = "Hide";
            $bg_color = "";
            $imageUrl = plugin_dir_url("")."chaty-pro/admin/assets/images/chaty-default.png";   // Initialize with default image URL if URL is not exists
            if(isset($close_setting['image_id'])) {
                $image_id = $close_setting['image_id'];
            }
            if(isset($close_setting['close_text'])) {
                $close_text = $close_setting['close_text'];                                     // Initialize with default image URL if URL is not exists
            }

            if(empty($close_text)) {
                $close_text = "Hide";
            }

            if($image_id != "") {
                $image_data = wp_get_attachment_image_src($image_id, "full");
                if(!empty($image_data) && is_array($image_data)) {
                    $imageUrl = $image_data[0];                                                 // Change image URL if custom image is uploaded
                }
            }

            ?>
            <!-- close setting strat -->
            <li class="chaty-cls-setting" data-id="" id="chaty-social-close">
                <div class="channels-selected__item <?php esc_attr_e(($this->is_pro()) ? 'pro' : 'free'); ?> 1 available">
                    <div class="chaty-default-settings ">
                        <div class="move-icon">
                            <img src="<?php echo esc_url(plugins_url()."/chaty-pro/admin/assets/images/move-icon.png") ?>" style="opacity:0"; />
                        </div>
                        <div class="icon icon-md active" data-title="close">
                            <span id="image_data_close">
                                <svg viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="26" cy="26" rx="26" ry="26" fill="#A886CD"></ellipse><rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(18.35 15.6599) scale(0.998038 1.00196) rotate(45)" fill="white"></rect><rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(37.5056 18.422) scale(0.998038 1.00196) rotate(135)" fill="white"></rect></svg>
                            </span>
                            <span class="default_image_close" style="display: none;">
                                 <svg viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="26" cy="26" rx="26" ry="26" fill="#A886CD"></ellipse><rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(18.35 15.6599) scale(0.998038 1.00196) rotate(45)" fill="white"></rect><rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(37.5056 18.422) scale(0.998038 1.00196) rotate(135)" fill="white"></rect></svg>
                            </span>
                        </div>
                        <div class="channels__input-box cls-btn-settings">
                            <input type="text" class="channels__input" name="cht_close_settings[close_text]" value="<?php esc_attr_e($close_text); ?>" data-gramm_editor="false" <?php esc_attr_e(!$this->is_pro()?"readonly":"") ?> >

                            <?php if(!$this->is_pro()) { ?>
                                <a target="_blank" href="<?php echo esc_url($this->getUpgradeMenuItemUrl()) ?>">
                                    <?php esc_attr_e('Activate your key', CHT_PRO_OPT); ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="chaty-settings cls-btn">
                            <a href="javascript:;"><span class="dashicons dashicons-admin-generic"></span></a>
                        </div>
                        <div class="input-example cls-btn-settings">
                            <?php esc_attr_e('On hover Close button text', CHT_PRO_OPT); ?>
                        </div>
                    </div>


                    <!-- hide advance button option -->
                    <button class="btn-cancel close-btn-set" data-social="<?php echo esc_attr($social['slug']); ?>">
                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect width="15.6301" height="2.24494" rx="1.12247" transform="translate(2.26764 0.0615997) rotate(45)" fill="white"/>
                            <rect width="15.6301" height="2.24494" rx="1.12247" transform="translate(13.3198 1.649) rotate(135)" fill="white"/>
                        </svg>
                    </button>
                </div>
            </li>
            <!-- close setting end -->
        </ul>
        <div class="clear clearfix"></div>
        <div class="channels-selected__item disabled" style="opacity: 0; display: none;">

        </div>

        <input type="hidden" id="is_pro_plugin" value="<?php esc_attr_e($this->is_pro()?"1":"0"); ?>" />
        <?php if ($this->is_expired()) : ?>
            <div class="popover">
                <a target="_blank" href="<?php echo esc_url($this->getUpgradeMenuItemUrl()); ?>">
                    <?php esc_attr_e('Your Pro Plan is expired. ', CHT_PRO_OPT); ?>
                    <strong><?php esc_attr_e('Upgrade Now', CHT_PRO_OPT); ?></strong>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <!-- form sticky save button -->
    <button class="btn-save-sticky">
        <span><?php esc_attr_e('Save', CHT_PRO_OPT); ?></span>
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.5 0.5H0.5V27.5H27.5V6.5L21.5 0.5ZM14 24.5C11.51 24.5 9.5 22.49 9.5 20C9.5 17.51 11.51 15.5 14 15.5C16.49 15.5 18.5 17.51 18.5 20C18.5 22.49 16.49 24.5 14 24.5ZM18.5 9.5H3.5V3.5H18.5V9.5Z" fill="white"/>
        </svg>
    </button>

    <!-- chaty help button -->
    <a class="btn-help"><?php esc_attr_e('help', CHT_PRO_OPT); ?><span>?</span></a>

    <?php if(!empty($this->widget_index) && $this->widget_index != '_new_widget') { ?>
        <a href="javascript:;" class="remove-chaty-widget-sticky remove-chaty-options">Remove</a>
    <?php } ?>

</section>



