<!-- File: index.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelurahan Gunung Putri</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta http-equiv="refresh" content="3;url=menu.php">
  <style>
    body {
      background: url('images/bg_mountain.png') no-repeat center center fixed;
      background-size: cover;
    }
    .fade-in {
      animation: fadeIn 2s ease-in-out;
    }
    @keyframes fadeIn {
      0% { opacity: 0; transform: scale(0.9);}
      100% { opacity: 1; transform: scale(1);}
    }
  </style>
</head>
<body class="h-screen flex justify-center items-center text-white text-center">

  <div class="fade-in">
    <h1 class="text-4xl md:text-5xl font-bold mb-2">🌄 Kelurahan Gunung Putri</h1>
    <p class="text-lg md:text-xl">Menjelajah Alam, Budaya & Masyarakat</p>
    <p class="text-sm mt-4 text-gray-300">Memuat... Mohon tunggu</p>
  </div>

</body>
</html>
