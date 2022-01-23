<?php 

require_once "Models/TodoList.php";
require_once "BusinessLogic/AddTodolist.php";
require_once "BusinessLogic/ShowTodolist.php";
require_once "BusinessLogic/RemoveTodolist.php";

addTodoList("Belajar PHP Dasar");
addTodoList("Belajar PHP OOP");
addTodoList("Belajar PHP Database");
addTodoList("Belajar PHP Web");
addTodoList("Belajar PHP Composer");
addTodoList("Belajar PHP Unit Test");

showTodoList();

removeTodoList(2);

showTodoList();

removeTodoList(5);

showTodoList();

removeTodoList(5);

showTodoList();