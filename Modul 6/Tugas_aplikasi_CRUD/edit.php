<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk WHERE id_produk = $id");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Produk</title>
</head>
<body>
  <h1>Edit Produk</h1>
  <form method="POST">
    Nama Produk: <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>" required><br><br>
    Harga: <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br><br>
    Stok: <input type="number" name="stok" value="<?= $data['stok'] ?>" required><br><br>
    <input type="submit" name="update" value="Update">
  </form>

  <?php
  if (isset($_POST['update'])) {
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $sql = "UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok WHERE id_produk=$id";
    if ($conn->query($sql)) {
      header("Location: index.php");
    } else {
      echo "Gagal memperbarui produk!";
    }
  }
  ?>
</body>
</html>
