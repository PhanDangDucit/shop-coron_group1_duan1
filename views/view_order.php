<?php
// Kết nối đến cơ sở dữ liệu
// require_once 'models/pdo.php';

try {
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user_id'])) {
        echo "Bạn cần đăng nhập trước khi xem đơn hàng.";
        exit;
    }

    $user_id = $_SESSION['user_id'];

    // Truy vấn để lấy thông tin các đơn hàng của người dùng
    $sql = "SELECT orders.order_id, orders.order_date, orders.payment_status, order_status.value AS order_status, payment_method.method_name, contact.address 
            FROM orders
            INNER JOIN order_status ON orders.order_status_id = order_status.order_status_id
            INNER JOIN payment_method ON orders.payment_method_id = payment_method.payment_method_id
            INNER JOIN contact ON orders.contact_id = contact.contact_id
            WHERE orders.user_id = $user_id";
    $orders = lay_nhieu_hang($sql);

    if (count($orders) > 0) {
        // In ra bảng thông tin các đơn hàng
        echo "<h2>Các đơn hàng của bạn:</h2>";
        echo "<table style='border-collapse: collapse; width: 100%;'>";
        echo "<tr style='background-color: #00BBA6; color: white;'>";
        echo "<th style='padding: 10px;'>STT</th>";
        echo "<th style='padding: 10px;'>Mã đơn hàng</th>";
        echo "<th style='padding: 10px;'>Ngày đặt hàng</th>";
        echo "<th style='padding: 10px;'>Trạng thái thanh toán</th>";
        echo "<th style='padding: 10px;'>Trạng thái đơn hàng</th>";
        echo "<th style='padding: 10px;'>Phương thức thanh toán</th>";
        echo "<th style='padding: 10px;'>Địa chỉ</th>";
        echo "<th style='padding: 10px;'>Hành động</th>"; // Thêm cột "Hành động"
        echo "</tr>";
        $stt = 1;
        foreach ($orders as $order) {
            $order_id = $order["order_id"];
            $order_date = $order["order_date"];
            $payment_status = $order["payment_status"] == 1 ? "Đã thanh toán" : "Chưa thanh toán";
            $order_status = $order["order_status"];
            $method_name = $order["method_name"];
            $address = $order["address"];

            echo "<tr style='border-bottom: 1px solid #ccc;'>";
            echo "<td style='padding: 10px;'>$stt</td>";
            echo "<td style='padding: 10px;'>$order_id</td>";
            echo "<td style='padding: 10px;'>$order_date</td>";
            echo "<td style='padding: 10px;'>$payment_status</td>";
            echo "<td style='padding: 10px;'>$order_status</td>";
            echo "<td style='padding: 10px;'>$method_name</td>";
            echo "<td style='padding: 10px;'>$address</td>";
            echo "<td style='padding: 10px;'>";

            // Kiểm tra nếu đơn hàng đang ở trạng thái chờ xác nhận thì hiển thị nút "Hủy Đơn Hàng"
            if ($order_status == 'chờ xác nhận') {
                echo "<a href='index.php?page=cancel_order=$order_id'>Hủy Đơn Hàng</a>";
            }
            echo "</td>"; // Kết thúc cột "Hành động"
            echo "</tr>";
            $stt++;
        }
        echo "</table>";
    } else {
        echo "Không có đơn hàng nào cho người dùng này.";
    }
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
