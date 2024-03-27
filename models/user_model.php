<?php
    /**
     * Đức: Lấy thông tin liên lạ của người dùng
     */
    function lay_thong_tin_lien_lac_mac_dinh($user_id) {
        $sql = "select contact_id from contact 
        where user_id = $user_id and is_default = 0";
        return lay_mot_hang($sql);
    }

    /**
     * Đức: Lấy tất cả thông tin của một user từ `user table`
     */
    function lay_tat_ca_thong_tin_cua_mot_user($user_id) {
        $sql = "select * from user where user_id =$user_id";
        return lay_mot_hang($sql);
    }

    /**
     * Đức: Lấy tất cả thông tin từ bảng contact của 1 user
     */
    function lay_thong_tin_lien_lac_cua_user($user_id) {
        $sql = "select * from contact where user_id = $user_id";
        return lay_nhieu_hang($sql);
    }
?>