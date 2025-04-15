<?php
include_once '../server/struktur_rekening.php';
session_start();

// Bersihkan semua data antrian
unset($_SESSION['data']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bersihkan Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f5f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }
        .box h2 {
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
        <h2>Semua antrian telah dibersihkan!</h2>
        <a href="../index.php">Kembali ke Menu Utama</a>
    </div>
</body>
</html>
