<?php
include_once '../server/struktur_rekening.php';
session_start();
$antrian = isset($_SESSION['data']) ? $_SESSION['data'] : array();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f3f6;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        .empty {
            text-align: center;
            color: #999;
            font-style: italic;
        }
        .back-link {
            display: block;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border-radius: 6px;
        }
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Antrian Nasabah</h2>

        <?php if (count($antrian) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Nasabah</th>
                        <th>No Rekening</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($antrian); $i++){?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $antrian[$i]->nama?></td>
                            <td><?= $antrian[$i] ->nomorRekening?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="empty">Antrian kosong.</p>
        <?php endif; ?>

        <a href="../index.php" class="back-link">Kembali ke Menu Utama</a>
    </div>
</body>
</html>
