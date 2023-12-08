<?php
require_once('../database/dbhelper.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Quản Lý Danh Mục</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Thống kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="../category/">Quản lý danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../dashboard.php">Quản lý giỏ hàng</a>
        </li>
    </ul>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Quản lý danh mục</h2>
            </div>
            <div class="panel-body"></div>
            
            <a href="add.php">
                <button class="btn btn-success" style="margin-bottom: 20px">Thêm Danh Mục</button>
            </a>
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="70px">STT</th>
                        <th>Tên danh mục</th>
                        <th width="50px"></th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM category';
                    $categoryList = executeResult($sql);
                    $index = 1;
                    
                    foreach ($categoryList as $item) {
                        echo '<tr>
                                <td>' . $index++ . '</td>
                                <td>' . htmlspecialchars($item['name']) . '</td>
                                <td>
                                    <a href="add.php?id=' . $item['id'] . '">
                                        <button class="btn btn-warning">Sửa</button> 
                                    </a>
                                </td>
                                <td>            
                                    <button class="btn btn-danger" onclick="deleteCategory(' . $item['id'] . ')">Xoá</button>
                                </td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function deleteCategory(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?');
            if (!option) {
                return;
            }

            $.post('ajax.php', {
                'id': id,
                'action': 'delete'
            }, function(data, status) {
                if (status === 'success') {
                    var result = JSON.parse(data);

                    if (result.status === 'success') {
                        location.reload();
                    } else {
                        console.error(result.message);
                    }
                } else {
                    console.error('Lỗi khi gửi yêu cầu xóa.');
                }
            });
        }
    </script>
</body>

</html>
