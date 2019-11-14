<?php


namespace Todoapp\Controllers;


use Psr\Container\ContainerInterface;
use Todoapp\Models\TodoModel;

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

    public function __invoke(Response $response, Request $request, array $args) {
        $currentTodos = $this->model-$this->getCurrentTodos();
        echo gettype($currentTodos);
        $this->view->render($response, 'homepage.phtml', $currentTodos);
    }
}