<?php
include 'includes/koneksi.php';

$username = "admin";
$password = "admin123";

$query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    echo "Hash di database: " . $data['password'] . "<br>";
    echo "Password input: " . $password . "<br>";

    if (password_verify($password, $data['password'])) {
        echo "✅ BERHASIL LOGIN!";
    } else {
        echo "❌ PASSWORD SALAH!";
    }
} else {
    echo "❌ USERNAME TIDAK DITEMUKAN!";
}
