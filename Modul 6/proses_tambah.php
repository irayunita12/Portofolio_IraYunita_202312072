<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$email = $_POST['email'];

$sql = "INSERT INTO karyawan (nama, jabatan, email) VALUES ('$nama', '$jabatan', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>