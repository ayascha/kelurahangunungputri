<?php
include '../includes/koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID wisata tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM tempat_wisata WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data wisata tidak ditemukan.";
    exit;
}

// Simpan jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alamat = $_POST['alamat'];
    $kategori = $_POST['kategori'];

    $update = mysqli_query($conn, "UPDATE tempat_wisata SET alamat='$alamat', kategori='$kategori' WHERE id = '$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='detail_wisata.php?id=$id';</script>";
        exit;
    } else {
        echo "<p>Gagal menyimpan perubahan.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Wisata</title>
    <style>
        body {
            background: #f2f2f2;
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #1976D2;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Tempat Wisata</h2>
    <form method="POST">
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']) ?>" required>

        <label>Kategori:</label>
        <input type="text" name="kategori" value="<?= htmlspecialchars($data['kategori']) ?>" required>

        <input type="submit" value="Simpan Perubahan">
    </form>
</div>

</body>
</html>
