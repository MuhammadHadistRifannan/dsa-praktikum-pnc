<?php
// Kelas Node merepresentasikan satu elemen dalam linked list
class Node {
    public $data;     // Menyimpan nilai data
    public $next;     // Pointer ke node berikutnya
    public $prev;     // Pointer ke node sebelumnya

    // Konstruktor untuk inisialisasi node baru
    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

// Kelas untuk mengelola double circular linked list
class DoubleCircularLinkedList {
    private $head = null; // Pointer ke node pertama (HEAD)

    // Fungsi untuk menambahkan node di depan list
    public function insertFront($data) {
        $newNode = new Node($data); // Buat node baru
        if ($this->head === null) { // Jika list kosong
            $newNode->next = $newNode; // next menunjuk dirinya sendiri
            $newNode->prev = $newNode; // prev juga menunjuk dirinya sendiri
            $this->head = $newNode;    // set head ke node baru
        } else {
            $tail = $this->head->prev; // Ambil node terakhir
            $newNode->next = $this->head; // Node baru menunjuk ke head
            $newNode->prev = $tail;       // Node baru menunjuk ke tail
            $tail->next = $newNode;       // Tail menunjuk ke node baru
            $this->head->prev = $newNode; // Head menunjuk kembali ke node baru
            $this->head = $newNode;       // Update head
        }
    }

    // Fungsi untuk menambahkan node di belakang list
    public function insertBack($data) {
        $newNode = new Node($data); // Buat node baru
        if ($this->head === null) { // Jika list kosong
            $newNode->next = $newNode; // Circular: next menunjuk diri sendiri
            $newNode->prev = $newNode; // Circular: prev menunjuk diri sendiri
            $this->head = $newNode;    // Set head ke node baru
        } else {
            $tail = $this->head->prev; // Ambil node terakhir
            $tail->next = $newNode;    // Node terakhir menunjuk ke node baru
            $newNode->prev = $tail;    // Node baru menunjuk kembali ke tail
            $newNode->next = $this->head; // Node baru menunjuk ke head
            $this->head->prev = $newNode; // Head menunjuk kembali ke node baru
        }
    }

    // Fungsi untuk menghapus node di depan list
    public function deleteFront() {
        if ($this->head === null) return; // Jika list kosong, keluar
        if ($this->head->next === $this->head) {
            $this->head = null; // Jika hanya satu node, kosongkan list
        } else {
            $tail = $this->head->prev; // Ambil node terakhir
            $this->head = $this->head->next; // Pindahkan head ke node selanjutnya
            $this->head->prev = $tail; // Node baru menunjuk ke tail
            $tail->next = $this->head; // Tail menunjuk ke head baru
        }
    }

    // Fungsi untuk menghapus node di belakang list
    public function deleteBack() {
        if ($this->head === null) return; // Jika kosong, keluar
        if ($this->head->next === $this->head) {
            $this->head = null; // Jika hanya satu node, kosongkan list
        } else {
            $tail = $this->head->prev;       // Ambil node terakhir
            $newTail = $tail->prev;          // Ambil node sebelum tail
            $newTail->next = $this->head;    // new tail menunjuk ke head
            $this->head->prev = $newTail;    // Head menunjuk ke new tail
        }
    }

    // Fungsi untuk menampilkan seluruh isi list
    public function display() {
        if ($this->head === null) {
            echo "List kosong.\n"; // Jika kosong, tampilkan pesan
            return;
        }
        $current = $this->head; // Mulai dari head
        do {
            echo $current->data . " -> "; // Cetak data
            $current = $current->next;    // Pindah ke node berikutnya
        } while ($current !== $this->head); // Ulang sampai kembali ke head
        echo "(kembali ke HEAD)\n";
    }

    // Fungsi untuk menghapus semua node dalam list
    public function clear() {
        $this->head = null; // Set head menjadi null (otomatis semua unreachable)
    }
}

// ========================
// Contoh penggunaan:
$list = new DoubleCircularLinkedList(); // Buat list baru

// Tambahkan data seperti 55, 11, 33, 44
$list->insertFront(44);
$list->insertFront(33);
$list->insertFront(11);
$list->insertFront(55);

// Tampilkan isi list
$list->display();
echo "<br>";

// Hapus node pertama
echo "Hapus node pertama<br>";
$list->deleteFront();
echo "Isi linked list setelah dihapus: ";
$list->display();
echo "<br>";

// Hapus node terakhir
echo "Hapus node terakhir<br>";
$list->deleteBack();
echo "Isi linked list setelah dihapus: ";
$list->display();
echo "<br>";

// Hapus semua node
echo "Hapus semua node<br>";
$list->clear();
echo "Link List berhasil dihapus<br>";
echo "<br>";

// Tampilkan list kosong
echo "Isi linked list setelah dihapus:<br>";
$list->display();

?>
