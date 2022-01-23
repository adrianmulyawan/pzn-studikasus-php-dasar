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
2. Setelah itu