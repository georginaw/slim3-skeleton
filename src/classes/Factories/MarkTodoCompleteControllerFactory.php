<?php


namespace Todoapp\Factories;

use Psr\Container\ContainerInterface;
use Todoapp\Controllers\MarkTodoCompleteController;

class MarkTodoCompleteControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('TodoModel');
        return new ($model);
    }
}