<?php
    function dangnhap_admin($admin_name,$admin_pass){
        $sql = "SELECT * FROM `admin_cred` WHERE admin_name='$admin_name' && admin_pass='$admin_pass'";
        $result = pdo_query_one($sql);
        return $result;
    }
?>