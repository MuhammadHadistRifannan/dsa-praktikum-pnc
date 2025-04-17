<?php

class Node {
    public $val;
    public $next;

    public function __construct($val) {
        $this->val = $val;
        $this->next = null;
    }
}

class SLLCList {
    public $head;
    public $tail;

    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    public function CreateNewNode($val) {
        return new Node($val);
    }

    public function InsertFront($val) {
        $newNode = $this->CreateNewNode($val);
        if ($this->head === null) {
            $this->head = $this->tail = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->head = $newNode;
        }
    }

    public function InsertBack($val) {
        $newNode = $this->CreateNewNode($val);
        if ($this->tail === null) {
            $this->head = $this->tail = $newNode;
        } else {
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
    }

    public function DeleteFront() {
        if ($this->head === null) return;

        $this->head = $this->head->next;

        // Kalau habis, tail juga harus null
        if ($this->head === null) {
            $this->tail = null;
        }
    }

    public function DeleteBack() {
        if ($this->head === null) return;

        if ($this->head === $this->tail) {
            $this->head = $this->tail = null;
            return;
        }

        $current = $this->head;
        while ($current->next !== $this->tail) {
            $current = $current->next;
        }
        $current->next = null;
        $this->tail = $current;
    }

    public function PrintAll() {
        $curr = $this->head;
        while ($curr !== null) {
            echo $curr->val . " ";
            $curr = $curr->next;
        }
    }
    public function Clear() {
        $this->head = null;
        $this->tail = null;
    }
    
}
