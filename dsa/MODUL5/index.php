<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Antrian Nasabah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f3f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        a {
            display: block;
            margin: 10px 0;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Menu Antrian Nasabah</h2>
        <a href="fungsi/tambah.php">1. Tambah Data Antrian</a>
        <a href="fungsi/hapus.php">2. Hapus Data Antrian</a>
        <a href="fungsi/bersih.php">3. Bersihkan Antrian</a>
        <a href="fungsi/cetak.php">4. Cetak Antrian</a>
    </div>
</body>
</html>
