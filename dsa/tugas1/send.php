<?php

//Set array 
class Kota{
    public $namaKota ;
    public $namaBupati;
    function __construct($NamaKota , $NamaBupati ){
        $this->namaKota = $NamaKota;
        $this->namaBupati = $NamaBupati;
    }
};
class Provinsi{
    public $namaProvinsi;
    public $namaGubernur;
    public $kota = array();

    function __construct($NamaProvinsi , $NamaGubernur ){
        $this->namaProvinsi = $NamaProvinsi;
        $this->namaGubernur = $NamaGubernur;
    }

    function addKota($Kota){
        array_push($this->kota ,$Kota);
    }
};


class Negara{
    public $namaNegara;
    public $namaPresiden;
    public $provinsi = array();

    function __construct($NamaNegara , $NamaPresiden){
        $this->namaNegara = $NamaNegara;
        $this->namaPresiden  = $NamaPresiden;
    }

    function addProvinsi($Provinsi){
        array_push($this->provinsi ,$Provinsi);
    }
};


function printNegara($negara)
{
    echo "<h2>Negara: <u>" . $negara->namaNegara . "</u></h2>";
    echo "<strong>Presiden:</strong> " . $negara->namaPresiden . "<br><br>";
    
    foreach ($negara->provinsi as $index => $provinsi) {
        echo "<h3>➤ Provinsi ke-" . ($index+1) . ": " . $provinsi->namaProvinsi . "</h3>";
        echo "Gubernur: <strong>" . $provinsi->namaGubernur . "</strong><br>";

        echo "<ul>";
        foreach ($provinsi->kota as $kota) {
            echo "<li><strong>Kota:</strong> " . $kota->namaKota . " | <strong>Bupati:</strong> " . $kota->namaBupati . "</li>";
        }
        echo "</ul><hr>";
    }
    
}


$negara = new Negara($_POST['name_negara'] , $_POST['name_presiden']);

function tambahKota($nama_kota , $bupati , $provinsi){
    for ($i = 0; $i < count($GLOBALS['negara']->provinsi); $i++){
        if ($provinsi == $GLOBALS['negara']->provinsi[$i]->namaProvinsi){
            $GLOBALS['negara']->provinsi[$i]->addKota(new Kota($nama_kota , $bupati));
        }
    }
}
function addProvinsi($nama_provinsi , $gubernur){
    $GLOBALS['negara']->addProvinsi(new Provinsi($nama_provinsi , $gubernur));
}

for ($i = 0; $i < count($_POST['name_provinsi']); $i++) {
    $nama_provinsi = $_POST['name_provinsi'][$i];
    $nama_gubernur = $_POST['name_gubernur'][$i];
    $nama_kota = $_POST['name_kota'][$i];
    $nama_bupati = $_POST['name_bupati'][$i];

    // Cek apakah provinsi sudah ada
    $found = false;
    foreach ($negara->provinsi as $provinsi) {
        if (strtolower($provinsi->namaProvinsi) == strtolower($nama_provinsi)) {
            // Jika provinsi sudah ada, tambahkan kota ke dalamnya
            $provinsi->addKota(new Kota($nama_kota, $nama_bupati));
            $found = true;
            break;
        }
    }

    // Jika provinsi belum ada, tambahkan provinsi baru dan kota ke dalamnya
    if (!$found) {
        $provBaru = new Provinsi($nama_provinsi, $nama_gubernur);
        $provBaru->addKota(new Kota($nama_kota, $nama_bupati));
        $negara->addProvinsi($provBaru);
    }
}

printNegara($negara);

?>