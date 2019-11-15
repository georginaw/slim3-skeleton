<?php


namespace Todoapp\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Todoapp\Models\TodoModel;
use Todoapp\Validators\AddTodoValidator;

class AddTodoController
{
    private $model;

    /**
     * AddTodoController constructor.
     * @param $model
     */
    public function __construct(TodoModel $model)
    {
        $this->model = $model;
    }

    public function __invoke( Request $request, Response $response, array $args)
    {
        $todoUserInput = $request->getParsedBodyParam('todoUserInput');
        $validate = AddTodoValidator::validateTodo($todoUserInput);
        if ($validate) {
            $this->model->addTodo($todoUserInput);
            return $response->withRedirect('/');
        } else {
            return $response->withRedirect('/?error=1');
        }
    }


}