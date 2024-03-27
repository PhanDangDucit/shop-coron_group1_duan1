<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Product - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>
<style>
    .form-control{
        padding:0 0 5px 10px !important;
    }
</style>
<body>
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <a class="navbar-brand" href="index.php?page=dashboard">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="products.php">
                            <i class="fas fa-shopping-cart"></i> Sản phẩm
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="accounts.php">
                            <i class="far fa-user"></i> Tài khoản
                        </a>
                    </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="category.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                            <span>
                                Danh mục<i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-block" href="login.php">
                Trang quản trị, <b>Đăng xuất</b>
            </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Cập nhật sản phẩm</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <?php
                        require "./config/config.php";
                        include './model/conn.php';
                        $product_id = intval($_GET['product_id']);

                        try {
                            $query = "SELECT * 
                                      FROM product 
                                      WHERE product_id = :product_id";
                            $stmt = $conn->prepare($query);
                            $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
                            $stmt->execute();
                            $product = $stmt->fetch(PDO::FETCH_ASSOC);

                            $query2 = "SELECT * 
                                       FROM category";
                            $stmt2 = $conn->prepare($query2);
                            $stmt2->execute();
                            $categories = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <form action="./model/edit-product.php?product_id=<?php echo $product['product_id']; ?>" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="name">Tên sản phẩm</label>
                                <input id="name" name="name" type="text" value="<?php echo $product['name']; ?>" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Giá gốc</label>
                                <input id="price" name="price" type="text" value="<?php echo $product['price']; ?>" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="price_sale">Giá Khuyến mãi</label>
                                <input id="price_sale" name="price_sale" type="text" value="<?php echo $product['price_sale']; ?>" class="form-control validate" required />
                            </div>
                            <img width="200px" height="200px" src="../assets/<?php echo $product['thumbnail']; ?>" alt="">
                            <div class="form-group mb-3">
                                <label for="thumbnail">Hình ảnh sản phẩm</label>
                                
                                <input id="thumbnail" name="thumbnail" type="file" accept="image/*" class="form-control-file"  />
                            </div>
                            
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="form-group mb-3">
                                <label for="description">Mô tả sản phẩm</label>
                                <textarea id="description" name="description" class="form-control validate" rows="3" required><?php echo $product['description']; ?></textarea>
                            </div>
                            <div class="form-group mb-3" style="padding:0 0 0 0 !important;">
                                <label for="category">Chọn danh mục sản phẩm</label>
                                <select id="category" name="category" class="form-control validate" required>
                                    <?php
                                    foreach ($categories as $category) {
                                        echo '<option value="' . $category['category_id'] . '">' . $category['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Cập nhật ngay</button>
                        </div>
                        </form>
                        <?php
                        } catch (PDOException $e) {
                            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Bản quyền của Vũ &copy; <b>2023</b>
                <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link"></a>
            </p>
        </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $("#expire_date").datepicker();
        });
    </script>
</body>

</html>