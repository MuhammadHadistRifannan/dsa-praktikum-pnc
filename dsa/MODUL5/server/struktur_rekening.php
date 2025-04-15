<?php

class Rekening{
    public $nama;
    public $nomorRekening;

    function __construct($nama , $noRek){
        $this->nama = $nama;
        $this->nomorRekening = $noRek;
    }
}

?>