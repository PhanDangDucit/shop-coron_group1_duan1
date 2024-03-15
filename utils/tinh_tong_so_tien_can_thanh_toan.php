<?php
    $user_id = 2;
    $ketqua = lay_tat_ca_san_pham_trong_cart_item($user_id);
    $chi_phi_giao_hang = 1000000;
    $thanh_tien = 0;
    foreach($ketqua as $item) {
        $thanh_tien += $item['quantity'] * $item['price_sale'];
    }
    $tong_so_tien_can_thanh_toan = $thanh_tien + $chi_phi_giao_hang;
?>