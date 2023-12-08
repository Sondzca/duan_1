<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .form{
           position: absolute;
           left: 250px;
           width: 80%;
           top: 100px;
        }
        h2{
            position: absolute;
            left: 700px;
        }
        .search-header{
            position: absolute;
            top: 10px;
        }
        .container{
            position: absolute;
            top: 100px;
            left: 270px;
            width: 1200px;
        }
        h2{
            position: absolute;
            top: 5px;
        }
    </style>
</head>
<body>
<h2>Khách Hàng</h2>
   <div class="container">
     
    <table class="search-header" >
        <thead>
            <tr>
                <th>id_user</th>
                <th>Họ Tên</th>
                <th>Username</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
    <?php
         $host = "localhost";
         $username = "root";
         $password = "";
         $dbname = "asm_php1";

         $conn = new mysqli($host,$username,$password,$dbname);
// câu lệnh
        $sql = "SELECT * FROM user ORDER BY id_user,hoten,username,password,phone,email";

        $result = mysqli_query($conn , $sql);

        while($r = mysqli_fetch_assoc($result)){
            ?>

             <tr>
                <td><?php echo $r['id_user'];?> </td>
                <td><?php echo $r['hoten'];?></td>
                <td><?php echo $r['username'];?></td>
                <td><?php echo $r['password'];?></td>
                <td><?php echo $r['phone'] ;?></td>
                <td><?php echo $r['email'];?></td>
               

          <?php
       }
       
//
?>
 
    </table>
    </form>
    </div>
</body>
</html>


