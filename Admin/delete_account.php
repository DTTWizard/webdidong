<?php
    require_once ("function.php");

    $idkh=$_GET["idkh"];
    $delete=xoa_tk($idkh);
    if ($delete){
        header("location: account_management.php");
    }else{
        echo "<script>alert('Xóa tài khoản không thành công (~_~)')</script>";
    }