<?php
require_once('../database/dbhelper.php');

if (!empty($_POST)) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'delete':
                if (isset($_POST['id'])) {
                    $id = intval($_POST['id']); // Chuyển đổi thành số nguyên để ngăn chặn SQL injection

                    $sql = 'DELETE FROM category WHERE id = ?';
                    $stmt = execute($sql, 'i', $id);

                    if ($stmt) {
                        echo json_encode(['status' => 'success']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Xóa không thành công']);
                    }
                }
                break;
        }
    }
}
?>
