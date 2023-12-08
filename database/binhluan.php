
<?php
   require_once "pdo.php";
     
   function binhluan_insert($iduser,$idpro,$noidung,$ngaybinhluan){
       $sql = "INSERT INTO binhluan( iduser,idpro,noidung,ngaybinhluan) VALUES (????)";
       pdo_execute($sql,$iduser,$idpro,$noidung,$ngaybinhluan);

   }

   function binhluan_select_all(){
    $sql = "SELECT *FROM binhluan ORDER BY id DESC  ";
    return pdo_query($sql);
   }
?>