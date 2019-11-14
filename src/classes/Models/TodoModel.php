<?php


namespace Todoapp\Models;


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

}