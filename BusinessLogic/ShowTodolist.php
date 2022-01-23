<?php 

require_once "Models/TodoList.php";

// Business Logic Untuk Menampilkan Seluruh Data Todolist
function showTodoList()
{
    // Panggil Variabel Global $todoList
    global $todoList;

    echo "======================= TODOLIST =======================" . PHP_EOL;

    // Pengkondisian: Cek Todolist
    if ($todoList != null) {
        // Jika Ada
        foreach ($todoList as $number => $todo) {
            echo "$number. $todo" . PHP_EOL;
        }
    } else {
        // Jika Tidak
        echo "Todolist Masih Kosong!" . PHP_EOL;
    }
    
}