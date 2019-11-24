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
        $query = $this->db->query('SELECT `todo_name`, `id` FROM `todos` WHERE `status` = 0 AND `deleted` = 0');
        return $query->fetchAll();
    }

    public function addTodo($todoUserInput)
    {
        $query = $this->db->prepare('INSERT INTO `todos` (todo_name) VALUES (?);');
        return $query->execute([$todoUserInput]);
    }

    public function getCompletedTodos()
    {
        $query = $this->db->query('SELECT `todo_name`, `id` FROM `todos` WHERE `status` = 1 AND `deleted` = 0');
        return $query->fetchAll();
    }

    public function deleteCompletedTodos($id)
    {
        $query = $this->db->prepare('UPDATE `todos` SET `deleted` = 1 WHERE `id` = ?');
        return $query->execute([$id]);
    }

    public function markTodoComplete(array $todos)
    {
        $todosLength = count($todos['todo']);
        $prepareQuery = 'UPDATE `todos` SET `status` = 1 WHERE `id` = ?';

        if ($todosLength > 1) {
            $prepareQuery = 'UPDATE `todos` SET `status` = 1 WHERE `id` IN (?';
            for ($i = 1; $i < $todosLength; $i++) {
                $prepareQuery .= ', ?';
            }
            $prepareQuery .= ');';
        }
        $query = $this->db->prepare($prepareQuery);
        return $query->execute($todos['todo']);
    }

}