<?php


namespace Todoapp\Factories;


use Psr\Container\ContainerInterface;
use Todoapp\Controllers\DeleteTodoController;

class DeleteTodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('TodoModel');
        $view = $container->get('renderer');
        return new DeleteTodoController($model, $view);
    }

}