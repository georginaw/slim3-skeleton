<?php


namespace Todoapp\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;
use Todoapp\Models\TodoModel;

class DeleteTodoController
{
    private $model;

    /**
     * DeleteTodoController constructor.
     * @param $model
     */
    public function __construct(TodoModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, array $args) {
        $taskToDelete = $request->getParsedBodyParam('task');
        $this->model->deleteCompletedTodos($taskToDelete);
        return $response->withRedirect('./completed');
    }
}