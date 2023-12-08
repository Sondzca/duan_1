<?php
    function loadContact(){
        $sql = "SELECT * FROM `contact_details` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }

    function update_contact($address, $ggmap, $pn1, $pn2, $email, $fb, $tw, $insta, $iframe){
        $sql = "UPDATE `contact_details` SET `address`='$address',`gmap`='$ggmap',`pn1`='$pn1',`pn2`='$pn2',`email`='$email',`fb`='$fb',`insta`='$insta',`tw`='$tw',`iframe`='$iframe' WHERE 1";
        pdo_execute($sql);
    }
?>