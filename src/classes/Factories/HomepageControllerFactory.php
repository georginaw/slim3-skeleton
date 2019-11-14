<?php


namespace Todoapp\Factories;


use Psr\Container\ContainerInterface;
use Todoapp\Controllers\HomepageController;

class HomepageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('TodoModel');
        $view = $container->get('renderer');
        return new HomepageController($model, $view);
    }
}