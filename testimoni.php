<?php
include '../includes/koneksi.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $komentar = htmlspecialchars($_POST['komentar']);
    $rating = (int)$_POST['rating'];

    if ($nama && $komentar && $rating >= 1 && $rating <= 5) {
        $query = "INSERT INTO testimoni (nama, komentar, rating) VALUES ('$nama', '$komentar', $rating)";
        mysqli_query($conn, $query);
        $success = "✅ Testimoni berhasil dikirim!";
    } else {
        $error = "❌ Semua data wajib diisi!";
    }
}

$result = mysqli_query($conn, "SELECT * FROM testimoni ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Testimoni - Kelurahan Gunung Putri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <style>
    body {
      background-image: url('../images/bg_mountain.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    .glass {
      background: rgba(255,255,255,0.2);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255,255,255,0.3);
    }
    .carousel {
      scroll-snap-type: x mandatory;
      overflow-x: auto;
      display: flex;
      gap: 1rem;
    }
    .carousel-item {
      flex: 0 0 100%;
      scroll-snap-align: start;
    }
    .avatar {
      width: 40px;
      height: 40px;
      background-color: #4f46e5;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 9999px;
      font-weight: bold;
    }
  </style>
</head>
<body class="text-white font-sans">

  <!-- Header -->
  <div class="glass p-4 flex justify-between items-center fixed top-0 w-full z-50">
    <h1 class="text-xl font-bold">💬 Testimoni Warga</h1>
    <a href="../menu.php" class="text-sm bg-white text-gray-900 px-3 py-1 rounded hover:bg-gray-200">← Kembali ke Menu</a>
  </div>

  <main class="pt-24 px-4 pb-20 max-w-5xl mx-auto">
    <!-- Carousel -->
    <h2 class="text-3xl font-bold text-center mb-6">Apa Kata Mereka?</h2>
    <div class="carousel pb-6">
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="carousel-item glass p-6 rounded-xl shadow-xl min-w-full" data-aos="fade-up">
        <div class="flex items-center gap-3 mb-2">
          <div class="avatar"><?= strtoupper(substr($row['nama'], 0, 1)) ?></div>
          <div>
            <h3 class="text-lg font-bold text-white"><?= htmlspecialchars($row['nama']) ?></h3>
            <p class="text-xs text-gray-200"><?= date('d M Y', strtotime($row['tanggal'])) ?></p>
          </div>
        </div>
        <p class="text-sm text-white italic mb-2">"<?= htmlspecialchars($row['komentar']) ?>"</p>
        <div class="flex gap-1">
          <?php for ($i = 1; $i <= $row['rating']; $i++) echo "<i class='ph-fill ph-star text-yellow-400'></i>"; ?>
          <?php for ($i = $row['rating']+1; $i <= 5; $i++) echo "<i class='ph ph-star text-gray-400'></i>"; ?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

    <!-- Form -->
    <section class="glass mt-14 p-6 rounded-xl shadow-xl" data-aos="fade-up">
      <h2 class="text-2xl font-semibold mb-4 text-white">Tulis Testimoni</h2>
      <?php if ($error): ?><p class="text-red-300"><?= $error ?></p><?php endif; ?>
      <?php if ($success): ?><p class="text-green-300"><?= $success ?></p><?php endif; ?>

      <form method="POST" class="grid gap-4">
        <input type="text" name="nama" placeholder="Nama Anda" required class="p-2 rounded bg-white text-gray-800" />
        <textarea name="komentar" placeholder="Komentar atau pesan..." rows="3" required class="p-2 rounded bg-white text-gray-800"></textarea>
        <select name="rating" required class="p-2 rounded bg-white text-gray-800">
          <option value="">Rating (1-5)</option>
          <option value="5">🌟🌟🌟🌟🌟</option>
          <option value="4">🌟🌟🌟🌟</option>
          <option value="3">🌟🌟🌟</option>
          <option value="2">🌟🌟</option>
          <option value="1">🌟</option>
        </select>
        <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white py-2 rounded">Kirim</button>
      </form>
    </section>
  </main>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>
