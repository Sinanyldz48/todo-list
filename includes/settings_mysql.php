<?php
// Veritabanı bağlantı bilgileri
$host = 'localhost';// Sunucu adresi
$user = 'root';  // MySQL kullanıcı adı
$password = '';  // MySQL parolası
$database = 'todo_list';  // Kullanmak istediğiniz veritabanı adı

// MySQLi bağlantısını oluştur
$connection =  mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($connection,"UTF8");

// Bağlantıyı kontrol et
if ($connection->connect_error) {
    die('Bağlantı hatası: ' . $connection->connect_error);
}
?>