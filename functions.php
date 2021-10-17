<?php

add_action( 'wp_enqueue_scripts', 'theme_styles');
add_action( 'wp_footer', 'theme_scripts');
add_action( 'after_setup_theme', 'theme_register_nav_menu');//регистрация меню,title-tag (генеритует title в head)
add_action( 'widgets_init', 'register_my_widgets' );//регистрация сайдбар

function theme_register_nav_menu() {
	register_nav_menu( 'top', 'Mеню в шапке' );
    register_nav_menu( 'footer', 'Mеню в подвале' );
    add_theme_support( 'title-tag' );

}

function theme_styles(){

    wp_enqueue_style( 'styles', get_stylesheet_uri(), array(), null);
    wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css', array(), null );
    wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css', array(), null );
    wp_enqueue_style( '404', get_template_directory_uri() . '/assets/css/404.css', array(), null );

}

function theme_scripts(){
    wp_deregister_script('jquery');
    wp_register_script('jquery' , 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/js/jguery.flexslider.js', array('jquery'), null, true);



    wp_enqueue_script('doubletaptogo', get_template_directory_uri(). '/assets/js/doubletaptogo.js', array('jquery'), null, true);
    wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js', array('jquery'), null, true);
    //wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array('jquery'), null,null, false);

}

function register_my_widgets(){

	register_sidebar( array(
		'name'          => 'Left Sidebar',
		'id'            => "left_sidebar",
        'description'   => 'Описание сайдбара',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",

	) );
}


?>