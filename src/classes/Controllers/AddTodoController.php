<?php


namespace Todoapp\Controllers;


class AddTodoController
{
    private $addedTodo;

    /**
     * AddTodoController constructor.
     * @param $addedTodo
     */
    public function __construct($addedTodo)
    {
        $this->addedTodo = $addedTodo;
    }

    public function __invoke()
    {
        // call validator
        // if valid, return display page render
    }

}