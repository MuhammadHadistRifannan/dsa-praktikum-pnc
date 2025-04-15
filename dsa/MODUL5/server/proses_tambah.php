<?php
include_once 'struktur_rekening.php';

session_start();

$data = isset($_SESSION['data']) ? $_SESSION['data'] : array();

if (isset($_POST['tambah'])){
    array_push($data , new Rekening($_POST['nama'] , $_POST['rekening']));
    $_SESSION['data'] = $data;
    echo "Data ditambah<br>";
    echo "<a href='../index.php'>Kembali</a>";
}


?>