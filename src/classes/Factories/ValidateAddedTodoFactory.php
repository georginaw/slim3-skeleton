<?php


namespace Todoapp\Factories;


use Slim\Http\Request;
use Todoapp\ValidateAddedTodo;

class ValidateAddedTodoFactory
{
    public function __invoke(Request $request) {
        $userData = $request->getQueryParams();
        return new ValidateAddedTodo($userData);
    }
}