<?php
require_once 'function.php';
session_start();
if (isset($_SESSION['account']))
{
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js"></script>
    <script src="../Public/JS/navbar.js"></script>
    <link rel="stylesheet" href="../Public/fontawesome-free-5.12.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Notable&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <link rel="stylesheet" href="../Public/CSS/admin.css">
    <title>ABCmobile - Điện thoại chính hãng, giá tốt nhất</title>
</head>

<body class="body-all-ad">
<?php
if (isset($_POST['ok'])){
    $taikhoan=$_POST['taikhoan'];
    $tenkh=$_POST['tenkh'];
    $sdt=$_POST['sdt'];
    $email=$_POST['email'];
    $diachi=$_POST['diachi'];
    $pass=$_POST['mk'];
    $img_name = $_FILES['avatar']['name'];
    $img_tmpname = $_FILES['avatar']['tmp_name'];
    if (!empty($taikhoan) && !empty($pass))
    {
        $ktra_user_pass = "[\W]";
        if (!preg_match($ktra_user_pass,$taikhoan) && !preg_match($ktra_user_pass,$pass))
        {
            move_uploaded_file($img_tmpname,'../Images/'.$img_name);
            $add_acc = them_tk($taikhoan, $pass, $img_name,$tenkh, $sdt, $email, $diachi);
            if ($add_acc){
                header('location: account_management.php');
            }else{
                echo "<script>alert('Thêm tài khoản không thành công !')</script>";
            }
        }else{
            echo "<script>alert('Tài khoản hoặc mật khẩu không được chứa ký tự đặt biệt')</script>";
        }

    }else{
        echo "<script>alert('Tài khoản và Mật khẩu không được bỏ trống !')</script>";
    }
}
?>
<!-- Header -->
<!-- Header -->
<div class="row header" style="margin: auto; width: 100%">
    <div class="topnav" id="myTopnav">
        <a href="Manager.php" class="logo">
            <span class="logo1"><i class="fas fa-users-cog"></i> A</span>
            <span class="logo2">dministrator</span></a>
        <a href="../Customer/Trangchu.php"><i class="fas fa-reply"></i> Vào trang web</a>
        <a href="../Customer/introduce.php">Giới Thiệu</a>
        <a href="tel: 0967448690">Liên Hệ</a>
        <a href="statistical.php">Thống kê</a>

        <a href="javascript:void(0);"
           style="font-size:19px;"
           class="icon" onclick="myFunction()">&#9776;</a>

        <?php
        if (isset($_SESSION['account']))
        {
            echo "<a class='regis_log' href='../Customer/profile_user.php'>
                  <img src='../Images/Tan%20Phat.jpg' alt='Bùi Trọng Đạt'>"."
                  <font style='color: bisque'>".$_SESSION['account']."</font></a>";
        }else
        {
            ?>
            <a href="../Customer/register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
            <a class="regis_log" href="../Customer/login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
        <?php } ?>
    </div>
</div>

<!--  Body  -->
<div class="row body_admin">
    <div class="col-md-3 left-admin" id="left-admin">
        <div class="home-admin">
            <a href="Manager.php">
                <i class="fas fa-house-damage"></i> Trang chủ Admin
            </a>
        </div>
        <div class="left-list">
            <input class="qtad" id="qtht" type="checkbox" >
            <label class="fa fa-user" for="qtht">Quản trị hệ thống</label>

            <div>
                <a href="account_management.php">Quản lý tài khoản</a>
            </div>
        </div>
        <div class="left-list">
            <input class="qtad" id="qtdm" type="checkbox" >
            <label class="fa fa-list" for="qtdm">Quản lý danh mục</label>
            <div>
                <a href="view_category.php">Danh mục sản phẩm</a> <br>
                <a href="view_product.php">Sản phẩm</a>
            </div>
        </div>
        <div class="left-list">
            <input class="qtad" id="qtnv" type="checkbox" >
            <label class="fa fa-coins" for="qtnv">Quản lý nghiệp vụ</label>
            <div>
                <a href="view_order.php">Quản lý đơn đặt hàng</a> <br>
                <a href="view_comment.php">Quản lý phản hồi</a>
            </div>
        </div>
    </div>
    <div class="col-md-9 right-admin" id="right-admin">
        <div class="row right-admin-top">
            <a href="../Customer/Trangchu.php">
                <i class="fas fa-home"></i> Trang chủ website
            </a>
            <span> > </span>
            <a href="Manager.php">Quản trị hệ thống</a>
            <span> > </span>
            <a href="account_management.php">Quản lý tài khoản </a>
            <span> > </span>
            <a href="add_account.php">Add account</a>
        </div>
        <div class="row right-admin-bottom">
            <form method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tên người dùng</th>
                            <td class="aa"><input type="text" class="form-control" name="taikhoan"></td>
                        </tr>
                        <tr>
                            <th>Mật khẩu</th>
                            <td class="aa"><input type="text" class="form-control" name="mk"></td>
                        </tr>
                        <tr>
                            <th>Avatar</th>
                            <td><input type="file" name="avatar" id=""></td>
                        </tr>
                        <tr>
                            <th>Họ tên</th>
                            <td class="aa"><input type="text" class="form-control" name="tenkh"></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td class="aa"><input type="tel" class="form-control" name="sdt"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td class="aa"><input type="email" class="form-control" name="email"></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td class="aa"><input type="text" class="form-control" name="diachi"></td>
                        </tr>
                        <tr><td colspan="2">
                                <a href="account_management.php"><button type="button" class="btn-primary btn"
                                                                         style="float: left;margin-left: 24px;width: 130px;font-size: 18px;">Quay lại</button></a>
                                <button type="submit" name="ok" class="btn btn-success"
                                        style="float: right;margin-right: 24px;font-size: 18px;">Thêm tài khoản</button>
                            </td></tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<!--  Footer  -->
</body>
</html>
<?php }else{header('location: ../Customer/login.php');} ?>