<?php
    function load_about(){
        $sql = "SELECT * FROM `team_details` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }
    
?>