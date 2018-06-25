<?php
namespace wp\coin;

use composer\Autoload\ClassLoader;

/**
 * Plugin Name: WP-coin
 * Description: Плагин добавляет возможность авторизации фронта и добавляет валюту на сайт.
 * Author:  Alexandr Dolzhykov
 * Version: 1.0.0
 */

require __DIR__ . '/vendor/autoload.php';

add_action( 'plugins_loaded', function() {

    // Подключает классы
    $class_loader = new ClassLoader();

    $class_loader->addPsr4(__NAMESPACE__ . '\\', __DIR__.'/mvc/controllers');
    $class_loader->addPsr4(__NAMESPACE__ . '\\', __DIR__.'/mvc/models');
    $class_loader->addPsr4(__NAMESPACE__ . '\\', __DIR__.'/mvc/views');
    $class_loader->register(true);

    $plugin = plugins_url('wp-coin');

    new AuthenticationController($plugin);

    new AutenticationDraftsman($plugin);
});