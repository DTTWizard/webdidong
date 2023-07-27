<?php
require_once ("function.php");

$idsp=$_GET["idsp"];
$delete=xoa_sp($idsp);
if ($delete){
    header("location: view_product.php");
}else{
    echo "<script>alert('Xóa sản phẩm không thành công (~_~)')</script>";
}