<?php
    function loadall_admin(){
        $sql= "SELECT * FROM `admin_cred` ORDER BY role desc";
        $result = pdo_query($sql);
        return $result;
    }

    function insert_admin($name, $password, $role){
        $sql = "INSERT INTO `admin_cred`(`admin_name`, `admin_pass`, `role`) VALUES ('$name','$password','$role')";
        pdo_execute($sql);
    }

    function delete_admin($id){
        $sql = "DELETE FROM `admin_cred` WHERE sr_no = '$id'";
        pdo_execute($sql);
    }

    function load_one_admin($id){
        $sql= "SELECT * FROM `admin_cred` WHERE sr_no = '$id'";
        $result = pdo_query_one($sql);
        return $result; 
    }

    function update_admin($id_admin, $name, $password, $role){
        $sql = "UPDATE `admin_cred` SET `admin_name`='$name',`admin_pass`='$password',`role`='$role' WHERE `sr_no`='$id_admin'";
        pdo_execute($sql);
    }
?>