<?php
    /**
     * Đức: Hàm lấy tất cả các sản phẩm tương ứng với mỗi giỏ hàng, và khách hàng
     */
    function lay_tat_ca_san_pham_trong_cart($cart_id) {
        $sql = "
            select cart_item.product_id from cart
            inner join cart_item
            on cart.cart_id = cart_item.cart_id
            inner join product
            on product.product_id = cart_item.product_id
            where cart.cart_id = $cart_id;
        ";
        return lay_nhieu_hang($sql);
    }

    /**
     * Đức: Hàm lấy tất cả các sản phẩm tương ứng với mỗi giỏ hàng, và khách hàng
     */
    function thanh_tien($cart_id) {
        $sql = "
            select sum(quantity * price) as 'thanhtien'  from cart
            inner join cart_item
            on cart.cart_id = cart_item.cart_id
            inner join product
            on product.product_id = cart_item.product_id
            where cart.cart_id = $cart_id;
        ";
        return lay_mot_hang($sql);
    }
?>