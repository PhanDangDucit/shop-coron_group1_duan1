<?php
    /**
     * Đức: Hàm lấy tất cả các sản phẩm tương ứng với mỗi giỏ hàng, và khách hàng
     */
    function lay_tat_ca_san_pham_trong_cart_item($user_id) {
        $sql = "
            select cart_item.product_id, quantity, price_sale from cart_item
            inner join product 
            on cart_item.product_id = product.product_id
            where user_id = $user_id;
        ";
        return lay_nhieu_hang($sql);
    }
?>