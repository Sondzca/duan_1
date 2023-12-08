
<?php 
     session_start();
     include "database/pdo.php";
     include "database/binhluan.php";
     


?>

  
<h2>Binh Luan</h2>

<form action="<?php echo $_SERVER['PHP_SELF']?> " method="POST">
      <input type="hidden" name="idpro">
      <textarea name="noidung" id="" cols="100%" rows="5"></textarea> <br> <br>
      <button name="submit" name="guibinhluan">Gửi Bình Luận</button>
</form>
<div class="dsbl">
    <?php $html_bl ?>
<?php
  if(isset($_GET['idpro'])){
       echo $_GET['idpro'];

       if(isset($_POST['guibinhluan'])){
        $idpro = $_POST['idpro'];
        $noidung = $_POST['noidung'];
        $ngaybinhluan = date("H:i:s d/m/Y");
        $iduser = $_SESSION['id_user']['id'];
        binhluan_insert($iduser,$idpro,$noidung,$ngaybinhluan);
       }
  }

  $dsbl = binhluan_select_all();
   $html_bl = "";
  foreach($dsbl as $bl){
   $html_bl.='<p>'.$noidung.'</p>'.$idpro.' (ngaybinhluan)';
  }
?>