<?php
require_once 'function.php';
session_start();
ob_start();
if (isset($_SESSION['id_kh']) == 1)
{
    $idbl = $_GET['idcmt'];
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
                <a href="view_comment.php">Quản lý nghiệp vụ</a>
                <span> > </span>
                <a href="view_comment.php">Quản lý phản hồi</a>
                <span> > </span>
                <a href="">Phản hồi khách hàng</a>
            </div>
            <div class="row right-admin-bottom">
                <form class="form-horizontal" method="post">
                    <?php
                        $viewcmt = ds_cmtid($idbl);
                        $num = mysqli_fetch_array($viewcmt);
                    ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sp">Sản phẩm</label>
                        <div class="col-sm-10">
                            <img src="../Images/<?php echo $num['anh_sp'];?>" width="50" height="50" alt="">
                            <span><b><?php echo $num['ten_sp'];?></b></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nbl">Người bình luận:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nbl" placeholder="Người bình luận"
                                   value="<?php echo $num['ho_ten'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sdt">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại" value="<?php echo $num['sdt'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="bl">Bình luận:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bl" placeholder="Bình luận" value="<?php echo $num['noi_dung'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rep">Phản hồi khách hàng</label>
                        <div class="col-sm-10">
                            <textarea name="repcmt" id="rep" placeholder="Nội dung phản hồi ....."
                                      class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="okrep" class="btn btn-danger">Phản hồi</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                if (isset($_POST['okrep'])){
                    $idkh = $_SESSION['id_kh'];
                    $nd = $_POST['repcmt'];
                    if (!empty($idkh) && !empty($idbl) && !empty($nd)){
                        $add_rep = rep_cmt($idkh, $idbl, $nd);
                        if ($add_rep){
                            header("location: view_comment.php");
                        }else{
                            echo "<script>alert('Phản hồi không thành công !');</script>";
                        }
                    }else{
                        echo "<script>alert('Vui lòng nhập nội dung phản hồi !');</script>";
                    }
                }
            ?>
        </div>
    </div>
    <!--  Footer  -->
    </body>
    </html>
<?php }else{header('location: ../Customer/Trangchu.php');} ?>