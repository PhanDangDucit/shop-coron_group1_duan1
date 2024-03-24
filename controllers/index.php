<?php
    /**
     *  Hàm này là hàm được built-in sẵn của php nha
     *  Mở docs của php ra đọc --> session_start()
     *  */
    session_start();
    
    /**
     * import tất cả các file của models
     *  */
    require_once "models/pdo.php";
    require_once "models/cart_model.php";
    require_once "models/order_model.php";

    /**
     * import tất cả các file của controller
     * ví dụ: require_once "index.php";
     *  */
    // 
    if(isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = "";
    };
    $user_id = 2;
    $url = $_SERVER['REQUEST_URI'];
    if($url == "/shop-coron/index.php" || $url == "/shop-coron/") {
        header("Location: index.php?page=home");
    }
    switch($page) {
        case "order":
            require_once "utils/tinh_tong_so_tien_can_thanh_toan.php";
            $ket_qua_kiem_tra_order = kiem_tra_su_ton_tai_order($user_id);
            if($ket_qua_kiem_tra_order){
                $order_id = $ket_qua_kiem_tra_order['order_id'];
                $all_products = lay_tat_ca_san_pham_trong_order_item($order_id);
                print_r($ket_qua_kiem_tra_order);
            } else {
                header("Location: index.php?page=home");
            }
    }
?>