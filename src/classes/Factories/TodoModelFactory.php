<?php


namespace Todoapp\Factories;


use Interop\Container\ContainerInterface;
use Todoapp\Models\TodoModel;

class TodoModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('id');
        return $model = new TodoModel($db);
    }
}