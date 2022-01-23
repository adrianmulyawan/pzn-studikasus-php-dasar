<?php

// Panggil Models/TodoList.php
require_once "Models/TodoList.php";

// Panggil Business Logic (Menampilkan, Menambah, dan Menghapus Todolist)
require_once "BusinessLogic/ShowTodolist.php";
require_once "BusinessLogic/AddTodolist.php";
require_once "BusinessLogic/RemoveTodolist.php";

// Panggil View
require_once "View/ViewShowTodolist.php";
require_once "View/ViewAddTodolist.php";
require_once "View/ViewRemoveTodolist.php";

echo "APLIKASI TODOLIST" . PHP_EOL;