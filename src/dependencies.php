<?php

use Slim\App;

/**
 * @param App $app
 */
return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['db'] = function() {
        $db = new PDO('mysql:host=127.0.0.1;dbname=todos', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    $container['TodoModel'] = new \Todoapp\Factories\TodoModelFactory();

    $container['HomepageController'] = new \Todoapp\Factories\HomepageControllerFactory();

    $container['AddTodoController'] = new \Todoapp\Factories\AddTodoControllerFactory();

    $container['CompletedController'] = new \Todoapp\Factories\CompletedControllerFactory();

    $container['DeleteTodoController'] = new \Todoapp\Factories\DeleteTodoControllerFactory();

    $container['MarkTodoCompleteController'] = new \Todoapp\Controllers\MarkTodoCompleteControllerFactory();

};