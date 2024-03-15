<?php
    require_once "../models/pdo.php";
    require_once "../models/user_model.php";
    require_once "../models/cart_model.php";
    require_once "../models/order_model.php";

    /**
     * Đức: Tính số tiền cần thanh toán
     */
    require_once "../utils/tinh_tong_so_tien_can_thanh_toan.php";

    /**
     * Loại bỏ bug xảy ra khi thêm sản phẩm vào order
     * Khi thoát khỏi trang order mà không đặt hàng
     *   thì tiến hành xóa 2 bảng order và order_item để tránh tạo ra dữ liệu mà không được sử dụng
     */
    $contact_id = lay_thong_tin_lien_lac_mac_dinh($user_id);
    $ket_qua_kiem_tra_order = kiem_tra_su_ton_tai_order($user_id); 
    if($ket_qua_kiem_tra_order) {
        $order_id = $ket_qua_kiem_tra_order['order_id'];
        delete_order($order_id);
        xoa_order_item_null($order_id);
    }

    /**
     * Thêm tất cả sản phẩm từ giỏ hàng vào bảng order_item
     */
    $order_id_created = tao_order($user_id, $contact_id);
    print_r($order_id_created);
    tao_order_item($user_id, $order_id_created['order_id']);
    $tat_ca_san_pham_cart = lay_tat_ca_san_pham_trong_cart_item($user_id);
    
    header('Location: ../index.php?page=order');
?>