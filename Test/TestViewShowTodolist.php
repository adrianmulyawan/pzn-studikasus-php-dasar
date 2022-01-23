<?php 

require_once "View/ViewShowTodolist.php";
require_once "BusinessLogic/AddTodolist.php";

addTodoList("Belajar PHP Dasar");
addTodoList("Belajar PHP OOP");
addTodoList("Belajar PHP Database");

viewShowTodoList();