<?php
include '../includes/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM tempat_wisata");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tempat Wisata</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background: url('../images/bg_mountain.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            color: white;
            overflow-x: hidden;
        }
        .container {
            backdrop-filter: blur(10px);
            background: rgba(0, 0, 0, 0.5);
            padding: 40px 20px;
            max-width: 1100px;
            margin: 50px auto;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0,0,0,0.4);
            animation: fadeIn 1s ease;
        }
        .title {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            color: #FFD700;
            text-shadow: 1px 1px 5px black;
        }
        .card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 15px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            animation: slideUp 0.6s ease;
        }
        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(255,255,255,0.3);
        }
        .card img {
            width: 160px;
            height: 110px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #fff;
        }
        .card-content {
            flex: 1;
        }
        .card-content h3 {
            margin: 0;
            font-size: 20px;
            color: #fff;
        }
        .card-content p {
            margin: 5px 0;
            color: #ddd;
            font-size: 14px;
        }
        .card-content a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #ffd700;
            font-weight: bold;
            transition: color 0.3s;
        }
        .card-content a:hover {
            color: #fff;
        }
        .back-button {
            display: inline-block;
            margin-bottom: 30px;
            background: #ffd700;
            color: #000;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            transition: background 0.3s, color 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .back-button:hover {
            background: #fff;
            color: #000;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 600px) {
            .card {
                flex-direction: column;
                align-items: flex-start;
            }
            .card img {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="../menu.php" class="back-button"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    <h1 class="title">Tempat Wisata Kelurahan Gunung Putri</h1>

    <?php while($data = mysqli_fetch_assoc($query)): ?>
        <?php
        $nama_file = pathinfo($data['gambar'], PATHINFO_FILENAME);
        $gambar_path = "../images/" . $nama_file . ".png";
        if (!file_exists($gambar_path)) {
            $gambar_path = "../images/default.png";
        }
        ?>
        <div class="card">
            <img src="<?= $gambar_path ?>" alt="<?= htmlspecialchars($data['nama_wisata']) ?>">
            <div class="card-content">
                <h3><?= htmlspecialchars($data['nama_wisata']) ?></h3>
                <p><strong>Kategori:</strong> <?= htmlspecialchars($data['kategori'] ?? '-') ?></p>
                <a href="detail_wisata.php?id=<?= $data['id'] ?>">Lihat Detail <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
