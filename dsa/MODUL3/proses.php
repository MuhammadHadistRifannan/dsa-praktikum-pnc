<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
</html>

<?php
session_start();

if (!isset($_SESSION['rekening'])) {
    $_SESSION['rekening'] = [0, 0, 0, 0]; // 3 untuk rekening 1 untuk deposit
}

$menu = $_GET['menu'] ?? 0;

// Tambah saldo
if ($menu >= 1 && $menu <= 4) {
    echo "<form method='post'>
        <label>Masukkan Saldo : </label>
        <input type='number' name='saldo' required>
        <input type='hidden' name='menu' value='$menu'>
        <button type='submit'>Tambah</button>
    </form>";
    echo "<br><a href='index.php'>Kembali ke Menu Utama</a>";

    // Jika sudah submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $saldo = (int)$_POST['saldo'];
        $index = (int)$_POST['menu'] - 1;
        $_SESSION['rekening'][$index] += $saldo;

        echo "<p>Saldo sebesar Rp " . number_format($saldo, 0, ',', '.') . " berhasil ditambahkan ke rekening " . ($_POST['menu']) . "</p>";
        echo "<a href='index.php'>Kembali ke Menu Utama</a>";
    }
}

// Tampilkan saldo
elseif ($menu == 5) {
    echo "<h3>Saldo Seluruh Rekening:</h3>";
    echo "Saldo Rekening 1 : Rp " . number_format($_SESSION['rekening'][0], 0, ',', '.') . "<br>";
    echo "Saldo Rekening 2 : Rp " . number_format($_SESSION['rekening'][1], 0, ',', '.') . "<br>";
    echo "Saldo Rekening 3 : Rp " . number_format($_SESSION['rekening'][2], 0, ',', '.') . "<br>";
    echo "Saldo Deposito : Rp " . number_format($_SESSION['rekening'][3], 0, ',', '.') . "<br><br>";
    echo "<a href='index.php'>Kembali ke Menu Utama</a>";
}
else {
    echo "<p>Menu tidak tersedia. <a href='index.php'>Kembali</a></p>";
}
