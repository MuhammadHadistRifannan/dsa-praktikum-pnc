<?php
include_once '../server/struktur_rekening.php';
session_start();

// Cek apakah antrian ada dan tidak kosong
if (isset($_SESSION['data']) && count($_SESSION['data']) > 0) {
    // Hapus elemen pertama (antrian terdepan)
    array_shift($_SESSION['data']);
    $pesan = "1 data antrian berhasil dihapus.";
} else {
    $pesan = "Antrian kosong. Tidak ada data yang dihapus.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef1f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background-color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .box h2 {
            margin-bottom: 15px;
            color: #333;
        }
        .box a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
        }
        .box a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2><?= $pesan; ?></h2>
        <a href="../index.php">Kembali ke Menu Utama</a>
    </div>
</body>
</html>
