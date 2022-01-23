<?php 

require_once "Models/TodoList.php";
require_once "View/ViewRemoveTodolist.php";
require_once "BusinessLogic/AddTodolist.php";
require_once "BusinessLogic/ShowTodolist.php";

addTodoList("Belajar PHP Dasar");
addTodoList("Belajar PHP OOP");
addTodoList("Belajar PHP Database");
addTodoList("Belajar PHP Web");

showTodoList();

viewRemoveTodoList();

showTodoList();