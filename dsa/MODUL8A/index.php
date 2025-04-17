<?php
include 'SLLC.php'; // assuming your class is in SLLC.php

$program = new Program();
$list = new SLLC(33);
$list->next = new SLLC(22);
$list->next->next = new SLLC(11);
$list->next->next->next = new SLLC(44);

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
        $program->PrintAllSLLC($list);

        echo "<br>Hapus node pertama<br>";
        $program->DeleteFront($list);
        echo "<u>Isi linked list setelah dihapus:</u>";
        $program->PrintAllSLLC($list);
        echo "<br>Hapus node terakhir<br>";
        $program->DeleteBack($list);
        echo "<u>Isi linked list setelah dihapus:</u>";
        $program->PrintAllSLLC($list);

        echo "Hapus semua node : <br>";
        $program->ClearList($list);
        echo "Linked List berhasil dihapus<br>";
        echo "Isi linked List setelah dihapus:";
        $program->PrintAllSLLC($list);
    ?>
</div>

</body>
</html>
