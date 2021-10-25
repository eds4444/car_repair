<?php

add_action( 'wp_enqueue_scripts', 'theme_styles');
add_action( 'wp_footer', 'theme_scripts');
add_action( 'after_setup_theme', 'theme_register_nav_menu');//регистрация меню,title-tag (генеритует title в head)
add_action( 'widgets_init', 'register_my_widgets' );//регистрация сайдбар

add_filter( 'document_title_separator', 'my_sep' ); //Фильтрует (меняет) разделитель заголовка документа, по умолчанию тире
function my_sep( $sep ){	
    $sep = ' | ';
	return $sep;
}

add_filter( 'the_content', 'test_content'); //фильтр добавляет фразу после текста поста
function test_content($content){
    $content.= 'Спасибо за прочтение!';
    return $content;
}

function theme_register_nav_menu() {
	register_nav_menu( 'top', 'Mеню в шапке' );
    register_nav_menu( 'footer', 'Mеню в подвале' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails', array( 'post' ) );//устанавливает миниатюру посту
    add_theme_support( 'post-formats', array( 'video', 'aside' ) ); //Позволяет указывать формат посту.
    add_image_size( 'post_thumb', 1300, 500, true );//Регистрирует новый размер картинки (миниатюры)
    add_filter( 'excerpt_more', 'new_excerpt_more' );//Создает ссылку "Читать дальше..." на конце коментария миниатюры после обрезания текста с помощью the_excerpt()
    function new_excerpt_more( $more ){
        global $post;
        return '<a href="'. get_permalink($post) . '">  Читать дальше</a>';
    }
    // удаляет H2 из шаблона пагинации
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
    function my_navigation_template( $template, $class ){
        /*
        Вид базового шаблона:
        <nav class="navigation %1$s" role="navigation">
            <h2 class="screen-reader-text">%2$s</h2>
            <div class="nav-links">%3$s</div>
        </nav>
        */

        return '
        <nav class="navigation %1$s" role="navigation">
            <div class="nav-links">%3$s</div>
        </nav>    
        ';
    }

    // выводим пагинацию
    the_posts_pagination( array(
        'end_size' => 2,
    ) ); 

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

add_shortcode( 'iframe', 'Generate_iframe' );//создать шорткод, чтобы потом через него вставлять iframe

function Generate_iframe( $atts ) {
	$atts = shortcode_atts( array(
		'href'   => 'https://upload.wikimedia.org/wikipedia/commons/b/b7/Kar-go_Data_Gathering_Vehicle.gif',
		'height' => '600px',
		'width'  => '800px',     
	), $atts );

	return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> <p>Your Browser does not support Iframes.</p></iframe>';
}

// использование: 
// [iframe href="https://upload.wikimedia.org/wikipedia/commons/b/b7/Kar-go_Data_Gathering_Vehicle.gif" height="600" width="800"]


?>