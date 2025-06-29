<?php
session_start();
include '../includes/koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); // ← sudah diperbaiki

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        // Debug: tampilkan input dan hash (hapus kalau sudah tidak perlu)
        // echo "Password dari input: " . $password . "<br>";
        // echo "Password di database: " . $data['password'] . "<br>";

        if (password_verify($password, $data['password'])) {
            $_SESSION['admin'] = $data['username'];
            header("Location: ../dashboard/dashboard_admin.php");
            exit;
        } else {
            $error = "❌ Password salah!";
        }
    } else {
        $error = "❌ Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Login Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
</head>
<body class="flex items-center justify-center min-h-screen font-sans bg-cover bg-center" style="background-image: url('../images/bg_mountain.jpg');">
  <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold mb-4 text-center text-blue-900">Login Admin</h1>
    
    <?php if ($error): ?>
      <p class="text-red-600 text-sm mb-3 text-center"><?= $error; ?></p>
    <?php endif; ?>

    <form method="POST">
      <input type="text" name="username" placeholder="Username" required class="w-full mb-3 p-2 border rounded" />
      <input type="password" name="password" placeholder="Password" required class="w-full mb-3 p-2 border rounded" />
      <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded hover:bg-blue-800 transition">Login</button>
    </form>

    <div class="text-center mt-4">
      <a href="../menu.php" class="text-blue-600 text-sm hover:underline">← Kembali ke menu</a>
    </div>
  </div>
</body>
</html>
