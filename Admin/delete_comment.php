<?php
require_once ("function.php");

$idbl=$_GET["idcmt"];
$delete=xoa_bl($idbl);
if ($delete){
    header("location: view_comment.php");
}else{
    echo "<script>alert('Xóa bình luận không thành công (~_~)')</script>";
}