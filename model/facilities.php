<?php
    function loadall_facities(){
        $sql = "SELECT * FROM `facilities` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }

    function insert_facilities($name, $icon, $description){
        $sql = "INSERT INTO `facilities`(`icon`, `name`, `description`) VALUES ('$icon','$name','$description')";
        pdo_execute($sql);
    }

    function delete_facilities($id){
        $sql = "DELETE FROM `facilities` WHERE id = '$id'";
        pdo_execute($sql);
    }

    function load_one_facilities($id){
        $sql = "SELECT * FROM `facilities` WHERE id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function update_facilities($name, $description, $target_file, $id){
        $sql = "UPDATE `facilities` SET `icon`='$target_file',`name`='$name',`description`='$description' WHERE `id`='$id'";
        pdo_execute($sql);
    }
?>