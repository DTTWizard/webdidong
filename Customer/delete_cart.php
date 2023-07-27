<?php
require_once ("function.php");
$id = $_GET['idgh'];
$delete = delete_gh($id);
if ($delete){
    header("location: cart.php");
}else{
    echo "<script>alert('Xóa sản phẩm không thành công')</script>";
}