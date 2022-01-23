<?php 

require_once "Models/TodoList.php";

require_once "Helper/Input.php";

require_once "BusinessLogic/ShowTodolist.php";

require_once "View/ViewAddTodolist.php";
require_once "View/ViewRemoveTodolist.php";

// View Show Todolist
function viewShowTodoList()
{
    // Iterasi / Perulangan Jika Kondisinya true
    while(true) {
        showTodoList();

        echo "MENU" . PHP_EOL;
        echo "1. Tambah Todo" . PHP_EOL;
        echo "2. Hapus Todo" . PHP_EOL;
        echo "x. Keluar" . PHP_EOL;

        $pilihan = input("Pilih");
        if ($pilihan == "1") {
            viewAddTodoList();
        } else if ($pilihan == "2") {
            viewRemoveTodoList();
        } else if($pilihan == "x") {
            break;
        } else {
            echo "Pilihan Tidak Dimengerti" . PHP_EOL;
        }
    }

    echo "Sampai Jumpa Lagi!" . PHP_EOL;
}