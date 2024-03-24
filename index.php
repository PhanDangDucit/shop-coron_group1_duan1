<?php
    require_once "controllers/index.php";
    
?>
<!doctype php>
<php class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Coron - Fashion eCommerce Bootstrap4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\css\plugin.css">
        <link rel="stylesheet" href="assets\css\bundle.css">
        <link rel="stylesheet" href="assets\css\style.css">
        <link rel="stylesheet" href="assets\css\responsive.css">
        <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--pos page start-->
        <div class="pos_page">
            <div class="container">
                <!--pos page inner-->
                <div class="pos_page_inner">
                    <?php
                        require_once "views/components/header.php";
                    ?>
                    <?php
                        /**
                         *  Kiểm tra trang hiện tại là trang nào
                         *  ví dụ với link: localhost:8080/index.php?page=home
                         *  Trang hiện tại là trang home --> $page có giá trị là "home"
                         * 
                         *  */
                        if($url == "/shop-coron/index.php?page=$page") {
                            switch($page) {
                                case "cart":
                                    require_once "views/cart.php";;
                                    break;
                                case "order":
                                    require_once "views/order.php";
                                    break;
                                case "home":
                                    require_once "views/index.php";
                                    // modal area start
                                    require_once "views/components/modal.php";
                                    // modal area end 
                                    break;
                                case "payment-success":
                                    require_once "views/order-success.php";
                                    break;
                            }
                        }
                        else {
                            require_once "views/404.php";
                        }
                    ?>
                    <?php
                        require_once "views/components/footer.php";
                    ?>            
                </div>
            </div>
    </div>
        <!-- all js here -->
        <script src="assets\js\vendor\jquery-1.12.0.min.js"></script>
        <script src="assets\js\popper.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>
        <script src="assets\js\ajax-mail.js"></script>
        <script src="assets\js\plugins.js"></script>
        <script src="assets\js\main.js"></script>
    </body>
</php>