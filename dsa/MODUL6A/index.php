<?php
session_start();

// ==== Kelas ====
class Buku {
    public $judul;
    public $harga;

    public function __construct($h, $j) {
        $this->harga = $h;
        $this->judul = $j;
    }
}

class BukuNode {
    public $val;
    public $next;

    public function __construct($v, $n = null) {
        $this->val = $v;
        $this->next = $n;
    }
}

// ==== Fungsi Manipulasi Linked List ====
function AddBookFront(&$head, $newNode) {
    $newNode->next = $head;
    $head = $newNode;
}

function AddBookLast($head, $newNode) {
    $current = $head;
    while ($current->next != null) {
        $current = $current->next;
    }
    $current->next = $newNode;
}

function DeleteBookFront(&$head) {
    if ($head == null) return;
    $temp = $head;
    $head = $head->next;
    unset($temp);
}

function DeleteBookLast($head) {
    if ($head == null || $head->next == null) {
        $head = null;
        return;
    }
    $current = $head;
    while ($current->next->next != null) {
        $current = $current->next;
    }
    unset($current->next);
    $current->next = null;
}

function PrintAllBook($head) {
    $output = "";
    $t = $head;
    $i = 1;
    while ($t != null) {
        $output .= "<tr><td>$i</td><td>{$t->val->judul}</td><td>Rp " . number_format($t->val->harga, 0, ',', '.') . "</td></tr>";
        $t = $t->next;
        $i++;
    }
    return $output;
}

// ==== Inisialisasi Linked List (kalau belum ada) ====
if (!isset($_SESSION['head'])) {
    $head = new BukuNode(new Buku(400, "Donald Bebek"));
    $head->next = new BukuNode(new Buku(500, "Siksa Kubur"));
    $head->next->next = new BukuNode(new Buku(700, "Pemrograman Dasar"));
    $_SESSION['head'] = serialize($head);
}

// ==== Proses Form ====
$head = unserialize($_SESSION['head']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aksi = $_POST['aksi'] ?? '';
    $judul = $_POST['judul'] ?? '';
    $harga = $_POST['harga'] ?? '';

    if ($aksi === 'tambah_depan' && $judul && $harga) {
        AddBookFront($head, new BukuNode(new Buku($harga, $judul)));
    } elseif ($aksi === 'tambah_belakang' && $judul && $harga) {
        AddBookLast($head, new BukuNode(new Buku($harga, $judul)));
    } elseif ($aksi === 'hapus_depan') {
        DeleteBookFront($head);
    } elseif ($aksi === 'hapus_belakang') {
        DeleteBookLast($head);
    }

    $_SESSION['head'] = serialize($head);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku (Linked List)</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 30px;
            background: #f4f4f4;
        }

        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        input, button, select {
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Manajemen Data Buku</h1>

    <form method="POST">
        <label>Judul Buku:</label>
        <input type="text" name="judul" placeholder="Contoh: Belajar PHP">

        <label>Harga Buku:</label>
        <input type="number" name="harga" placeholder="Contoh: 50000">

        <button type="submit" name="aksi" value="tambah_depan">Tambah di Depan</button>
        <button type="submit" name="aksi" value="tambah_belakang">Tambah di Belakang</button>
        <button type="submit" name="aksi" value="hapus_depan">Hapus dari Depan</button>
        <button type="submit" name="aksi" value="hapus_belakang">Hapus dari Belakang</button>
    </form>

    <h2>Daftar Buku:</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Harga Buku</th>
            </tr>
        </thead>
        <tbody>
            <?= PrintAllBook($head) ?>
        </tbody>
    </table>
</div>

</body>
</html>
