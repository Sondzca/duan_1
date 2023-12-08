<?php
    function insert_room_type($name){
        $sql = "INSERT INTO `rooms_type`(`name`) VALUES ('$name')";
        pdo_execute($sql);
    }

    function delete_room_type($id){
        $sql = "DELETE FROM `rooms_type` WHERE id = '$id'";
        pdo_execute($sql);
    }

    function load_one_room_type($id){
        $sql = "SELECT * FROM `rooms_type` WHERE id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function update_room_type($name, $id){
        $sql = "UPDATE `rooms_type` SET `name`='$name' WHERE `id`='$id'";
        pdo_execute($sql);
    }

    

    function loadall_room_type(){
        $sql = "SELECT * FROM `rooms_type` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }
?>