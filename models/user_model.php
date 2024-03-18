<?php
    /**
     * Đức: Lấy thông tin liên lạ của người dùng
     */
    function lay_thong_tin_lien_lac_mac_dinh($user_id) {
        $sql = "select contact_id from contact 
        where user_id = $user_id and is_default = 1";
        $row = lay_mot_hang($sql);
        return $row['contact_id'];
    }

?>