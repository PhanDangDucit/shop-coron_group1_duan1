<?php
    /**
     *  Hàm này là hàm được built-in sẵn của php nha
     *  Mở docs của php ra đọc --> session_start()
     *  */
    session_start();
    
    /**
     * import tất cả các file của controller
     * ví dụ: require_once "index.php";
     *  */

    /**
     * import tất cả các file của models
     *  */ 
    require_once "../models/pdo.php";
    /**
     *  Kiểm tra trang hiện tại là trang nào
     *  ví dụ với link: localhost:8080/index.php?page=home
     *  */

    if(isset($_GET["page"])) {
        $page = $_GET["page"];
    } else $page = "";

    switch($page) {
        case "":
            require_once "";
            break;
        default:
            require_once "index.php";
            break;
    }
?>