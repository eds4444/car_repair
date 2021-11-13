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

function theme_register_nav_menu() {
	register_nav_menu( 'top', 'Mеню в шапке' );
    register_nav_menu( 'footer', 'Mеню в подвале' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails', array( 'post', 'portfolio' ) );//устанавливает миниатюру посту
    add_theme_support( 'post-formats', array( 'video', 'aside',) ); //Позволяет указывать формат посту.
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
		'name'          => 'Rigth Sidebar',
		'id'            => "rigth_sidebar",
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


add_action( 'init', 'register_post_types' ); //Создает новый тип записи или изменяет имеющийся
function register_post_types(){
register_post_type( 'portfolio', [
    'label'  => null,
    'labels' => [
        'name'               => 'Портфолио', // основное название для типа записи
        'singular_name'      => 'Портфолио', // название для одной записи этого типа
        'add_new'            => 'Добавить работу', // для добавления новой записи
        'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item'          => 'Редактирование работы', // для редактирования типа записи
        'new_item'           => 'Новая работа', // текст новой записи
        'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
        'search_items'       => 'Искать работу в портфолио', // для поиска по этим типам записи
        'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
        'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
        'parent_item_colon'  => '', // для родителей (у древовидных типов)
        'menu_name'          => 'Портфолио', // название меню
    ],
    'description'         => 'Это наши работы в портфолио',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // зависит от show_in_menu
    'show_in_rest'        => true, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       =>  4,
    'menu_icon'           => 'dashicons-portfolio',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt'  ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => ['skills'],
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
] );
}


add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
register_taxonomy( 'skills', [ 'portfolio' ], [
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => [
        'name'              => 'Навыки',
        'singular_name'     => 'Навык',
        'search_items'      => 'Найти навык',
        'all_items'         => 'Все навыки',
        'view_item '        => 'Смотреть навыки',
        'parent_item'       => 'Родительские навыки',
        'parent_item_colon' => 'Родительский навык:',
        'edit_item'         => 'Изменить навык',
        'update_item'       => 'Обновить навык',
        'add_new_item'      => 'Добавить новый навык',
        'new_item_name'     => 'новое имя навыка',
        'menu_name'         => 'Навыки',
    ],
    'description'           => 'Навыки которые использовались', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'hierarchical'          => false,
    'rewrite'               => true,
    'capabilities'          => array(),
    'meta_box_cb'           => null, 
    'show_admin_column'     => false, 
    'show_in_rest'          => null, 
    'rest_base'             => null, 
] );
};
add_action( 'init', 'skills_for_portfolio' );//Привязывает (добавляет) указанную таксономию к указанному типу записи (поста)
function skills_for_portfolio(){
register_taxonomy_for_object_type( 'skills', 'portfolio');
}

add_theme_support( 'custom-logo', [
	'height'      => 600,
	'width'       => 700,
] );