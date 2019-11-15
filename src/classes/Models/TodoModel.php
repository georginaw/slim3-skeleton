<?php


namespace Todoapp\Models;


use PDO;

class TodoModel
{
    private $db;

    /**
     * TodoModel constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCurrentTodos()
    {
        $db = $this->db;
        $query = $db->query('SELECT `todo_name` FROM `todos` WHERE `status` = 0');
        $currentTodos = $query->fetchAll();
        return $currentTodos;
    }

    public function addTodo($todoUserInput)
    {
        $db = $this->db;
        $query = $db->prepare('INSERT INTO `todos` (todo_name) VALUES (?);');
        $dbResponse = $query->execute([$todoUserInput]);
        return $dbResponse;
    }

    public function getCompletedTodos()
    {
        $db = $this->db;
        $query = $db->query('SELECT `todo_name` FROM `todos` WHERE `status` = 1');
        $currentTodos = $query->fetchAll();
        return $currentTodos;
    }

}