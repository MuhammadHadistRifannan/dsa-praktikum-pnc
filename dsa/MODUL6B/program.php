<?php

class Node {
    public $data;
    public $next;
    public function __construct($data) {
    $this->data = $data;
    $this->next = null;
    }
   }
   class LinkedList {
    private $head;
    public function __construct() {
    $this->head = null;
    }
    public function InsertD($data) {
    $newNode = new Node($data);
    $newNode->next = $this->head;
    $this->head = $newNode;
    }
    public function InsertB($data) {
    $newNode = new Node($data);
    if ($this->head == null) {
    $this->head = $newNode;
    } else {
    $current = $this->head;
    while ($current->next != null) {
    $current = $current->next;
    }
    $current->next = $newNode;
    }
    }
    public function Cetak() {
    $current = $this->head;
    while ($current != null) {
    echo $current->data . " ";
    $current = $current->next;
    }
    echo "<br>";
    }
    public function HapusD() {
    if ($this->head != null) {
    $this->head = $this->head->next;
    }
    }
    public function HapusB() {
    if ($this->head == null) return;
    if ($this->head->next == null) {
    $this->head = null;
    return;
    }
    $current = $this->head;
    while ($current->next->next != null) {
    $current = $current->next;
    }
    $current->next = null;
    }
   }

   $linkedList = new LinkedList();
   $linkedList->InsertD(11);
   $linkedList->InsertB(12);
   $linkedList->InsertB(13);
   echo "Full Linked List<br>";
   $linkedList->Cetak();

   $linkedList->HapusD();
   echo "Hapus node pertama<br>";
   $linkedList->Cetak();
   $linkedList->HapusB();
   echo "Hapus node belakang<br>";
   $linkedList->Cetak();

?>