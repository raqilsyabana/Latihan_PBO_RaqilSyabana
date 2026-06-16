<?php
// database.php

$host = "localhost";
$username = "root"; // Sesuaikan dengan username MySQL kamu
$password = "";     // Sesuaikan dengan password MySQL kamu
$dbname = "DB_LATIHAN_PBO_TRPL1A_NamaLengkap";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Mengatur mode error PDO ke Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>