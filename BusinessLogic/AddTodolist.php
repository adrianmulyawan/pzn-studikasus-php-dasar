<?php

require_once "Models/TodoList.php";

// Business Logic Untuk Menambah Data Todolist
function addTodoList(string $todo)
{
    // 1. Panggil Variable Global $todoList (Models/TodoList.php)
    global $todoList;

    // sizeof: mengembalikan jumlah element dalam array
    // count: mengembalikan jumlah element dalam array
    // 2. Cek jumlah data dalam array / panjang array
    // 3. Setelah itu baru kita +1 untuk menambah ke nextnya
    /*
        // Mis: 0 + 1 = 1 
                1 + 1 = 2 
                2 + 1 = 3
    */
    $number = count($todoList) + 1;

    // 4. Setelah itu masukan $todo kedalam $todoList
    // 4.1 Key = $number; Value = $todo;
    $todoList[$number] = $todo;
    
    echo "Todolist Berhasil Ditambahkan!" . PHP_EOL;
}

// $todoList[1] = "Belajar PHP Dasar";
// $todoList[2] = "Belajar PHP OOP";
// $todoList[3] = "Belajar PHP Database";
// echo count($todoList) . PHP_EOL;
// echo sizeof($todoList) . PHP_EOL;