<?php
    /**
     * Đức: Tính số tiền cần thanh toán
     */
    // $url_his = $_SERVER['HTTP_REFERER'];
    // if($url_his == "http://localhost:8080/shop-coron/index.php?page=cart") {
    require_once "utils/tinh_tong_so_tien_can_thanh_toan.php";
    $ket_qua_kiem_tra_order = kiem_tra_su_ton_tai_order($user_id);
    if($ket_qua_kiem_tra_order){
        $order_id = $ket_qua_kiem_tra_order['order_id'];
        $all_products = lay_tat_ca_san_pham_trong_order_item($order_id);
        print_r($ket_qua_kiem_tra_order);
        echo 'asjbcdjasbcj';
    }
?>

<!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="row">
        <div class="col-12">
            <div class="table_desc">
                <div class="cart_page table-responsive">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th class="product_thumb">Ảnh</th>
                                <th class="product_name">Sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product_quantity">Số lượng</th>
                                <th class="product_total">Tổng tiền</th>
                            </tr>
                        </thead>
                        <?php foreach ($all_products as $item) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="product_thumb"><a href="#"><img src="assets/<?=$item['thumbnail']?>" width="50px" height="50px" alt=""></a></td>
                                    <td class="product_name"><a href="#"><?=$item['name']?></a></td>
                                    <td class="product-price"><?=number_format($item['price'], 0, ',', '.').' đ';?></td>
                                    <td class="product_quantity"><?=$item['quantity']; ?></td>
                                    <td class="product_total">
                                        <?php
                                            $total_price = $item['price'] * $item['quantity'];
                                            echo number_format($total_price, 0, ',', '.').' đ';
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>   
                </div>  
            </div>
        </div>
    </div>
        <!--coupon code area start-->
    <form action="controllers/payment_controller.php" method="post"> 
        <div class="coupon_area">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="order_section">
                        <h3>Thanh toán</h3>
                        <div class="order_inner">
                            <div class="order_subtotal">
                                <p>Chọn phương thức thanh toán:</p>
                                <select class="order_subtotal w-50" name="payment-method">
                                    <?php
                                        $list = lay_phuong_thuc_thanh_toan();
                                        foreach($list as $item) {
                                    ?>
                                        <option value="<?=$item['payment_method_id']?>"><?=$item['method_name']?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="order_subtotal mt-3">
                                <p>Địa chỉ giao hàng:</p>
                                <p>
                                    <?php
                                        $dia_chi_giao_hang = lay_dia_chi_giao_hang($user_id);
                                    ?>
                                    <input name="address" value="<?=$dia_chi_giao_hang['address']?>" disabled>
                                    <input name="order-id" value="<?=$order_id?>" hidden>
                                </p>
                            </div>
                            <div class="order_subtotal">
                                <p>Thành tiền:</p>
                                <p class="cart_amount">
                                    <?=number_format($thanh_tien, 0, ',', '.').' đ';?>
                                </p>
                            </div>
                            <div class="order_subtotal ">
                                <p>Chi phí giao hàng:</p>
                                
                                <p class="cart_amount"><?=number_format($chi_phi_giao_hang, 0, ',', '.').' đ';?></p>
                            </div>
                            <div>
                            </div>
                            <div class="order_subtotal">
                                <p>Tổng cộng:</p>
                                <p class="cart_amount">
                                    <?=number_format($tong_so_tien_can_thanh_toan, 0, ',', '.').' đ';?>
                                </p>
                            </div>
                            <div class="checkout_btn">
                                <!-- <a href="index.php?page=payment" target="blank">Thanh toán</a> -->
                                <button type="submit" name="btn-order">
                                    Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--coupon code area end-->
    </form>
    <!--shopping cart area end -->
</div>