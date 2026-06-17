<?php
// database.php

$host = "localhost";
$username = "root";
$password = "";     
$dbname = "db_latihan_pbo_ti1c_RaqilSyabana";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Mengatur mode error PDO ke Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>