<?php

require_once "Models/TodoList.php";

// Business Logic Untuk Menghapus Data Todolist
function removeTodoList(int $number) #contoh data dihapus: 2 (total data = 6)
{
    # Panggil Variable Glolbal $todoList (Models/TodoList.php)
    global $todoList;

    // Cek No Todolist
    if ($number <= sizeof($todoList)) { # cek (2 > 6)
        # Geser Element Todolist
        for ($i = $number; $i < count($todoList); $i++) { 
            $todoList[$i] = $todoList[$i + 1];
            # 2 = 2 + 1 (3)
            # 3 = 3 + 1 (4)
            # 4 = 4 + 1 (5)
            # 5 = 5 + 1 (6)
            # 6 = false
        }

        # Hapus Todolist
        # unset($todoList(6))
        unset($todoList[count($todoList)]);

        echo "Data Todolist Berhasil Dihapus" . PHP_EOL;
    } else {
        # Jika Tidak Ditemukan
        echo "Data Todolist Tidak Ditemukan!" . PHP_EOL;
    }
}