<?php
require_once ("function.php");

$iddmsp=$_GET["iddmsp"];
$delete=xoa_dmsp($iddmsp);
if ($delete){
    header("location: view_category.php");
}else{
    echo "<script>alert('Xóa danh mục sản phẩm không thành công (~_~)')</script>";
}