<?php
require_once ("function.php");
$iddh = $_GET['idddh'];
$donhang = view_order_details($iddh);
//  Tang so luong khi xoa don dat hang
while ($num = mysqli_fetch_array($donhang)){
    $tang_sl = tang_soluong($num['id_sp'], $num['slspb']);
}
    $del = delete_ddh($iddh);
if($del) header('location: order.php');
else echo "<script>alert('Lỗi')</script>";

?>