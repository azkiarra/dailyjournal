<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "localhost";
$username = "root";
$password = "";
$db = "webdailyjournal"; // nama database

// Membuat koneksi menggunakan MySQLi
$conn = new mysqli($servername, $username, $password, $db);

// Mengecek apakah ada error pada koneksi
if ($conn->connect_error) {
    // Jika ada error, hentikan script dan tampilkan pesan error
    die("Connection failed: " . $conn->connect_error);
}

// Koneksi berhasil, bisa dilanjutkan ke proses lain
