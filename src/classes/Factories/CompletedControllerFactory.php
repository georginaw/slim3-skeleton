<?php


namespace Todoapp\Factories;


use Psr\Container\ContainerInterface;
use Todoapp\Controllers\CompletedController;

class CompletedControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('TodoModel');
        $view = $container->get('renderer');
        return new CompletedController($model, $view);
    }

}