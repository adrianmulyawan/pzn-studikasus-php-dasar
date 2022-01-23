<?php 

require_once "Models/TodoList.php";

require_once "Helper/Input.php";

require_once "BusinessLogic/RemoveTodolist.php";

require_once "View/ViewShowTodolist.php";

// View Remove Todolist
function viewRemoveTodoList()
{
    echo "MENGHAPUS TODO" . PHP_EOL;

    # Konversi ke int untuk nomor todo yang akan dihapus
    $pilihan = input("Nomer Todo (x untuk batalkan)");

    # Cek Pilihan
    if ($pilihan == "x") {
        # Arahkan ke function menampilkan seluruh todo
        viewShowTodoList();
    } else {
        # Hapus todo 
        $deleteTodo = removeTodoList($pilihan);

        # Pengkondisian jika berhasil / gagal menghapus data
        if ($deleteTodo) {
            echo "Sukses Menghapus Todo No $pilihan" . PHP_EOL;
        } else {
            echo "Gagal Menghapus Todo No $pilihan" . PHP_EOL;
        }
    }
} 