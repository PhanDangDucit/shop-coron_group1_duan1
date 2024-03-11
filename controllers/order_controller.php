<?php
    require_once "../models/pdo.php";
    require_once "../models/cart_model.php";
    require_once "../models/order_model.php";

    $cart_id = 1;
    $thanh_tien = thanh_tien($cart_id);
    $chi_phi_giao_hang = 50000;
    $total_price = $thanh_tien['thanhtien'] + $chi_phi_giao_hang;
    $user_id = 2;
    $contact_id = 2;
    
    $ket_qua_kiem_tra_order = kiem_tra_su_ton_tai_order($user_id); 
    print_r($ket_qua_kiem_tra_order);

    if($ket_qua_kiem_tra_order) {
        $order_id = $ket_qua_kiem_tra_order['order_id'];
        delete_order($order_id);
        xoa_order_item_null($user_id);
    }
    tao_order($user_id, $contact_id, $total_price);
    
    $tat_ca_san_pham_cart = lay_tat_ca_san_pham_trong_cart($cart_id);
    
    header('Location: ../index.php?page=order');

    // $is_exists_order_id = check_order_id();
    // if($is_exists_order_id) {
    
    // }
    // $order_id = lay_order_id($user_id);
    // echo $order_id;
    // $cart_items = lay_thong_tin_tu_cart_item($user_id);
    // them_order_item($order_id, $product_id, $quantity);
    // $list_sanpham_order = lay_toan_bo_san_pham_da_duoc_order($order_id);
?>