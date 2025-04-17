<?php
include 'SLLC.php'; // assuming your class is in SLLC.php

$program = new SLLCList();
$list = new Node(33);
$list->next = new Node(22);
$list->next->next = new Node(11);
$list->next->next->next = new Node(44);
$program->head = $list;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SLLC Handler</title>
    
</head>
<body>

<h2>Singly Linked List (SLLC) Manipulator</h2>

<div class="list-output">
    <h3>Current List:</h3>
    <?php
        echo "<u>Isi linked list:</u>";
        $program->PrintAll();

        echo "<br>Hapus node pertama<br>";
        $program->DeleteFront();
        echo "<u>Isi linked list setelah dihapus:</u>";
        $program->PrintAll();
        echo "<br>Hapus node terakhir<br>";
        $program->DeleteBack();
        echo "<u>Isi linked list setelah dihapus:</u>";
        $program->PrintAll();

        echo "Hapus semua node : <br>";
        $program->Clear();
        echo "Linked List berhasil dihapus<br>";
        echo "Isi linked List setelah dihapus:";
        $program->PrintAll();
    ?>
</div>

</body>
</html>
