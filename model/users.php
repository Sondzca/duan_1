<?php
function loadall_user()
{
    $sql = "SELECT * FROM user_cred order by id asc";
    $list_user = pdo_query($sql);
    return $list_user;
}
function loadone_user($id)
{
    $sql = "SELECT * FROM user_cred WHERE id=" . $id;
    $tk = pdo_query_one($sql);
    return $tk;
}
function delete_user($id)
{
    $sql = "DELETE FROM user_cred WHERE id=" . $id;
    pdo_execute($sql);
}
function update_user($id, $name, $phone, $dob, $address, $email, $password, $target_file)
{
    $sql = "UPDATE `user_cred` SET `name`='$name', `email`='$email', `address`='$address', `phonenum`='$phone', `dob`='$dob', `password`='$password', `profile`='$target_file' 
            WHERE id = '$id'";
    return pdo_execute($sql); // Thêm return true; để trả về giá trị
}
