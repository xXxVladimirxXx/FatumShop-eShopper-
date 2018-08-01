<?php

add_action ('wp_enqueue_scripts', 'eShopper_scripts_and_style');
function eShopper_scripts_and_style() {
	
	//Подключаем скрипты	
	wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    	wp_enqueue_script('jquery-1.7.2.min', get_template_directory_uri() . '/assets/js/jquery-1.7.2.min.js');
	wp_enqueue_script('jquery.min', get_template_directory_uri() . '/assets/js/jquery.js');
	wp_enqueue_script('jquery.scrollUp.min', get_template_directory_uri() . '/assets/js/jquery.scrollUp.min.js');
    	wp_enqueue_script('jquery.prettyPhoto', get_template_directory_uri() . '/assets/js/jquery.prettyPhoto.js');
   	wp_enqueue_script('jquery.scrollUp.min', get_template_directory_uri() . '/assets/js/jquery.scrollUp.min.js');
    	wp_enqueue_script('jquery-ui-1.8.19.custom.min', get_template_directory_uri() . '/assets/js/jquery-ui-1.8.19.custom.min.js');
	wp_enqueue_script('price-range', get_template_directory_uri() . '/assets/js/price-range.js');
	wp_enqueue_script('cart.min', get_template_directory_uri() . '/assets/js/cart.min.js');
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js');
	wp_enqueue_script('contact', get_template_directory_uri() . '/assets/js/contact.js');
	wp_enqueue_script('html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js');
	wp_enqueue_script('gmaps', get_template_directory_uri() . '/assets/js/gmaps.js');

	//Подключаем стили
	wp_enqueue_style('eShopper-style', get_stylesheet_uri());
	wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
   	wp_enqueue_style('jquery-ui-1.8.19.custom', get_template_directory_uri() . '/assets/css/jquery-ui-1.8.19.custom.css');
	wp_enqueue_style('font-awesome.min', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css');
	wp_enqueue_style('price-range', get_template_directory_uri() . '/assets/css/price-range.css');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css');

}


add_action ('after_setup_theme', 'fatum_theme_seting');
function fatum_theme_seting() {
	
	//Совместимомть с woocommerce
	add_theme_support( 'woocommerce' );
	
	//Миниатюра
	add_theme_support('post-thumbnails');

	add_image_size('img_product', 255, 237, true );

	add_image_size('img_product_single', 329, 380, true );

	add_image_size('slider', 484, 441, true );

	add_image_size('archive_tumbnail', 847, 392);

	add_image_size('cart_tumbnail', 110, 110);

	//Меню
	register_nav_menu('menu', 'Меню в шапке');
	
	register_nav_menu('account_menu', 'account_menu');


    /**
     * Hook: Woocommerce_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     */

    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

}

add_action('admin_menu', function(){
    add_menu_page( 'Дополнительные настройки сайта', 'Доп. настройки', 'manage_options', 'add-my-setting.php', 'my_save', '', 79);
} );

// функция отвечает за вывод страницы настроек
// подробнее смотрите API Настроек: http://wp-kama.ru/id_3773/api-optsiy-nastroek.html
include ( get_template_directory() . '/layouts/add-my-setting.php');


function wp_corenavi() {
	global $wp_query;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = '«'; //текст ссылки "Предыдущая страница"
	$a['next_text'] = '»'; //текст ссылки "Следующая страница"

	if ( $max > 1 ) {
	echo '<li>';
	}
	echo $pages . paginate_links($a);
	if ( $max > 1 ) {
	echo ' </li>';
  }
}

//После авторизации перекидывает на главную страницу
function login_redirect() {
    return '/';
}
add_filter('login_redirect', 'login_redirect');

//После регистрации перекидывает на главную страницу
function registration_redirect(){
    return '/';
}
add_filter( 'registration_redirect', 'registration_redirect' );

function devise_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'devise_move_comment_field_to_bottom' );

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyAVOZ2Pwk1wxXT_9SS-3ucDU4EPByYjOPU';

    return $api;

}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
