<?php
    /**
     * Đức: Hàm này dùng để lấy tất cả phương thức thanh toán trong database
     */
    function lay_phuong_thuc_thanh_toan() {
        $sql = "select * from payment_method";
        return lay_nhieu_hang($sql);
    }

    /**
     * Đức: Hàm này dùng để lấy địa chỉ giao hàng trong database
     */
    function lay_dia_chi_giao_hang($contact_id) {
        $sql = "select address from contact
            where contact_id = '$contact_id'";
        return lay_mot_hang($sql);
    }

    /**
     * Đức: Hàm này dùng để tạo order trong database
     */
    function tao_order($user_id, $contact_id, $total_price) {
        $sql = "insert into orders (user_id, contact_id, total_price) 
        values (?, ?, ?)";
        return thay_doi_du_lieu($sql, $user_id, $contact_id, $total_price);
    }

    /**
     * Đức: Hàm này dùng để kiểm tra order đã được tạo
     * mà chưa được đặt hàng trước khi tạo một order mới.
     * Chúng dựa trên ngày order (ở đây là cột order_date) là null 
     * trong database
     */
    function kiem_tra_su_ton_tai_order($user_id) {
        $sql = "select order_id from orders
            where user_id = $user_id and order_date is null;
        ";
        return lay_mot_hang($sql);
        // return lay_nhieu_hang($sql);
    }
    /**
     * Đức: Hàm này dùng để xóa những order chưa được đặt hàng trước đó
     *  tương ứng với order_id đã lấy ở hàm "kiem_tra_su_ton_tai_order($user_id)" trong database
     */
    function delete_order($order_id) {
        $sql = "DELETE FROM orders where order_id = $order_id";
        thay_doi_du_lieu($sql);
    }
    /**
      * Đức: Hàm này dùng để xóa những order_item chưa được đặt hàng trước đó
     *  tương ứng với order_id đã lấy ở hàm "kiem_tra_su_ton_tai_order($user_id)" 
     * và được gọi từ hàm xoa_order_item_null($order_item_id) trong database
     */
    function delete_order_item($order_item_id) {
        $sql = "DELETE FROM order_item where order_item_id = $order_item_id";
        thay_doi_du_lieu($sql);
    }
    /**
     * Đức: Hàm này dùng để lấy những order_item chưa được đặt hàng trước đó
     *  tương ứng với order_id đã lấy ở hàm "kiem_tra_su_ton_tai_order($user_id)"
     */
    function xoa_order_item_null($order_id) {
        $sql = "select order_item_id from order_item where order_id = $order_id";
        $rows = lay_nhieu_hang($sql);
        foreach($rows as $item) {
            delete_order_item($rows['order_item_id']);
        }
    }
    
    /**
     * Đức: Hàm này dùng để lấy order id trong database
     */
    // function lay_order_id($user_id) {
    //     $sql = "select order_id from order where user_id = $user_id";
    //     return lay_mot_hang($sql);
    // }
?>