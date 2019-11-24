<?php


namespace Todoapp\Factories;


use Interop\Container\ContainerInterface;
use Todoapp\Models\TodoModel;

class TodoModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('db');
        return new TodoModel($db);
    }
}