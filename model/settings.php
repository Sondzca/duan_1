<?php
    function loadall_general_settings(){
        $sql = "SELECT * FROM `hotel_logo` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }

    function update_general_settings($name_ht, $about_us){
        $sql = "UPDATE `hotel_logo` SET `name_hotel`='$name_ht',`about_us`='$about_us' WHERE 1";
        pdo_execute($sql);
    }
?>