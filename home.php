<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda - Kelurahan Gunung Putri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .fade-in {
      animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .glass {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }
  </style>
</head>
<body class="font-sans bg-cover bg-fixed bg-center" style="background-image: url('../images/bg_mountain.jpg');">

  <!-- Navigasi / Tombol kembali -->
  <div class="w-full bg-black bg-opacity-60 text-white px-6 py-3 flex justify-between items-center">
    <h1 class="text-lg font-bold">Profil Kelurahan Gunung Putri</h1>
    <a href="../menu.php" class="text-sm bg-white text-black px-3 py-1 rounded hover:bg-gray-200 transition">← Kembali ke Menu</a>
  </div>

  <!-- Hero -->
  <section class="text-center py-20 px-6 fade-in">
    <h1 class="text-4xl md:text-5xl font-bold text-white drop-shadow-lg">Kelurahan Gunung Putri</h1>
    <p class="text-white mt-4 max-w-xl mx-auto text-lg drop-shadow">Mewujudkan kelurahan yang unggul, mandiri, dan berdaya saing berbasis pelayanan publik dan potensi lokal.</p>
  </section>

  <!-- Tentang -->
  <section class="fade-in px-6 py-10 max-w-5xl mx-auto">
    <div class="glass p-8 rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">📌 Tentang Kelurahan</h2>
      <p class="text-gray-800 text-justify leading-relaxed">
        Kelurahan Gunung Putri berada di Kecamatan Gunung Putri, Kabupaten Bogor, Jawa Barat. Wilayah ini memiliki potensi alam dan budaya yang khas, terdiri dari beberapa dusun seperti Cikeas Udik, Gunung Putri, dan Bojong Nangka. Total penduduk mencapai ±7.300 jiwa dengan kehidupan masyarakat yang dinamis dan produktif.
      </p>
    </div>
  </section>

  <!-- Visi Misi -->
  <section class="fade-in px-6 py-10 max-w-5xl mx-auto">
    <div class="glass p-8 rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-green-700 mb-6">🎯 Visi & Misi</h2>
      <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-green-100 p-6 rounded-xl">
          <h3 class="text-xl font-semibold mb-2">🌟 Visi</h3>
          <p>Menjadi kelurahan maju, partisipatif dan transparan dalam pelayanan dan pembangunan.</p>
        </div>
        <div class="bg-green-50 p-6 rounded-xl">
          <h3 class="text-xl font-semibold mb-2">🎯 Misi</h3>
          <ul class="list-disc ml-5 text-gray-800 space-y-2">
            <li>Meningkatkan pelayanan publik yang cepat dan ramah.</li>
            <li>Memberdayakan potensi wisata dan ekonomi lokal.</li>
            <li>Mengajak warga aktif dalam kegiatan sosial dan lingkungan.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Struktur -->
  <section class="fade-in px-6 py-10 max-w-5xl mx-auto">
    <div class="glass p-8 rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-indigo-700 mb-6">🧭 Struktur Organisasi</h2>
      <div class="grid md:grid-cols-3 gap-6 text-center">
        <div class="bg-white p-4 rounded-lg shadow-md">
          <h4 class="font-bold text-blue-700">Lurah</h4>
          <p>Ahmad Fauzi, S.STP</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
          <h4 class="font-bold text-blue-700">Sekretaris</h4>
          <p>Rina Setyawati, A.Md</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
          <h4 class="font-bold text-blue-700">Kasi Pelayanan</h4>
          <p>Agus Saputra</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Kontak -->
  <section class="fade-in px-6 py-10 max-w-4xl mx-auto">
    <div class="glass p-8 rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">📞 Kontak Kelurahan</h2>
      <ul class="text-gray-800 space-y-2">
        <li>📍 Alamat: Jl. Raya Gunung Putri No. 45, Kab. Bogor</li>
        <li>☎️ Telepon: (0251) 8612 345</li>
        <li>📧 Email: kel.gunungputri@bogorkab.go.id</li>
        <li>🌐 Instagram: @kelurahangunungputri</li>
      </ul>
    </div>
  </section>

  <footer class="text-center text-white py-6 bg-black bg-opacity-70 text-sm">
    &copy; <?= date('Y'); ?> Kelurahan Gunung Putri. Website dibangun untuk informasi dan pelayanan masyarakat.
  </footer>

</body>
</html>
