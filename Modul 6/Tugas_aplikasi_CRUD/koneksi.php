<?php
$host = "localhost";
$user = "root";
$pass = "202312072";
$db   = "db_toko";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
