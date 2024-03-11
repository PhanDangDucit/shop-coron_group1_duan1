<?php
    $cart_id = 1;
    $user_id = 2;
    $thanh_tien = thanh_tien($cart_id);
    $chi_phi_giao_hang = 50000;
    $total_price = $thanh_tien['thanhtien'] + $chi_phi_giao_hang;
?>

<!--shopping cart area start -->
<div class="shopping_cart_area">
        <form action="controller/order.php"> 
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product_thumb"><a href="#"><img src="assets\img\cart\cart17.jpg" alt=""></a></td>
                                            <td class="product_name"><a href="#">Handbag fringilla</a></td>
                                            <td class="product-price">£65.00</td>
                                            <td class="product_quantity">1</td>
                                            <td class="product_total">£130.00</td>
                                        </tr>
                                    </tbody>
                                </table>   
                            </div>  
                        </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="order_section">
                                <h3>Thanh toán</h3>
                                <div class="order_inner">
                                    <div class="order_subtotal">
                                        <p>Chọn phương thức thanh toán:</p>
                                        <select class="order_subtotal w-50" name="method_name">
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
                                        </p>
                                    </div>
                                    <div class="order_subtotal">
                                        <p>Thành tiền:</p>
                                        <p class="cart_amount">
                                                <?=$thanh_tien['thanhtien']?>
                                        </p>
                                    </div>
                                    <div class="order_subtotal ">
                                        <p>Chi phí giao hàng:</p>
                                        <p class="cart_amount"><?=$chi_phi_giao_hang?></p>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="order_subtotal">
                                        <p>Tổng cộng:</p>
                                        <p class="cart_amount"><?=$total_price?></p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="#">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form> 
        </div>
        <!--shopping cart area end -->
</div>