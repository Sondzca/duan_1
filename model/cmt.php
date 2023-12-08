<?php
function loadall_cmt()
{
    $sql = "SELECT *,user_cred.name FROM `comments` INNER JOIN user_cred ON comments.id_user=user_cred.id";
    $list_cmt = pdo_query($sql);
    return $list_cmt;
}
function delete_cmt($id)
{
    $sql = "DELETE FROM comments WHERE id=" . $id;
    pdo_execute($sql);
}
