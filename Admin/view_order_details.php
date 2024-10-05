<?php
require_once 'function.php';
session_start();
$details_ddh = $_GET['idorder'];
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

if (isset($_POST['update_order'])) {
    $id_ddh = $_POST['id'];
    $status = isset($_POST['status']) ? $_POST['status'] : null; // Thêm giá trị mặc định nếu không có status

    if (!empty($id_ddh) && !empty($status)) {
        $update_order = update_order($id_ddh, $status);
        if ($update_order) {
            header('location: view_order.php');
        } else {
            echo "<script>alert('Cập nhật đơn hàng không thành công')</script>";
        }
    } else {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
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

            <a href="javascript:void(0);" style="font-size:19px;" class="icon" onclick="myFunction()">&#9776;</a>

            <?php
        if (isset($_SESSION['account']))
        {
            echo "<a class='regis_log' href='../Customer/profile_user.php'>
                  <img src='../Images/dat.jpg' alt='Bùi Trọng Đạt'>"."
                  <font style='color: bisque'>".$_SESSION['account']."</font></a>";
        }else
        {
            ?>
            <a href="../Customer/register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
            <a class="regis_log" href="../Customer/login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng
                Nhập</a>
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
                <input class="qtad" id="qtht" type="checkbox">
                <label class="fa fa-user" for="qtht">Quản trị hệ thống</label>

                <div>
                    <a href="account_management.php">Quản lý tài khoản</a>
                </div>
            </div>
            <div class="left-list">
                <input class="qtad" id="qtdm" type="checkbox">
                <label class="fa fa-list" for="qtdm">Quản lý danh mục</label>
                <div>
                    <a href="view_category.php">Danh mục sản phẩm</a> <br>
                    <a href="view_product.php">Sản phẩm</a>
                </div>
            </div>
            <div class="left-list">
                <input class="qtad" id="qtnv" type="checkbox">
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
                <a href="view_order.php">Quản lý nghiệp vụ</a>
                <span> > </span>
                <a href="view_order.php">Quản lý đơn đặt hàng</a>
                <span> > </span>
                <a href="">Chi tiết đơn đặt hàng</a>
            </div>
            <div class="row right-admin-bottom">
                <div>
                    <form method="post" class="search_ad">
                        <input type="search" name="search" placeholder="Tìm kiếm">
                        <button type="submit" class="btn btn-danger">Tìm kiếm</button>
                    </form>
                    <a href="add_category.php" class="add_new">
                        <button class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</button>
                    </a>
                </div>
                <div class="table-responsive table_admin">
                    <?php
                    $dsdh_id = ds_ddh_id($details_ddh);
                    while ($num = mysqli_fetch_array($dsdh_id))
                    {
                ?>
                    <table class="table" style="background: #fff">
                        <tr>
                            <td style="font-size: 16px;">
                                <?php 
                                        if ($num['status'] == 1) {
                                            echo "<b>Chờ xác nhận</b>";
                                        }else {
                                            echo "<b>Đã xác nhận</b>";
                                        }
                                    ?>
                            </td>
                            <td colspan="3" class="text-right">ID ĐƠN HÀNG: <?php echo $num['id_ddh'];?></td>
                        </tr>
                        <?php
                                $tongtientra = 0;
                                $ct_ddh = view_order_details($num['id_ddh']);
                                while ($num1 = mysqli_fetch_array($ct_ddh))
                                {
                             ?>
                        <tr>

                            <td><img src="../Images/<?php echo $num1['anh_sp']; ?>" style="width: 50px; height: 50px"
                                    alt=""></td>
                            <td colspan="2">
                                <font style="font-size: 16px;"><?php echo $num1['ten_sp']; ?> </font><br>
                                <font style="font-size: 13px; color: rgba(0,0,0,.54);">Phân loại hàng:
                                    <?php echo $num1['mau_sac']; ?></font> <br>
                                <font style="font-size: 13px;">x <?php echo $num1['slspb']; ?></font>
                            </td>
                            <td class="text-right">
                                <strike><?php echo number_format($num1['don_gia'],0,',','.'); ?>&nbsp;đ</strike> <br>
                                <font style="color: red">
                                    <?php echo number_format($num1['tong_tien'],0,',','.'); ?>&nbsp;đ</font>
                            </td>
                        </tr>

                        <?php
                                }
                            ?>
                        <tr>
                            <td colspan="4" style="border: none">
                                <div
                                    style="height: .1875rem ;background-image: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,
                                    transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px);">
                                </div>
                            </td>
                        </tr>
                        <tr style="background-color: #fffcf5;">
                            <td colspan="4" style="border: none">
                                <h4>Địa chỉ nhận hàng</h4>
                                <p style="padding-left: 20px">
                                    Người nhận: <b><?php echo $num['hoten_nn'];?></b> <br>
                                    SĐT: <b><?php echo $num['sdt_nn'];?></b> <br>
                                    Email: <b><?php echo $num['email_nn'];?></b> <br>
                                    Nơi nhận: <b><?php echo $num['noi_nhan'];?></b> <br>
                                    Ghi chú: <b><?php echo $num['ghi_chu'];?></b>
                                </p>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border: none">
                                <div
                                    style="height: .1875rem ;background-image: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,
                                    transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px);">
                                </div>
                            </td>
                        </tr>
                        <tr style="background-color: #fffcf5;">
                            <td colspan="3" style="border: none;color: rgba(0,0,0,.54);">Đơn hàng được đặt lúc
                                <?php echo $num['ngay_lap']; ?></td>
                            <td class="text-right" style="border: none">
                                <i class="fas fa-dollar-sign" style="color: red"></i> Tổng số tiền:
                                <font style="font-size: 20px;color: red;">
                                    <?php echo number_format($num['tong_tien'],0,',','.'); ?>
                                </font>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4" class="text-right">
                                <form method="post">
                                    <?php 
                                            if ($num['status'] == 1) {
                                         ?>
                                    <input type="hidden" name="id" value="<?php echo $num['id_ddh']; ?>">
                                    <input type="hidden" name="status" value="2">
                                    <button class="btn btn-success" name="update_order" type="submit">Xác nhận đơn
                                        hàng</button>
                                    <?php
                                            }
                                        ?>

                                </form>
                            </td>
                        </tr>
                    </table>
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <!--  Footer  -->
</body>

</html>
<?php }else{header('location: ../Customer/login.php');} ?>