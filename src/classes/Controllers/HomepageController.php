<?php


namespace Todoapp\Controllers;

use Todoapp\Models\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

class HomepageController
{
    private $model;
    private $view;

    /**
     * HomepageController constructor.
     * @param $model
     * @param $view
     */
    public function __construct(TodoModel $model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }


    public function __invoke(Request $request, Response $response, array $todos) {
            $todoData = $this->model->getCurrentTodos();
            return $this->view->render($response, 'homepage.phtml', ['todos' => $todoData]);
        }
}