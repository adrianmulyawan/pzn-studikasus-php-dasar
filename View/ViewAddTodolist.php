<?php 

require_once "Models/TodoList.php";

require_once "Helper/Input.php";

require_once "BusinessLogic/AddTodolist.php";

require_once "View/ViewShowTodolist.php";

// View Add Todolist
function viewAddTodoList()
{
    echo "MENAMBAHKAN TODO" . PHP_EOL;

    $todo = input("Todo (x untuk batal)");

    if ($todo == "x") {
        viewShowTodoList();
    } else {
        addTodoList($todo);
    }
    
}