<?php
    function loadall_room(){
        $sql = 'SELECT * FROM `rooms` WHERE 1';
        $result = pdo_query($sql);
        return $result;
    }

    function load_one_room($id){
        $sql = "SELECT * FROM `rooms` WHERE id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function update_rooms($idroom,$idroom_type, $name, $price, $children, $adult, $description, $Facilities1, $Facilities2, $Facilities3, $Facilities4, $Features1, $Features2, $Features3, $Features4, $target_flie)
    {
        $sql = "UPDATE `rooms` SET `name`='$name',`price`='$price',`children`='$children',`adult`='$adult',`img`='$target_flie',`description`='$description',`facilities1`='$Facilities1',`facilities2`='$Facilities2',`facilities3`='$Facilities3',
        `facilities4`='$Facilities4',`features1`='$Features1',`features2`='$Features2',`features3`='$Features3',`features4`='$Features4',`id_room_type`='$idroom_type' 
        WHERE `id`='$idroom'";
        pdo_execute($sql);
    }

    function delete_room($id){
        $sql = "DELETE FROM `rooms` WHERE id = '$id'";
        pdo_query($sql);
    }

    function load_3_room(){
        $sql = "SELECT * FROM `rooms` WHERE 1 order by id asc limit 0,3";
        $result = pdo_query($sql);
        return $result;
    }

    function loadall_features_room($id_room){
        $sql = "SELECT f.name FROM `features` as f 
        INNER JOIN `room_features` as rf ON f.id = rf.features_id
        WHERE rf.room_id = $id_room";
        $result = pdo_query($sql);
        return $result;
    }

    function loadall_facilities_room($id_room){
        $sql= "SELECT f.name FROM `facilities` as f
        INNER JOIN `room_facilities` as rf
        ON f.id = rf.facilities_id
        WHERE rf.room_id=$id_room";
        $result = pdo_query($sql);
        return $result;
    }

    function insert_room($name, $price, $children, $adult, $id_room_type, $description, $Facilities1, $Facilities2, $Facilities3, $Facilities4, $Features1, $Features2, $Features3, $Features4, $target_flie){
        $sql = "INSERT INTO `rooms`(`name`, `price`, `children`, `adult`, `img`, `description`, `facilities1`, `facilities2`, `facilities3`, `facilities4`, `features1`, `features2`, `features3`, `features4`, `id_room_type`) 
        VALUES ('$name','$price','$children','$adult','$target_flie','$description','$Facilities1','$Facilities2','$Facilities3','$Facilities4','$Features1','$Features2','$Features3','$Features4','$id_room_type')";
        pdo_execute($sql);
    }

    function insert_room_feature($room_id, $feature_id){
        $sql = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES ('$room_id','$feature_id')";
        pdo_execute($sql);
    }

    function insert_room_facilities($room_id, $facility_id){
        $sql = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES ('$room_id','$facility_id')";
        pdo_execute($sql);
    }

    function select_id_max_room(){
        $sql = "SELECT * FROM `rooms` ORDER BY id DESC LIMIT 1";
        $result = pdo_query_one($sql);
        return $result;
    }

    function select_room_one($id){
        $sql = "SELECT * FROM `rooms` WHERE id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function load_room_facilities($id){
        $sql = "SELECT * FROM `room_facilities` WHERE room_id = '$id'";
        $result = pdo_query($sql);
        return $result;
    }

    // function update_room($name,$id_room_type,$idroom){
    //     $sql = "UPDATE `rooms` SET `name`='$name',`id_room_type`='$id_room_type'
    //     WHERE id = $idroom";
    //     pdo_execute($sql);
    // }

    function update_room_facilities($facility_id, $room_id){
        $sql = "UPDATE `room_facilities` SET `facilities_id`='$facility_id' WHERE `room_id`='$room_id'";
        pdo_execute($sql);
    }

    function update_room_features($feature_id, $room_id){
        $sql = "UPDATE `room_features` SET `features_id`='$feature_id' WHERE `room_id`='$room_id'";
        pdo_execute($sql);
    }

    function load_room_type(){
        $sql = "SELECT * FROM `room_type` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }

?>