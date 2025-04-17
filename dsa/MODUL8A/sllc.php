<?php

class SLLC {
    public $val;
    public $next;

    public function __construct($val) {
        $this->val = $val;
        $this->next = null;
    }
}


class Program {
    function CreateNewNode($val) {
        return new SLLC($val);
    }

     function PrintAllSLLC($sllc) {
        if (empty($sllc)){
            echo "List Kosong";
            return;
        }

        while ($sllc != null) {
            echo $sllc->val . " ";
            $sllc = $sllc->next;
        }
    }

     function DeleteBack($sllc) {
        if ($sllc == null) return;
        while ($sllc->next->next != null && $sllc->next != null) {
            $sllc = $sllc->next;
        }
        $sllc->next = null;
    }

     function DeleteFront(&$sllc) {
        if ($sllc == null) return;
        $sllc = $sllc->next;
    }

     function InsertFront(&$list, $newList) {
        $newList->next = $list;
        $list = $newList;
    }

     function InsertBack($list, $newNode) {
        while ($list->next != null) {
            $list = $list->next;
        }
        $list->next = $newNode;
    }

    function ClearList(&$list){
        if ($list == null)return;
        $list = null;
    }
}




?>