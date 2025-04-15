<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9eef3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 100%;
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Data Antrian</h2>
        <form action="../server/proses_tambah.php" method="post">
            <label>Nama Nasabah:</label>
            <input type="text" name="nama" required>
            
            <label>Nomor Rekening:</label>
            <input type="text" name="rekening" required>
            
            <button type="submit" name="tambah">Tambah</button>
        </form>
        <a href="../index.php" class="back-link">Kembali ke Menu Utama</a>
    </div>
</body>
</html>
