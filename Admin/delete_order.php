<?php
require_once ("function.php");

$iddh=$_GET["idorder"];
$delete=xoa_ddh($iddh);
if ($delete){
    header("location: view_order.php");
}else{
    echo "<script>alert('Xóa đơn hàng không thành công (~_~)')</script>";
}