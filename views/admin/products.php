<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>
<style>
    
.tm-content-row{
    margin-right: -650px !important;
}
</style>
<body id="reportsPage">
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <a class="navbar-brand" href="index.html">
                <h1 class="tm-site-title mb-0">Trang quản trị</h1>
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto h-100">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-tachometer-alt"></i> Trang chủ
                            <span class="sr-only">(Hiện tại)</span>
                        </a>
                    </li>
 <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="oder.php" >
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Đơn hàng <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="products.php">
                            <i class="fas fa-shopping-cart"></i> Sản phẩm
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="accounts.php">
                            <i class="far fa-user"></i> Tài khoản
                        </a>
                    </li>
                     <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="category.php" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Danh mục<i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            
                        </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-block" href="login.html">
                Quản trị viên, <b>Đăng xuất</b>
              </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table" >
                            <thead>
                                <tr>
                                    <th scope="col">Mã sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Giá gốc</th>
                                    <th scope="col">Giá khuyến mãi</th>
                                    <th scope="col">Hình ảnh sản phẩm</th>
                                    <th scope="col">Lượt xem</th>
                                    <th scope="col">Ngày đăng</th>
                                    <th scope="col">&nsc;</th>
                                </tr>
                            </thead>

<?php
require "./config/config.php";
include './model/conn.php';

try {
    $query = "SELECT * FROM product";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        echo '<tr>';
        echo '<td  onclick="window.location.href = \'edit-product.php?product_id=' . $product['product_id'] . '\';" class="product-name">' . $product['product_id'] . '</td>';
        echo '<td  onclick="window.location.href = \'edit-product.php?product_id=' . $product['product_id'] . '\';" class="product-name">' . $product['name'] . '</td>';
        echo '<td>' . $product['description'] . '</td>';
        echo '<td>' . $product['price'] . '</td>';
        echo '<td>' . $product['price_sale'] . '</td>';
        echo '<td  onclick="window.location.href = \'edit-product.php?product_id=' . $product['product_id'] . '\';"><img style="width:150px;height:150px" src="../assets/' . $product['thumbnail'] . '" alt="Product Image"></td>';
         echo '<td>' . $product['views'] . '</td>';
        echo '<td>' . $product['post_date'] . '</td>';
        echo '<td>';
       
        echo '<a href="#" class="tm-product-delete-link" onclick="deleteProduct(' . $product['product_id'] . ', this); return false;">';
        echo '<i class="far fa-trash-alt tm-product-delete-icon"></i>';
        echo '</a>';
        echo '</td>';
        echo '</tr>';
    }
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
}
?>







<script>
function deleteProduct(productId, linkElement) {
    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "model/delete_product.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
               
                console.log(xhr.responseText);
                
                
                if (xhr.responseText === "Xóa sản phẩm thành công!") {
                    var row = linkElement.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                }
            }
        };
        xhr.send("productId=" + productId);
    }
}
</script>
                        </table>
                    </div>
                    <!-- table container -->
                    <a href="add-product.php" class="btn btn-primary btn-block text-uppercase mb-3">Thêm sản phẩm mới</a>
                   
                </div>
            </div>
        </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2018</b> All rights reserved. Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
            </p>
        </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $(".tm-product-name").on("click", function() {
                window.location.href = "edit-product.html";
            });
        });
    </script>
</body>

</html>