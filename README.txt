Studi Kasus PHP Dasar: Membuat Aplikasi Todolist

> Prototype Aplikasi
- Kenapa Butuh Prototype?
1. Prototype adalah bentuk dasar dari sebuah aplikasi. 
2. Saat pertama kali kita membuat aplikasi, sangat disarankan untuk membuat Prototype nya terlebih dahulu.
3. Prototype bisa kita gunakan agar mudah memahami flow aplikasi yang akan kita buat, sehingga tidak salah ketika membuat aplikasi.
4. Dari Prototype juga kita bisa melihat data apa yang dibutuhkan, business logic apa yang dibutuhkan, dan seperti apa tampilan aplikasi yang akan dibuat.

> Membuat Model
- Pengertian Model 
Model adalah "data", atau representasi data yang akan kita buat dari aplikasi. Biasanya jika kita membuat aplikasi berbasis database, model merupakan representasi dari database.
- Data Yang Akan Disimpan Didalam Model
1. String: Isi dari Todolist
2. Integer: Angka (Untuk urutan Todolist)

> Menentukan Business Logic 
- Business Logic adalah fitur dari aplikasi yang akan dibuat
- Fitur-fitur 
1. Menampilkan data list
2. Menambah data Todolist
3. Menghapus data Todolist

> Menentukan View
- View adalah display atau tampilan dari aplikasi yang akan dibuat
- View:
1. View Menampilkan Todolist
2. View Menambah Data Todolist
3. View Menghapus Todolist

========================================================================

> Menampilkan Todolist
1. Buka folder BusinessLogic, kemudian buka file ShowTodolist.php 
2. Pada function showTodoList() tambahkan kode seperti ini
<?php

require_once "Models/TodoList.php";

function showTodoList()
{
    // Panggil Variabel Global $todoList
    global $todoList;

    echo "TODOLIST" . PHP_EOL;

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

> Test Menampilkan Todolist
1. Developer yang baik saat membuat kode program harus selalu membuat testnya
2. Untuk membuat test kita dapat menggunakan "PHP Unit Test" (Tapi Belum Dipelajari)
3. Untuk itu kita dapat membuat testnya apakah function tsb sudah sesuai dengan ekspetasi (berjalan dengan baik)
4. Buat folder "Test" dan buat file dengan nama "TestShowTodolist.php"
5. Setelah itu kita panggil menggunakan "require_once" untuk BusinessLogi/ShowTodolist.php untuk menguji function tsb dapat berjalan dengan baik
6. Setelah itu kita panggil "require_once "Models/TodoList.php";" untuk menambahkan data Todolist
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

========================================================================

> Menambah Todolist
1. Memberikan input berupa teks (Nama Todo)
<?php

// Panggil file TodoList.php
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

> Test Menambah Todolist
1. Buka folder "Test/" kemudian buat file .php baru untuk menguji fungsi tambah Todolist
2. Buat file tsb dengan nama TestAddTodolist.php 
3. Kemudian isi file tsb seperti ini:
<?php 

# Require Model TodoList
require_once "Models/TodoList.php";
# Require Fungsi Tambah Todolist dan Menampilkan Todolist
require_once "BusinessLogic/AddTodolist.php";
require_once "BusinessLogic/ShowTodolist.php";

# Jalankan Tambah Data Todolist
addTodoList("Belajar PHP Dasar");
addTodoList("Belajar PHP OOP");
addTodoList("Belajar PHP Database");
addTodoList("Belajar PHP Web");
addTodoList("Belajar PHP Composer");
addTodoList("Belajar PHP Unit Test");

# Jalankan Tampil Seluruh Data Todolist
showTodoList();

========================================================================

> Menghapus Todolist 
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

> Test Mengapus Todolist 
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

========================================================================

> Input Data
- Bagaimana menerima input pada dari user? sedangkan disini kita belum belajar yang namanya php web. Sekarang kita akan membuat aplikasi berbasis terminal / command line yang disini kita akan menggunakan function fgets (https://www.php.net/manual/en/function.fgets.php) yang digunakan untuk membaca input / resource dari terminal.
- Praktik 
1. Buat folder dengan nama "Helper"

2. Setelah itu buat file php dengan nama Input.php dan didalamnya kita buat function input dengan paramater "string $input" yang mengembalikan nilai "string" yang digunakan untuk mendapatkan inputan user
<?php 

function input(string $info): string
{
    echo "$info : ";
    $result = fgets(STDIN);
    return trim($result);
}

3. Setelah itu kita buat Testnya didalam folder Test dan buat file TestInput.php dan kita coba terima inputan dari user
<?php 

require_once "Helper/Input.php";

// Input Nama
$name = input("Name");
echo "Hello $name" . PHP_EOL;

// Input Channel 
$channel = input("Channel");
echo "Nama Channel : $channel" . PHP_EOL;

========================================================================

> View Show Todolist 
1. Buka file ViewShowTodolist.php yang berada di folder View/ViewShowTodolist.php 

2. Setelah itu kita panggil 
require_once "Models/TodoList.php";
require_once "Helper/Input.php";
require_once "BusinessLogic/ShowTodolist.php";
require_once "View/ViewAddTodolist.php";
require_once "View/ViewRemoveTodolist.php";

3. Dan didalam functon ViewShowTodolist isi seperti ini 
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

> Test Show Todolist
1. Buat file baru didalam folder Test/ dengan nama TestViewShowTodolist.php 

2. Setelah itu kita panggil function viewShowTodoList() yang berada didalam folder View/ViewShowTodolist dan function untuk menambahkan TodoList (addTodoList())
require_once "View/ViewShowTodolist.php";
require_once "BusinessLogic/AddTodolist.php";

3. Setelah itu baru kita jalankan function viewShowTodoList() didalam file TestViewShowTodolist
viewShowTodoList()
addTodoList("Belajar PHP Dasar");
addTodoList("Belajar PHP OOP");
addTodoList("Belajar PHP Database");
viewShowTodoList();

========================================================================

> View Add Todolist
1. Panggil model, helper, logic tambah todo, dan view menampilkan seluruh data todo 
require_once "Models/TodoList.php";
require_once "Helper/Input.php";
require_once "BusinessLogic/AddTodolist.php";
require_once "View/ViewShowTodolist.php";

2. Kemudian didalam viewAddTodoList tambahkan seperti ini 
function viewAddTodoList()
{
    echo "MENAMBAHB TODO" . PHP_EOL;

    $todo = input("Todo (x untuk batal) : ");

    if ($todo == "x") {
        viewShowTodoList();
    } else {
        addTodoList($todo);
    }
    
}

> Test View Add Todolist
1. Panggil View untuk menambahkan data todo, logic menampilkan data todo, dan logic untuk menambahkan todo
require_once "View/ViewAddTodolist.php";
require_once "BusinessLogic/ShowTodolist.php";
require_once "BusinessLogic/AddTodolist.php";

2. Setelah itu jalankan fungsi untuk menampilkan view tambah data todo, fungsi untuk menampilkan seluruh data todo, dan fungsi untuk menambahkan todo
addTodoList("Belajar PHP Dasar");
addTodoList("Belajar PHP OOP");
addTodoList("Belajar PHP Database");
viewAddTodoList();
showTodoList();

========================================================================

> View Remove Todolist
1. Panggil model, helper, logic hapus todo, dan vie menampilkan seluruh data todo 
require_once "Models/TodoList.php";
require_once "Helper/Input.php";
require_once "BusinessLogic/RemoveTodolist.php";
require_once "View/ViewShowTodolist.php";

2. Kemudian didalam function removeTodoList() tambahkan seperti ini
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

> Test View Remove Todolist
1. Panggil model, view untuk menghapus data todo, logic untuk menambahkan data todo, logic untuk menampilkan seluruh data todo
require_once "Models/TodoList.php";
require_once "View/ViewRemoveTodolist.php";
require_once "BusinessLogic/AddTodolist.php";
require_once "BusinessLogic/ShowTodolist.php";

2. Setelah itu jalankan fungsi logic tambah data todo, menampilkan seluruh data todo dan menghapus data 
addTodoList("Belajar PHP Dasar");
addTodoList("Belajar PHP OOP");
addTodoList("Belajar PHP Database");
addTodoList("Belajar PHP Web");
addTodoList("Belajar PHP Composer");
addTodoList("Belajar PHP Unit Test");

showTodoList();

removeTodoList(3);

showTodoList();

removeTodoList(3);

showTodoList();

removeTodoList(3);

showTodoList();

========================================================================

> Test Seluruh Aplikasi
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
// Helper 
require_once "Helper/Input.php";

echo "APLIKASI TODOLIST" . PHP_EOL;

viewShowTodoList();