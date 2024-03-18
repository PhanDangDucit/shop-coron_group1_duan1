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
                                    ?>
                                    <!-- modal area start --> 
                                        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="modal_body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-5 col-sm-12">
                                                                    <div class="modal_tab">  
                                                                        <div class="tab-content" id="pills-tabContent">
                                                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                                                <div class="modal_tab_img">
                                                                                    <a href="#"><img src="assets\img\product\product13.jpg" alt=""></a>    
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                                                <div class="modal_tab_img">
                                                                                    <a href="#"><img src="assets\img\product\product14.jpg" alt=""></a>    
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                                                <div class="modal_tab_img">
                                                                                    <a href="#"><img src="assets\img\product\product15.jpg" alt=""></a>    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal_tab_button">    
                                                                            <ul class="nav product_navactive" role="tablist">
                                                                                <li>
                                                                                    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets\img\cart\cart17.jpg" alt=""></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets\img\cart\cart18.jpg" alt=""></a>
                                                                                </li>
                                                                                <li>
                                                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets\img\cart\cart19.jpg" alt=""></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>    
                                                                    </div>  
                                                                </div> 
                                                                <div class="col-lg-7 col-md-7 col-sm-12">
                                                                    <div class="modal_right">
                                                                        <div class="modal_title mb-10">
                                                                            <h2>Handbag feugiat</h2> 
                                                                        </div>
                                                                        <div class="modal_price mb-10">
                                                                            <span class="new_price">$64.99</span>    
                                                                            <span class="old_price">$78.99</span>    
                                                                        </div>
                                                                        <div class="modal_content mb-10">
                                                                            <p>Short-sleeved blouse with feminine draped sleeve detail.</p>    
                                                                        </div>
                                                                        <div class="modal_size mb-15">
                                                                        <h2>size</h2>
                                                                            <ul>
                                                                                <li><a href="#">s</a></li>
                                                                                <li><a href="#">m</a></li>
                                                                                <li><a href="#">l</a></li>
                                                                                <li><a href="#">xl</a></li>
                                                                                <li><a href="#">xxl</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="modal_add_to_cart mb-15">
                                                                            <form action="#">
                                                                                <input min="0" max="100" step="2" value="1" type="number">
                                                                                <button type="submit">add to cart</button>
                                                                            </form>
                                                                        </div>   
                                                                        <div class="modal_description mb-15">
                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>    
                                                                        </div> 
                                                                        <div class="modal_social">
                                                                            <h2>Share this product</h2>
                                                                            <ul>
                                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                            </ul>    
                                                                        </div>      
                                                                    </div>    
                                                                </div>    
                                                            </div>     
                                                        </div>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div> 
                                    <!-- modal area end --> 
                                    
                                    <?php
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