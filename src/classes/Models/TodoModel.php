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
        $query = $db->query('SELECT `todoitems` FROM `todos` WHERE `status` = `current`');
        $currentTodos = $query->fetchAll();
        return $currentTodos;

    }

}