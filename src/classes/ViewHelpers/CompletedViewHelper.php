<?php


namespace Todoapp\ViewHelpers;


class CompletedViewHelper
{
    /**
     * Takes the list of todos marked as complete which has been provided by the db and returns them in a string of html to be displayed on the completed todos page
     *
     * @param array $completedTodos
     * @return string
     */
    public static function completedTodosView(array $completedTodos) : string
    {
        $completedTodosView = '<p>You have no todos to delete</p>';
        if (count($completedTodos) > 0) {
            $completedTodosView = '';
            foreach ($completedTodos as $completedTodo) {
                $completedTodosView .= '<form class="todos" method="post" action="/deleteTodo">' .
                    '<div>' .
                    '<span>' . $completedTodo["todo_name"] . '</span>' .
                    '<input type="submit" value="Delete">' .
                    '<input type="hidden" name="task" value="' . $completedTodo["id"] . '">' .
                '</div>' .
            '</form>';
            }
        }
        return $completedTodosView;
    }

}
