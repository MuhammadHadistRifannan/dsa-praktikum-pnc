<html> 
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
</html>

<?php
session_start();
$data = isset($_POST['data']) ? $_POST['data'] : "";
// Inisialisasi variable
$num = $data != ""  ? $_SESSION['data'] : array();

//Push array in session variable
if (isset($_POST['push'])){
    foreach (explode("," , $data) as $n){ // split string by parts
        array_push($num  , (int)$n);
    }
    
    foreach ($num as $p){
        echo $p . " ";
    }
    echo "<br><a href='index.php'>Kembali</a>";
    $_SESSION['data'] = $num; //storing data 
}

//pop value di array  
if (isset($_POST['pop']) && isset($_SESSION['data'])){
    if  (empty($_SESSION['data'])){
        echo "Data kosong";
        echo "<br><a href='index.php'>Kembali</a>";
        return;
    }
    array_pop($_SESSION['data']);
    $arr = $_SESSION['data'];
    echo "<script>alert('data terhapus')</script>";
    echo "<a href='index.php'>Kembali</a> ";
}

//melihat data 
if (isset($_POST['show']) && isset($_SESSION['data'])){
    if(empty($_SESSION['data'])){
        echo "Data kosong";
        echo "<br><a href='index.php'>Kembali</a>";
        return;
    }
    foreach ($_SESSION['data'] as $n){
        echo $n . " ";
    }
    echo "<br><a href='index.php'>Kembali</a>";
}

//peak of data 
if (isset($_POST['peak'])  && isset($_SESSION['data'])){
    if(empty($_SESSION['data'])){
        echo "Data kosong";
        echo "<br><a href='index.php'>Kembali</a>";
        return;
    }
    echo end($_SESSION['data']) . "<br>";
    echo "<a href='index.php'>Kembali</a>";
}

//clear data 
if (isset($_POST['clear']) && isset($_SESSION['data'])){
    $_SESSION['data'] = array();
    echo "Data terhapus<br>";
    echo "<a href='index.php'>Kembali </a>";
}

function searchIndex($d)
{
    if (in_array($d , $_SESSION['data']))
    {
        return array_search($d , $_SESSION['data']);
    }
    return -1;
}

//fungsi swap buat nuker 
function swapData($d){
    $index = searchIndex($d);
    if ($index != -1){
        $temp = $_SESSION['data'][$index];
        $_SESSION['data'][$index]  = $_SESSION['data'][count($_SESSION['data']) - 1];
        $_SESSION['data'][count($_SESSION['data']) - 1] = $temp;
    }
}

//swap elemen yang ditemukan ke top elemen 
if (isset($_POST['swap']) && isset($_SESSION['data'])){
    if(empty($_SESSION['data'])){
        echo "Data kosong";
        echo "<br><a href='index.php'>Kembali</a>";
        return;
    }

    $d = $_POST['search'];
    swapData($d);
    foreach ($_SESSION['data'] as $n){
        echo $n . "  ";
    }
    echo "<br><a href='index.php'>Kembali </a>";
}

?>