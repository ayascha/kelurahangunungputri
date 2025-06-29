<?php
include '../includes/koneksi.php';

// Proses simpan data baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama_dusun'];
    $penduduk = $_POST['jumlah_penduduk'];
    $kk = $_POST['jumlah_kk'];

    mysqli_query($conn, "INSERT INTO dusun (nama_dusun, jumlah_penduduk, jumlah_kk) VALUES ('$nama', '$penduduk', '$kk')");
}

// Ambil data total
$total = mysqli_query($conn, "SELECT SUM(jumlah_penduduk) AS total_penduduk, SUM(jumlah_kk) AS total_kk FROM dusun");
$summary = mysqli_fetch_assoc($total);

// Ambil data chart
$chartLabels = [];
$chartData = [];
$dataDusun = mysqli_query($conn, "SELECT * FROM dusun");
while ($row = mysqli_fetch_assoc($dataDusun)) {
    $chartLabels[] = $row['nama_dusun'];
    $chartData[] = $row['jumlah_penduduk'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Dusun</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center font-sans" style="background-image: url('../images/bg_mountain.jpg');">
  <div class="bg-black bg-opacity-60 min-h-screen px-6 py-10">
    <div class="max-w-6xl mx-auto">
      <h1 class="text-4xl text-white font-bold mb-8 text-center animate-pulse">Data Dusun Kelurahan Gunung Putri</h1>

      <!-- Ringkasan -->
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8 text-center text-white">
        <div class="bg-blue-600 bg-opacity-80 p-6 rounded-xl shadow-lg">
          <div class="text-2xl font-bold"><?= number_format($summary['total_penduduk']); ?></div>
          <div class="text-sm mt-1">Total Penduduk</div>
        </div>
        <div class="bg-green-600 bg-opacity-80 p-6 rounded-xl shadow-lg">
          <div class="text-2xl font-bold"><?= number_format($summary['total_kk']); ?></div>
          <div class="text-sm mt-1">Total Kepala Keluarga</div>
        </div>
        <div class="bg-yellow-600 bg-opacity-80 p-6 rounded-xl shadow-lg">
          <div class="text-2xl font-bold"><?= count($chartLabels); ?></div>
          <div class="text-sm mt-1">Jumlah Dusun</div>
        </div>
      </div>

      <!-- Chart -->
      <div class="bg-white bg-opacity-90 rounded-xl p-6 mb-10 shadow-lg">
        <canvas id="pieChart"></canvas>
      </div>

      <!-- Form Tambah Dusun -->
      <div class="bg-white bg-opacity-80 rounded-xl p-6 mb-10 shadow-lg">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Dusun Baru</h2>
        <form method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <input type="text" name="nama_dusun" placeholder="Nama Dusun" required class="p-2 border rounded" />
          <input type="number" name="jumlah_penduduk" placeholder="Jumlah Penduduk" required class="p-2 border rounded" />
          <input type="number" name="jumlah_kk" placeholder="Jumlah KK" required class="p-2 border rounded" />
          <button type="submit" name="tambah" class="col-span-1 md:col-span-3 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded transition">+ Tambah Dusun</button>
        </form>
      </div>

      <!-- Data Per Dusun -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php
        $dusunLagi = mysqli_query($conn, "SELECT * FROM dusun");
        while ($row = mysqli_fetch_assoc($dusunLagi)): ?>
          <div class="bg-white bg-opacity-90 backdrop-blur-lg rounded-xl shadow-lg p-6 hover:scale-105 transform transition duration-300">
            <h2 class="text-xl font-semibold text-blue-900"><?= htmlspecialchars($row['nama_dusun']); ?></h2>
            <p class="text-gray-700 mt-2">👥 Penduduk: <strong><?= number_format($row['jumlah_penduduk']); ?></strong></p>
            <p class="text-gray-700">🏠 Kepala Keluarga: <strong><?= number_format($row['jumlah_kk']); ?></strong></p>
          </div>
        <?php endwhile; ?>
      </div>

      <!-- Kembali -->
      <div class="text-center mt-10">
        <a href="../menu.php" class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-lg transition">← Kembali ke Menu</a>
      </div>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('pieChart').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: <?= json_encode($chartLabels); ?>,
        datasets: [{
          label: 'Jumlah Penduduk',
          data: <?= json_encode($chartData); ?>,
          backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          },
          title: {
            display: true,
            text: 'Distribusi Penduduk per Dusun'
          }
        }
      }
    });
  </script>
</body>
</html>
