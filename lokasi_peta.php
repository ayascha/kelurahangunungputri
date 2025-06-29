<?php include '../includes/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lokasi Wisata Gunung Putri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <style>
    body {
      background: url('../images/bg_mountain.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      color: white;
    }
    .glass-header {
      background: rgba(0,0,0,0.6);
      backdrop-filter: blur(15px);
      padding: 25px;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.5);
      margin: 40px auto 20px;
      max-width: 800px;
      text-align: center;
      animation: fadeInDown 1s ease-out;
    }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    #mapid {
      height: 80vh;
      border-radius: 1rem;
      box-shadow: 0 0 25px rgba(0,0,0,0.6);
      overflow: hidden;
      margin-bottom: 2rem;
      animation: zoomIn 1s ease-in-out;
    }
    @keyframes zoomIn {
      from { opacity: 0; transform: scale(0.8); }
      to { opacity: 1; transform: scale(1); }
    }
    .btn-back {
      background: #ffcc00;
      color: #000;
      padding: 14px 28px;
      font-weight: bold;
      border-radius: 999px;
      text-decoration: none;
      transition: 0.3s;
    }
    .btn-back:hover {
      background: white;
    }
  </style>
</head>
<body class="bg-opacity-80">

  <div class="glass-header">
    <h1 class="text-3xl font-bold">📍 Lokasi Wisata Gunung Putri</h1>
    <p class="text-gray-300">Temukan lokasi wisata terbaik dengan tampilan interaktif & animasi</p>
  </div>

  <div class="flex justify-center px-4">
    <div id="mapid" class="w-full max-w-6xl"></div>
  </div>

  <div class="text-center mb-8">
    <a href="../menu.php" class="btn-back">⬅️ Kembali ke Menu</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
  <script>
    const wisataList = [
      {
        id: 1,
        nama: "Taman Wisata Gunung Putri",
        gambar: "../images/gunung_putri_1.png",
        koordinat: [-6.3962, 106.9338],
        kategori: "Wisata Alam"
      },
      {
        id: 2,
        nama: "Danau Cibeureum",
        gambar: "../images/danau_cibeureum.png",
        koordinat: [-6.4041, 106.9312],
        kategori: "Wisata Air"
      },
      {
        id: 3,
        nama: "Saung Edukasi Herbal",
        gambar: "../images/saung_herbal.png",
        koordinat: [-6.4020, 106.9280],
        kategori: "Edukasi"
      },
      {
        id: 4,
        nama: "Kampung Batik Gunung Putri",
        gambar: "../images/kampung_batik.png",
        koordinat: [-6.3985, 106.9269],
        kategori: "Budaya"
      },
      {
        id: 5,
        nama: "Sungai Cikeas",
        gambar: "../images/sungai_cikeas.png",
        koordinat: [-6.4017, 106.9350],
        kategori: "Alam Terbuka"
      }
    ];

    const map = L.map('mapid').setView([-6.4003, 106.9297], 13);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; OpenStreetMap & CartoDB'
    }).addTo(map);

    const markers = L.markerClusterGroup();

    wisataList.forEach(w => {
      const marker = L.marker(w.koordinat);
      marker.bindPopup(`
        <div style="text-align:center;">
          <img src='${w.gambar}' width='130' style='border-radius:10px; margin-bottom:8px; box-shadow:0 2px 10px rgba(0,0,0,0.4);'><br>
          <strong>${w.nama}</strong><br>
          <em style='color:#ccc;'>Kategori: ${w.kategori}</em><br>
          <a href='detail_wisata.php?id=${w.id}' style='color:#ffc107; font-weight:bold;'>Lihat Detail</a>
        </div>
      `);
      markers.addLayer(marker);
    });

    map.addLayer(markers);
  </script>
</body>
</html>
