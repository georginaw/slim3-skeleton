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
        $query = $db->query('SELECT `todo_name`, `id` FROM `todos` WHERE `status` = 0 AND `deleted` = 0');
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
        $query = $db->query('SELECT `todo_name`, `id` FROM `todos` WHERE `status` = 1 AND `deleted` = 0');
        $currentTodos = $query->fetchAll();
        return $currentTodos;
    }

    public function deleteCompletedTodos($id)
    {
        $db = $this->db;
        $query = $db->prepare('UPDATE `todos` SET `deleted` = 1 WHERE `id` = ?');
        return $query->execute([$id]);
    }

}