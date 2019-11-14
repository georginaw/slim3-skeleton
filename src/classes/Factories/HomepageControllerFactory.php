<?php


namespace Todoapp\Factories;


use Psr\Container\ContainerInterface;
use Todoapp\Controllers\HomepageController;
use Todoapp\Models\TodoModel;

class HomepageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('TodoModel');
        $view = $container->get('renderer');
        return $homepageController = new HomepageController($model, $view);
    }
}