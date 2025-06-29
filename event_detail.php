<?php
include '../includes/koneksi.php';
$judul = $_GET['judul'] ?? '';

$event_detail = [
  'Festival Batik Gunung Putri' => [
    'gambar' => '../images/festival_batik.png',
    'tanggal' => '2025-08-20',
    'lokasi' => 'Lapangan Gunung Putri',
    'deskripsi' => 'Festival budaya batik lokal dengan pameran UMKM, lomba batik anak, dan konser rakyat.'
  ],
  'Edukasi Herbal & Toga' => [
    'gambar' => '../images/edukasi_herbal.png',
    'tanggal' => '2025-09-15',
    'lokasi' => 'Saung Edukasi Herbal',
    'deskripsi' => 'Pelatihan mengenal tanaman herbal, workshop pembuatan minyak atsiri dan edukasi toga untuk kesehatan alami.'
  ],
  'Lomba Dayung Sungai Cikeas' => [
    'gambar' => '../images/dayung_sungai_cikeas.png',
    'tanggal' => '2025-10-05',
    'lokasi' => 'Sungai Cikeas',
    'deskripsi' => 'Serunya adu kecepatan di sungai dengan dayung tradisional, dilengkapi live music & kampanye sungai bersih.'
  ]
];

$data = $event_detail[$judul] ?? null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Event</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center min-h-screen text-white" style="background-image: url('../images/bg_mountain.jpg');">
  <div class="bg-black bg-opacity-70 p-8 m-8 rounded-xl max-w-3xl mx-auto mt-24">
    <?php if ($data): ?>
      <img src="<?= $data['gambar'] ?>" alt="<?= $judul ?>" class="w-full h-64 object-cover rounded-lg mb-4">
      <h1 class="text-3xl font-bold mb-2">🎉 <?= $judul ?></h1>
      <p class="text-sm text-gray-300 mb-1">📅 <?= date('d M Y', strtotime($data['tanggal'])) ?></p>
      <p class="text-sm text-gray-300 mb-4">📍 <?= $data['lokasi'] ?></p>
      <p class="text-white leading-relaxed text-base mb-6">📝 <?= $data['deskripsi'] ?></p>

      <!-- Form Pendaftaran -->
      <form action="daftar_event.php" method="POST" class="mt-6 space-y-3 bg-white bg-opacity-10 p-4 rounded">
        <input type="hidden" name="event" value="<?= $judul ?>">
        <div>
          <label class="block text-sm mb-1">Nama Lengkap</label>
          <input type="text" name="nama" required class="w-full p-2 rounded text-black" />
        </div>
        <div>
          <label class="block text-sm mb-1">Email</label>
          <input type="email" name="email" required class="w-full p-2 rounded text-black" />
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Daftar Sekarang</button>
      </form>

    <?php else: ?>
      <p class="text-red-400">Event tidak ditemukan.</p>
    <?php endif; ?>
    <a href="event.php" class="inline-block mt-6 text-sm text-blue-300 underline">← Kembali ke daftar event</a>
  </div>
</body>
</html>
