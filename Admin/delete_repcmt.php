<?php
require_once ("function.php");

$id=$_GET["idrep"];
$delete=xoa_rep($id);
if ($delete){
    header("location: view_comment.php");
//    echo "<script>alert('Xóa phản hồi thành công!')</script>";
}else{
    echo "<script>alert('Xóa phản hồi không thành công (~_~)')</script>";
}