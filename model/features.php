<?php
    function loadall_features(){
        $sql = "SELECT * FROM `features` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }
?>