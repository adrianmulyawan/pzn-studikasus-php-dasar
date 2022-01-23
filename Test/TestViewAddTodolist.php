<?php 

require_once "View/ViewAddTodolist.php";
require_once "BusinessLogic/ShowTodolist.php";
require_once "BusinessLogic/AddTodolist.php";

addTodoList("Belajar PHP Dasar");
addTodoList("Belajar PHP OOP");
addTodoList("Belajar PHP Database");

viewAddTodoList();

showTodoList();

viewAddTodoList();

showTodoList();