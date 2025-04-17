<?php
session_start();

// ======================
// Class Definitions
// ======================

class ListNode {
    public $val;
    public $next;

    public function __construct($val, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class LinkedList {
    public $head;

    public function __construct() {
        $this->head = null;
    }

    public function insertFront($val) {
        $newNode = new ListNode($val, $this->head);
        $this->head = $newNode;
    }

    public function insertBack($val) {
        $newNode = new ListNode($val);
        if ($this->head === null) {
            $this->head = $newNode;
            return;
        }

        $temp = $this->head;
        while ($temp->next !== null) {
            $temp = $temp->next;
        }
        $temp->next = $newNode;
    }

    public function deleteFront() {
        if ($this->head !== null) {
            $this->head = $this->head->next;
        }
    }

    public function deleteBack() {
        if ($this->head === null) return;

        if ($this->head->next === null) {
            $this->head = null;
            return;
        }

        $temp = $this->head;
        while ($temp->next->next !== null) {
            $temp = $temp->next;
        }
        $temp->next = null;
    }

    public function display() {
        $output = "";
        $temp = $this->head;
        while ($temp !== null) {
            $output .= htmlspecialchars($temp->val) . " → ";
            $temp = $temp->next;
        }
        return $output ? rtrim($output, " → ") : "(empty)";
    }
}

// ======================
// Load from Session
// ======================

if (!isset($_SESSION['linkedList'])) {
    $_SESSION['linkedList'] = serialize(new LinkedList());
}

$linkedList = unserialize($_SESSION['linkedList']);

// ======================
// Handle Form
// ======================

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'] ?? '';
    $value = trim($_POST['value'] ?? '');

    switch ($action) {
        case 'insert_front':
            if ($value !== "") {
                $linkedList->insertFront($value);
            }
            break;
        case 'insert_back':
            if ($value !== "") {
                $linkedList->insertBack($value);
            }
            break;
        case 'delete_front':
            $linkedList->deleteFront();
            break;
        case 'delete_back':
            $linkedList->deleteBack();
            break;
        case 'reset':
            $linkedList = new LinkedList();
            break;
    }

    $_SESSION['linkedList'] = serialize($linkedList);
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Linked List Web Interface</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
</head>
<body>
    <h1>Linked List Web Manager</h1>

    <form method="post">
        <input type="text" name="value" placeholder="Enter a value" />
        <div class="button-group">
        <button type="submit" name="action" value="insert_front">Insert at Front</button>
        <button type="submit" name="action" value="insert_back">Insert at Back</button><br>
        <button type="submit" name="action" value="delete_front">Delete Front</button>
        <button type="submit" name="action" value="delete_back">Delete Back</button>
        <button type="submit" name="action" value="reset">Reset List</button>
        </div>
    </form>

    <h2>Current Linked List:</h2>
    <div class="list"><?php echo $linkedList->display(); ?></div>
</body>
</html>
