<?php
include '../includes/koneksi.php';

if (!isset($_GET['id'])) {
  echo "<h2>Wisata tidak ditemukan</h2>";
  exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM tempat_wisata WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
  echo "<h2>Data wisata tidak ditemukan</h2>";
  exit;
}

$gambar = !empty($data['gambar']) ? $data['gambar'] : 'default.png';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Wisata - <?= htmlspecialchars($data['nama_wisata']) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <style>
    body {
      background: url('../images/bg_mountain.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
      color: white;
    }
    .glass {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      padding: 2rem;
      border-radius: 1.5rem;
      box-shadow: 0 8px 32px rgba(0,0,0,0.3);
      margin-top: 40px;
    }
    img.wisata {
      max-width: 100%;
      height: auto;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.5);
    }
    .btn-back {
      background: #ffde59;
      color: black;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 999px;
      transition: 0.3s;
    }
    .btn-back:hover {
      background: white;
    }
  </style>
</head>
<body>

  <div class="max-w-3xl mx-auto glass text-white">
    <h1 class="text-3xl font-bold mb-4 text-yellow-300"><?= htmlspecialchars($data['nama_wisata']) ?></h1>

    <img src="../images/<?= htmlspecialchars($gambar) ?>" alt="<?= htmlspecialchars($data['nama_wisata']) ?>" class="wisata mb-6">

    <div class="text-lg space-y-2">
      <p><strong>Alamat:</strong> <?= htmlspecialchars($data['alamat'] ?? 'Tidak tersedia') ?></p>
      <p><strong>Kategori:</strong> <?= htmlspecialchars($data['kategori'] ?? 'Tidak tersedia') ?></p>
      <p><strong>Deskripsi:</strong> <?= nl2br(htmlspecialchars($data['deskripsi'] ?? 'Belum ada deskripsi.')) ?></p>
    </div>

    <div class="mt-6">
      <a href="tempat_wisata.php" class="btn-back">⬅️ Kembali ke Daftar Wisata</a>
    </div>
  </div>

</body>
</html>
