<?php


namespace Todoapp\Factories;

use Psr\Container\ContainerInterface;
use Todoapp\Controllers\AddTodoController;

class AddTodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('TodoModel');
        return new AddTodoController($model);
    }
}