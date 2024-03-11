<?php
// session_start();

// Khởi tạo giỏ hàng nếu chưa tồn tại
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Thêm sản phẩm vào giỏ hàng
function addToCart($item_id, $item_name, $item_price, $quantity) {
    $item = array(
        'id' => $item_id,
        'name' => $item_name,
        'price' => $item_price,
        'quantity' => $quantity
    );
    $_SESSION['cart'][] = $item;
}

// Bớt sản phẩm khỏi giỏ hàng
function removeFromCart($index) {
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index lại mảng
}

// Cập nhật số lượng sản phẩm trong giỏ hàng
function updateQuantity($index, $quantity) {
    $_SESSION['cart'][$index]['quantity'] = $quantity;
}

// Tính tổng giá trị của giỏ hàng
function calculateTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Kiểm tra giỏ hàng có rỗng hay không
function isCartEmpty() {
    return empty($_SESSION['cart']);
}

?>

<div class="shopping_cart">
    <a href="#"><i class="fa fa-shopping-cart"></i> <?php echo count($_SESSION['cart']); ?> Items - $<?php echo calculateTotal(); ?> <i class="fa fa-angle-down"></i></a>

    <!--mini cart-->
    <div class="mini_cart">
        <?php foreach ($_SESSION['cart'] as $index => $item): ?>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets\img\cart\cart.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#"><?php echo $item['name']; ?></a>
                    <span class="cart_price">$<?php echo $item['price']; ?></span>
                    <span class="quantity">Qty: <?php echo $item['quantity']; ?></span>
                </div>
                <div class="cart_remove">
                    <a title="Remove this item" href="remove_item.php?index=<?php echo $index; ?>"><i class="fa fa-times-circle"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="shipping_price">
            <span> Shipping </span>
            <span>  $7.00  </span>
        </div>
        <div class="total_price">
            <span> total </span>
            <span class="prices">  $<?php echo calculateTotal() + 7; ?>  </span>
        </div>
        <div class="cart_button">
            <a href="checkout.html"> Check out</a>
        </div>
    </div>
</div>
