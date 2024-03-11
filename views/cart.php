<?php
    $cart_id = 1;
    $thanh_tien = thanh_tien($cart_id);
    $chi_phi_giao_hang = 50000;
    $tong_so_tien_can_thanh_toan = $thanh_tien['thanhtien'] + $chi_phi_giao_hang;
?>

<!--shopping cart area start -->
<div class="shopping_cart_area">
        <!-- Xử lý cart -->
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="assets\img\cart\cart17.jpg" alt=""></a></td>
                                    <td class="product_name"><a href="#">Handbag fringilla</a></td>
                                    <td class="product-price">£65.00</td>
                                    <td class="product_quantity"><input min="0" max="100" value="1" type="number"></td>
                                    <td class="product_total">£130.00</td>
                                </tr>

                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="assets\img\cart\cart18.jpg" alt=""></a></td>
                                    <td class="product_name"><a href="#">Handbags justo</a></td>
                                    <td class="product-price">£90.00</td>
                                    <td class="product_quantity"><input min="0" max="100" value="1" type="number"></td>
                                    <td class="product_total">£180.00</td>
                                </tr>
                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="assets\img\cart\cart19.jpg" alt=""></a></td>
                                    <td class="product_name"><a href="#">Handbag elit</a></td>
                                    <td class="product-price">£80.00</td>
                                    <td class="product_quantity"><input min="0" max="100" value="1" type="number"></td>
                                    <td class="product_total">£160.00</td>
                                </tr>

                            </tbody>
                        </table>   
                            </div>  
                            <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </div>      
                        </div>
                        </div>
                    </div>
        <!-- Coupon code -->
                    <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input placeholder="Coupon code" type="text">
                                    <button type="button">Apply coupon</button>
                                </div>    
                            </div>
                        </div>
                        <!-- Xử lý trước khi order -->
                        <div class="col-lg-6 col-md-6">
                                <div class="coupon_code">
                                    <h3>Cart Totals</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Thành tiền</p>
                                            <p class="cart_amount">
                                                <?=$thanh_tien['thanhtien']?>
                                            </p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Chi phí giao hàng:</p>
                                            <p class="cart_amount"><?=$chi_phi_giao_hang?></p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Tổng cộng:</p>
                                            <p class="cart_amount">
                                                <?=$tong_so_tien_can_thanh_toan?>
                                            </p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a href="controllers/order_controller.php">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
        </div>
        <!--shopping cart area end -->
</div>