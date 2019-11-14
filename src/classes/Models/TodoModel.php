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

    public function getUncompletedTodos()
    {
        // query the db and return $uncompletedTodos
    }

}