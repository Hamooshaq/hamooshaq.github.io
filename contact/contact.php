<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validasi data
    if (empty($name) || empty($email) || empty($message)) {
        echo "Semua field harus diisi.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email tidak valid.";
        exit;
    }

    // Pengaturan email
    $to = 'Hamooshaq@gmail.com'; // Ganti dengan email Anda
    $subject = 'Pesan dari Portofolio';
    $body = "Nama: $name\nEmail: $email\nPesan:\n$message";
    $headers = "From: $email";

    // Mengirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "Pesan Anda telah dikirim!";
    } else {
        echo "Gagal mengirim pesan. Silakan coba lagi.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}
?>

