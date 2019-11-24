<?php


namespace Todoapp\Validators;


class AddTodoValidator
{
    public static function validateTodo($todoUserInput) {
        $data = strip_tags(trim($todoUserInput));
        return ($data && (strlen($data) <= 255));
    }

}