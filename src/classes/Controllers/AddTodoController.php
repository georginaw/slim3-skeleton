<?php


namespace Todoapp\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class AddTodoController
{
    private $model;

    /**
     * AddTodoController constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $todoUserInput = $request->getParsedBodyParam('todoUserInput');
        echo $todoUserInput;
        $this->model->addTodo($todoUserInput);
        return $response->withRedirect('/');
    }


}