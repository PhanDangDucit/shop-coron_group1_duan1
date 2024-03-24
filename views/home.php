<!--pos home section-->
<div class=" pos_home_section">
<div class="row pos_home">
    <div class="col-lg-3 col-md-8 col-12">
        <!--sidebar banner-->
        <!-- <div class="sidebar_widget banner mb-35">
            <div class="banner_img mb-35">
                <a href="#"><img src="assets\img\banner\banner5.jpg" alt=""></a>
            </div>
            <div class="banner_img">
                <a href="#"><img src="assets\img\banner\banner6.jpg" alt=""></a>
            </div>
        </div> -->
        <!--sidebar banner end-->

        <!--categorie menu start-->
        <div class="sidebar_widget catrgorie mb-35">
            <h3>Danh mục</h3>
            <ul>
                <?php foreach($categorys as $categorys) : ?>
                    <li class="has-sub"><a href="#"><i class="fa fa-caret-right"></i> <?=$categorys["name"] ?></a>
                <?php endforeach; ?>
            </ul>
        </div>
        <!--categorie menu end-->
    </div>
    <div class="col-lg-9 col-md-12">
        <!--banner slider start-->
        <div class="banner_slider slider_1">
            <div class="single_slider" style="background-image: url(assets/img/banner/banner_3.jpg)">
                <div class="slider_content">  
                    <div class="slider_content_inner">  
                        <h1>Best Collection</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                        <a href="#">shop now</a>
                    </div> 
                </div> 
            </div>
            <!-- <div class="slider_active owl-carousel">
                <div class="single_slider" style="background-image: url(assets/img/slider/slide_1.png)">
                    <div class="slider_content">
                        <div class="slider_content_inner">  
                            <h1>Women's Fashion</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                            <a href="#">shop now</a>
                        </div>     
                    </div>    
                </div>
                <div class="single_slider" style="background-image: url(assets/img/slider/slider_2.png)">
                    <div class="slider_content">
                        <div class="slider_content_inner">  
                            <h1>New Collection</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                            <a href="#">shop now</a>
                        </div>         
                    </div>         
                </div>
                <div class="single_slider" style="background-image: url(assets/img/slider/slider_3.png)">
                    <div class="slider_content">  
                        <div class="slider_content_inner">  
                            <h1>Best Collection</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                            <a href="#">shop now</a>
                        </div> 
                    </div> 
                </div>
            </div> -->
        </div> 
        <!--banner slider start-->

        <!--new product area start-->
        <div class="new_product_area">
            <div class="block_title">
                <h3>Sản phẩm khuyến mãi</h3>
            </div>
            <div class="row mb-4">
                <?php foreach($products as $product) : ?>
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="?page=single-product.php&id=<?= $product["product_id"] ?>"><img src="assets\img\product\product1.jpg" alt=""></a> 
                                <div class="img_icone">
                                    <img src="assets\img\cart\span-new.png" alt="">
                                </div>
                                <div class="product_action">
                                    <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price"><del style="color: gray;"><?= number_format($product["price"]) ?> đ</del></span>
                                <span class="product_price"><?= number_format($product["price_sale"]) ?> đ</span>
                                <h3 class="product_title"><a href="?page=single-product.php"><?= $product['name'] ?></a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="#" title="Thêm vào yêu thích">Thêm vào yêu thích</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">Chi tiết</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Pagination -->
                <nav aria-label="Page navigation example" style="width: 100%; display: flex; justify-content: center;">
                    <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="?page-nr=1" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for($counter = 1; $counter <= $pages; $counter++) : ?>
                        <li class="page-item"><a class="page-link" href="?page-nr=<?= $counter ?>"><?= $counter ?></a></li>
                    <?php endfor ; ?>    
                    <li class="page-item">
                        <a class="page-link" href="?page-nr=<?= $pages ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    </ul>
                </nav>
            </div>
        </div> 
        <!--new product area start-->  

        <!--featured product end--> 
        <div class="featured_product">
            <div class="block_title">
                <h3>Sản phẩm xem nhiều nhất</h3>
            </div>
            <div class="row">
                <?php foreach($featuredProducts as $product) : ?>
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="?page=single-product.php"><img src="assets\img\product\product1.jpg" alt=""></a> 
                                <div class="img_icone">
                                    <img src="assets\img\cart\span-new.png" alt="">
                                </div>
                                <div class="product_action">
                                    <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price"><?= number_format($product["price"]) ?> đ</span>
                                <h3 class="product_title"><a href="single-product.php"><?= $product['name'] ?></a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="#" title="Thêm vào yêu thích">Thêm vào yêu thích</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">Chi tiết</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>       
        </div>
        <!--banner area start-->
        <div class="banner_area mb-60">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner">
                        <a href="index.php?page=shop"><img src="assets\img\banner\banner7.jpg" alt=""></a>
                        <div class="banner_title">
                            <p>Up to <span> 40%</span> off</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner">
                        <a href="index.php?page=shop"><img src="assets\img\banner\banner8.jpg" alt=""></a>
                        <div class="banner_title title_2">
                            <p>sale off <span> 30%</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</div>  
</div>