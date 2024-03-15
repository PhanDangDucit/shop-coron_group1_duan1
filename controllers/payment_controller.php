<?php
    require_once "../models/pdo.php";
    require_once "../models/order_model.php";
    if(isset($_POST['btn-order'])) {
        $order_id = $_POST['order-id'];
        $payment_method_id = $_POST['payment-method'];
        update_du_lieu_khi_order($order_id, $payment_method_id);
        //redirect đến trang lịch sử giao hàng
        header("location:../index.php?page=order_history");
    }
?>