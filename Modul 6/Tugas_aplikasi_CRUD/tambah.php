<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>
</head>
<body>
  <h1>Tambah Produk Baru</h1>

  <form method="POST">
    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" required><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" required><br><br>

    <input type="submit" name="submit" value="Simpan">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $nama, $harga, $stok);

    if ($stmt->execute()) {
      // Redirect ke index.php setelah sukses
      header("Location: index.php");
      exit();
    } else {
      // Tampilkan error jika gagal
      echo "Gagal menambahkan produk: " . $conn->error;
    }

    // Tutup statement
    $stmt->close();
  }
  ?>
</body>
</html>
