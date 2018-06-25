<?php
namespace wp\coin;

/**
 * Чтобы добавить авторизацию с фронта, достаточно лишь в тему добавить следующее:
 * wp_nav_menu(array('theme_location' => 'authentication') );
 *
 * Class AuthenticationController
 * @package wp\coin
 */
class AuthenticationController {

    public function __construct($plugin) {

        $this->plugin = $plugin;

        add_action('after_setup_theme', [$this, 'menu_for_authentication']);
        add_filter('wp_nav_menu_items', [$this, 'add_item_in_menu'], 10, 2);

        add_action('wp_ajax_url_output', [$this, 'url_output']);
        add_action('wp_ajax_nopriv_url_registration', [$this, 'url_registration']);
    }

    /**
     * Create menu for authentication
     */
    public function menu_for_authentication() {

        register_nav_menu('authentication', 'Menu for authentication');
    }

    /**
     * This method add items in menu
     *
     * @param $items
     * @param $args
     * @return string
     */
    public function add_item_in_menu($items, $args) {

        if('authentication' == $args->theme_location) {

            if(is_user_logged_in()) { // Если юзер залогинен

                $items .= '<li><a id="output" href="/output/">Выход</a></li>';
            } else { // Если не залогинен

                $items .= '<li><a id="loginForm" href="/login/">Вход</a></li>';
            }

        }

        return $items;
    }

    public function url_output() {
        // http://job.l9971350.beget.tech/wp-admin/admin-ajax.php?action=ajax_url_output

        if(is_user_logged_in()){

            wp_logout();
        }

        wp_die();
    }

    public function url_registration() {

    }
}