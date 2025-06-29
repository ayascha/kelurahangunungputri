<?php
include '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event = $_POST['event'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($event && $nama && $email) {
        $stmt = $conn->prepare("INSERT INTO pendaftaran_event (event, nama, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $event, $nama, $email);
        $stmt->execute();
        $stmt->close();

        header("Location: event_terima_kasih.php");
        exit;
    }
}

header("Location: event.php");
exit;
