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


    public function __invoke(Request $request, Response $response, array $args) {
        $todoData = $this->model->getCurrentTodos();
        $msg = '';

        if ($request->getQueryParam('error') == 1) {
            $msg = 'The todo text you entered was not added to the database. Check it\'s not longer than 255 characters';
        }

        $args['todos'] = $todoData;
        $args['errorMsg'] = $msg;
        return $this->view->render($response, 'homepage.phtml', $args);

    }
}