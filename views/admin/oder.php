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
.tm-content-row {
    margin-right: -650px !important;
}
</style>

<body id="reportsPage">
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
                        <a class="nav-link dropdown-toggle active" href="oder.php" >
                            <i class="far fa-file-alt"></i>
                            <span>
                                Đơn hàng <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
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
    <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table"    >
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">SDT</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Địa chỉ </th>
                                    <th scope="col">Trạng thái thanh toán</th>
                                    <th scope="col">Trạng thái đơn hàng</th>
                                     <th scope="col">Cập nhật</th>
                                    
                                </tr>
                            </thead>

                            <?php
require "./config/config.php";
include './model/conn.php';


try {
    

    $query = "SELECT * FROM orders  

    INNER JOIN payment_method ON payment_method.payment_method_id = orders.payment_method_id 
    INNER JOIN order_status ON orders.order_status_id = order_status.order_status_id
    INNER JOIN contact ON orders.contact_id = contact.contact_id
    INNER JOIN user ON contact.user_id=user.user_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $query2= "SELECT * FROM order_status";
    $stmt = $conn->prepare($query2);
    $stmt->execute();
    $order_status = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($orders as $order) {
        echo '<tr>';
        echo '<td class="tm-product-name">' . $order['order_id'] . '</td>';
        echo '<td class="tm-product-name">' . $order['fullname'] . '</td>';
        echo '<td>' . $order['phone'] . '</td>';
        echo '<td>' . $order['email'] . '</td>';
        echo '<td>' . $order['address'] . '</td>';
        echo '<td>' . $order['payment_status'] . '</td>';
        echo '<td>' ;
        if ($order['payment_status']==0) echo "Chưa thanh toán"; 
        else echo "Đã thanh toán"; 
         '</td>';
        echo '<td>' . '<form action="model/update_order.php" method="post" enctype="multipart/form-data" class="tm-edit-product-form">' . '<input name="order_id" value="' . $order['order_id'] . '" style="display:none !important;">' . '<select id="order_status_id" name="order_status_id">';
foreach ($order_status as $o) {
    echo '<option value="' . $o['order_status_id'] . '"';
    if ($o['order_status_id'] == $order['order_status_id']) {
        echo ' selected'; 
    }
    echo '>' . $o['value'] . '</option>';
}
echo '</select>' . '</td>';
        echo '<td>  ';
        echo '<input type="submit"></input>';

        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
}
?>


                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2018</b> All rights reserved. Design: <a rel="nofollow noopener"
                    href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
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