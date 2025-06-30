<?php
// Node class
class Node {
    public $data;
    public $next;
    public $prev;

    function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

// Double Circular Linked List class
class DoubleCircularLinkedList {
    public $head = null;
    public $tail = null;

    // Tambah di depan
    function insertFront($data) {
        $newNode = new Node($data);
        if ($this->head == null) {
            $this->head = $this->tail = $newNode;
            $newNode->next = $newNode->prev = $newNode;
        } else {
            $newNode->next = $this->head;
            $newNode->prev = $this->tail;
            $this->head->prev = $newNode;
            $this->tail->next = $newNode;
            $this->head = $newNode;
        }
    }

    // Tambah di belakang
    function insertBack($data) {
        $newNode = new Node($data);
        if ($this->tail == null) {
            $this->head = $this->tail = $newNode;
            $newNode->next = $newNode->prev = $newNode;
        } else {
            $newNode->prev = $this->tail;
            $newNode->next = $this->head;
            $this->tail->next = $newNode;
            $this->head->prev = $newNode;
            $this->tail = $newNode;
        }
    }

    // Hapus dari depan
    function deleteFront() {
        if ($this->head == null) return;
        if ($this->head == $this->tail) {
            $this->head = $this->tail = null;
        } else {
            $this->head = $this->head->next;
            $this->head->prev = $this->tail;
            $this->tail->next = $this->head;
        }
    }

    // Hapus dari belakang
    function deleteBack() {
        if ($this->tail == null) return;
        if ($this->head == $this->tail) {
            $this->head = $this->tail = null;
        } else {
            $this->tail = $this->tail->prev;
            $this->tail->next = $this->head;
            $this->head->prev = $this->tail;
        }
    }

    // Tampilkan semua data
    function display() {
        if ($this->head == null) {
            echo "List kosong\n";
            return;
        }
        $current = $this->head;
        do {
            echo $current->data . " ";
            $current = $current->next;
        } while ($current != $this->head);
        echo "\n";
    }

    // Hapus semua data
    function clear() {
        $this->head = $this->tail = null;
    }
}

// Contoh penggunaan
$list = new DoubleCircularLinkedList();

//tambah data 
$list->insertBack(55);
$list->insertBack(11);
$list->insertBack(33);
$list->insertBack(44);
echo "Isi Linked List: <br>";
$list->display();
echo "<br>Hapus node pertama<br>";
$list->deleteFront();
echo "Isi linked List setelah dihapus<br>";
$list->display();
echo "<br>Hapus node terakhir<br>";
$list->deleteBack();
echo "<br>Isi Linked list setelah dihapus<br>";
$list->display();
echo "<br>Hapus semua node <br>";
$list->clear();
echo "isi linked list setelah dihapus <br>";
$list->display();

?>

