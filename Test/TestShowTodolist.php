<?php 

// Panggil Model TodoList.php dan bisnis logic ShowTodolist
require_once "Models/TodoList.php";
require_once "BusinessLogic/ShowTodolist.php";

// Tambah Todolist
$todoList[1] = "Belajar PHP Dasar";
$todoList[2] = "Belajar PHP OOP";
$todoList[3] = "Belajar PHP Database";

// Panggil function showTodoList() -> dari file BusinessLogic/ShowTodolist.php
showTodoList();