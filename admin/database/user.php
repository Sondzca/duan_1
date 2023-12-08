

<?php
   function checkuser($username,$password){
      $sql = "SELECT * from user where username=? and password=?";
      return pdo_query_one($sql,$username,$password);
   }
?>

