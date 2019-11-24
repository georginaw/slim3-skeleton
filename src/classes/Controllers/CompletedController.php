<?php


namespace Todoapp\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class CompletedController
{
    private $model;
    private $view;

    /**
     * CompletedController constructor.
     * @param $model
     * @param $view
     */
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response, array $args) {
        $completedTodoData = $this->model->getCompletedTodos();

        $args['completedTodos'] = $completedTodoData;
        return $this->view->render($response, 'completed.phtml', $args);
    }

}