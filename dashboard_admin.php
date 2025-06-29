<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit;
}

include '../includes/koneksi.php';

// Tambah Tempat Wisata
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_wisata'])) {
        $nama = $_POST['nama_wisata'];
        $deskripsi = $_POST['deskripsi'];
        $rating = $_POST['rating'];

        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "../images/" . $gambar);

        $query = "INSERT INTO tempat_wisata (nama_wisata, deskripsi, rating, gambar)
                  VALUES ('$nama', '$deskripsi', '$rating', '$gambar')";
        mysqli_query($conn, $query);
    }

    // Tambah Event
    if (isset($_POST['submit_event'])) {
        $nama_event = $_POST['nama_event'];
        $tanggal = $_POST['tanggal'];
        $deskripsi = $_POST['deskripsi'];

        $query = "INSERT INTO event (nama_event, tanggal, deskripsi)
                  VALUES ('$nama_event', '$tanggal', '$deskripsi')";
        mysqli_query($conn, $query);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
</head>
<body class="bg-gray-100 font-sans">

  <div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold text-center mb-6">Dashboard Admin</h1>

    <!-- Form Tambah Tempat Wisata -->
    <div class="bg-white rounded-xl shadow p-6 mb-10">
      <h2 class="text-xl font-semibold mb-4">Tambah Tempat Wisata</h2>
      <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nama_wisata" placeholder="Nama Wisata" required class="block w-full border rounded p-2 mb-3" />
        <textarea name="deskripsi" placeholder="Deskripsi" required class="block w-full border rounded p-2 mb-3"></textarea>
        <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5" required class="block w-full border rounded p-2 mb-3" />
        <input type="file" name="gambar" accept="image/*" required class="block w-full border rounded p-2 mb-3" />
        <button type="submit" name="submit_wisata" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan Wisata</button>
      </form>
    </div>

    <!-- Form Tambah Event -->
    <div class="bg-white rounded-xl shadow p-6 mb-10">
      <h2 class="text-xl font-semibold mb-4">Tambah Event</h2>
      <form method="POST">
        <input type="text" name="nama_event" placeholder="Nama Event" required class="block w-full border rounded p-2 mb-3" />
        <input type="date" name="tanggal" required class="block w-full border rounded p-2 mb-3" />
        <textarea name="deskripsi" placeholder="Deskripsi Event" required class="block w-full border rounded p-2 mb-3"></textarea>
        <button type="submit" name="submit_event" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan Event</button>
      </form>
    </div>

    <!-- Navigasi -->
    <div class="text-center">
      <a href="../menu.php" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-900 mr-4">Kembali ke Menu</a>
      <a href="../auth/logout.php" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">Logout</a>
    </div>
  </div>

</body>
</html>
