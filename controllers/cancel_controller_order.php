<?php
    require_once "../models/pdo.php";
    if(isset($_GET["order_id"])) {
        $idsp = $_GET["order_id"];
    } else {
        $idsp = 0;
    };
    function cancel_order($idsp) {
        $sql = "UPDATE orders SET order_status_id = 5 WHERE order_id = ?";
        return thay_doi_du_lieu($sql, $idsp);
    }
    cancel_order($idsp);
    header("location:../index.php?page=view_order");
?>