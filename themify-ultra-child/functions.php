<?php

//
function custom_menu_page_removing() {
    remove_submenu_page( 'themify', 'customize.php' ); // Customize
    remove_submenu_page( 'themify', 'themify_docs' ); // Documentation
    remove_submenu_page( 'themify', 'more_themes' ); // More Themes
    remove_submenu_page( 'themify', 'themify_recommended_plugins' ); // Recommended Plugins
}
add_action( 'admin_menu', 'custom_menu_page_removing', 100 );


//
function custom_remove_dashboard_widgets() {
    remove_meta_box('themify_news', 'dashboard', 'normal');   //Themify News
    remove_meta_box('themify_updates', 'dashboard', 'normal');   //Themify Updates
}
add_action('admin_init', 'custom_remove_dashboard_widgets');


// add widgets
add_action( 'widgets_init', function(){
    register_sidebar( [
        'name'          => 'Capçalera',
        'id'            => 'header_widget',
        'description'   => 'Zona de widgets en cabecera',
        'before_widget' => '<div id="%1$s" class="widget header_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ] );

    register_sidebar( [
        'name'          => 'Sobre capçalera',
        'id'            => 'header_widget_top',
        'description'   => 'Zona de widgets en cabecera',
        'before_widget' => '<div id="%1$s" class="widget header_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ] );

    register_sidebar( [
        'name'          => 'Pie',
        'id'            => 'footer_widget',
        'description'   => 'Zona de widgets en pie',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ] );

});

// register nav menus

add_action( 'after_setup_theme', function(){
    register_nav_menu( 'language_switcher', __( 'Language Menu') );
});
