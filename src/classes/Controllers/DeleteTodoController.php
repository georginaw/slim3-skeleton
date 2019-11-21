<?php


namespace Todoapp\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;
use Todoapp\Models\TodoModel;

class DeleteTodoController
{
    private $model;
    private $view;

    /**
     * DeleteTodoController constructor.
     * @param $model
     */
    public function __construct(TodoModel $model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response, array $args) {
        $taskToDelete = $request->getParsedBodyParam('task');
        $this->model->deleteCompletedTodos($taskToDelete);
        return $this->view->render($response, 'completed.phtml', $args);
    }
}