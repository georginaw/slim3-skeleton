<?php


namespace Todoapp\Controllers;


use Psr\Container\ContainerInterface;

class MarkTodoCompleteControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('TodoModel');
        return new MarkTodoCompleteController($model);
    }
}