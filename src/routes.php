<?php

use Slim\App;


return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'HomepageController');

    $app->post('/add', 'AddTodoController');

    $app->get('/completed', 'CompletedController');

};
