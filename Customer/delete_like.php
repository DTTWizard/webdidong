<?php
require_once ("function.php");
$id = $_GET['idlike'];
$delete = delete_like($id);
if ($delete){
    header("location: like_product.php");
}else{
    echo "<script>alert('Xóa sản phẩm không thành công')</script>";
}