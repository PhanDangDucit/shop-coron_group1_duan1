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
    $url = $_SERVER['REQUEST_URI'];
    if($url == "/shop-coron/index.php") {
        header("Location: index.php?page=home");
    }
?>