<?php
include '../includes/koneksi.php';

$events = [
  [
    'judul' => 'Festival Batik Gunung Putri',
    'gambar' => '../images/festival_batik.png',
    'tanggal' => '2025-08-20',
    'lokasi' => 'Lapangan Gunung Putri',
    'deskripsi' => 'Festival budaya batik lokal dengan pameran UMKM, lomba batik anak, dan konser rakyat.'
  ],
  [
    'judul' => 'Edukasi Herbal & Toga',
    'gambar' => '../images/edukasi_herbal.png',
    'tanggal' => '2025-09-15',
    'lokasi' => 'Saung Edukasi Herbal',
    'deskripsi' => 'Pelatihan mengenal tanaman herbal, workshop pembuatan minyak atsiri dan edukasi toga untuk kesehatan alami.'
  ],
  [
    'judul' => 'Lomba Dayung Sungai Cikeas',
    'gambar' => '../images/dayung_sungai_cikeas.png',
    'tanggal' => '2025-10-05',
    'lokasi' => 'Sungai Cikeas',
    'deskripsi' => 'Serunya adu kecepatan di sungai dengan dayung tradisional, dilengkapi live music & kampanye sungai bersih.'
  ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Event Kelurahan Gunung Putri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    body {
      background-image: url('../images/bg_mountain.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    .glass {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .tag {
      background: rgba(30, 64, 175, 0.7);
      padding: 0.25rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.75rem;
    }
  </style>
</head>
<body class="text-white font-sans">

  <header class="glass p-4 flex justify-between items-center fixed top-0 w-full z-50 shadow-lg">
    <h1 class="text-xl font-bold">🎉 Event Kelurahan Gunung Putri</h1>
    <a href="../menu.php" class="text-sm bg-white text-gray-900 px-3 py-1 rounded hover:bg-gray-200">← Kembali ke Menu</a>
  </header>

  <main class="pt-24 px-4 max-w-6xl mx-auto pb-24">
    <h2 class="text-4xl font-bold text-center mb-10">Event Spesial Kami</h2>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-10">
      <?php foreach ($events as $event): ?>
        <div class="glass rounded-xl overflow-hidden shadow-2xl transform hover:scale-105 hover:shadow-blue-500/40 transition duration-300 relative" data-aos="zoom-in-up">
          <img src="<?= $event['gambar'] ?>" alt="<?= $event['judul'] ?>" class="w-full h-52 object-cover">
          <div class="p-5 relative">
            <h3 class="text-2xl font-bold text-white mb-2"><?= $event['judul'] ?></h3>
            <div class="flex justify-between items-center mb-2 text-sm">
              <span class="tag">📅 <?= date('d M Y', strtotime($event['tanggal'])) ?></span>
              <span class="tag">📍 <?= $event['lokasi'] ?></span>
            </div>
            <p class="text-sm text-gray-200 leading-relaxed mb-3"><?= $event['deskripsi'] ?></p>
            <a href="event_detail.php?judul=<?= urlencode($event['judul']) ?>" class="inline-block mt-2 text-blue-200 hover:text-white text-sm underline">Lihat detail acara</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>
