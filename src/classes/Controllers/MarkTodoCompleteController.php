<?php


namespace Todoapp\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class MarkTodoCompleteController
{
    private $model;

    /**
     * MarkTodoCompleteController constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $completedTodos = $request->getParsedBody('todo');
        $this->model->markTodoComplete($completedTodos);
        return $response->withRedirect('/completed');
    }


}