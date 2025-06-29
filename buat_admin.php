<?php
include 'includes/koneksi.php';

// Ganti username dan password di bawah jika perlu
$username = "admin";
$password = "admin123";

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Cek dulu apakah username sudah ada
$cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "Username sudah ada!";
} else {
    $insert = mysqli_query($conn, "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')");
    if ($insert) {
        echo "✅ Admin berhasil dibuat!<br>";
        echo "Username: $username<br>";
        echo "Password: $password<br>";
    } else {
        echo "❌ Gagal membuat admin: " . mysqli_error($conn);
    }
}
?>
