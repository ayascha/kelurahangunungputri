<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Menu Utama - Kelurahan Gunung Putri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <style>
    body {
      background-image: url('images/bg_mountain.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .glass {
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    }

    .fade-in-up {
      animation: fadeInUp 0.8s ease forwards;
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .menu-icon:hover {
      transform: scale(1.2);
      transition: transform 0.3s ease;
    }
  </style>
</head>
<body class="text-gray-800">

  <!-- Header Transparan -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-white bg-opacity-30 glass text-white px-6 py-3 flex justify-between items-center backdrop-blur">
    <h1 class="text-xl font-bold text-white drop-shadow">🌄 Kelurahan Gunung Putri</h1>
    <a href="auth/login.php" class="text-sm bg-white bg-opacity-60 text-gray-800 px-3 py-1 rounded hover:bg-opacity-90">🔒 Admin Login</a>
  </header>

  <!-- Isi Menu -->
  <div class="min-h-screen flex flex-col justify-center items-center px-6 pt-28 pb-12">
    <div class="text-center mb-8 fade-in-up">
      <h2 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow">Menu Utama</h2>
      <p class="text-white text-lg mt-2 drop-shadow">Silakan jelajahi informasi Kelurahan Gunung Putri</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl w-full fade-in-up">

      <!-- HOME -->
      <a href="pages/home.php" class="glass rounded-xl p-6 text-center hover:scale-105 transform transition duration-300 shadow-xl">
        <i class="ph ph-house-simple text-4xl text-blue-700 mb-2 menu-icon"></i>
        <h3 class="font-semibold text-xl text-blue-900">Beranda</h3>
        <p class="text-sm">Profil & Informasi Kelurahan</p>
      </a>

      <!-- EVENT -->
      <a href="pages/event.php" class="glass rounded-xl p-6 text-center hover:scale-105 transform transition duration-300 shadow-xl">
        <i class="ph ph-calendar-check text-4xl text-green-700 mb-2 menu-icon"></i>
        <h3 class="font-semibold text-xl text-green-900">Event</h3>
        <p class="text-sm">Agenda & kegiatan masyarakat</p>
      </a>

      <!-- LOKASI -->
      <a href="pages/lokasi_peta.php" class="glass rounded-xl p-6 text-center hover:scale-105 transform transition duration-300 shadow-xl">
        <i class="ph ph-map-pin text-4xl text-red-600 mb-2 menu-icon"></i>
        <h3 class="font-semibold text-xl text-red-800">Peta Lokasi</h3>
        <p class="text-sm">Peta dusun & wilayah</p>
      </a>

      <!-- TEMPAT WISATA -->
      <a href="pages/tempat_wisata.php" class="glass rounded-xl p-6 text-center hover:scale-105 transform transition duration-300 shadow-xl">
        <i class="ph ph-mountains text-4xl text-yellow-600 mb-2 menu-icon"></i>
        <h3 class="font-semibold text-xl text-yellow-800">Wisata</h3>
        <p class="text-sm">Potensi wisata lokal</p>
      </a>

      <!-- TESTIMONI -->
      <a href="pages/testimoni.php" class="glass rounded-xl p-6 text-center hover:scale-105 transform transition duration-300 shadow-xl">
        <i class="ph ph-chat-circle-text text-4xl text-purple-700 mb-2 menu-icon"></i>
        <h3 class="font-semibold text-xl text-purple-800">Testimoni</h3>
        <p class="text-sm">Pendapat dari warga</p>
      </a>

      <!-- DUSUN -->
      <a href="pages/dusun.php" class="glass rounded-xl p-6 text-center hover:scale-105 transform transition duration-300 shadow-xl">
        <i class="ph ph-buildings text-4xl text-indigo-600 mb-2 menu-icon"></i>
        <h3 class="font-semibold text-xl text-indigo-800">Data Dusun</h3>
        <p class="text-sm">Statistik jumlah penduduk</p>
      </a>
    </div>

    <footer class="mt-16 text-center text-white text-sm">
      &copy; <?= date('Y'); ?> Kelurahan Gunung Putri. All Rights Reserved.
    </footer>
  </div>

</body>
</html>
