<?php
require_once ("function.php");
session_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/CSS/call.css">
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <title>Tài khoản của tôi</title>

</head>
<body class="body_prf">
<div class="row headers">
    <div class="container">
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-hand-holding-usd"></i><a href="Trangchu.php"> Cam kết giá tốt nhất</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-truck-moving"></i><a href="freeship.php">Miễn phí vận chuyển</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-map-marked-alt"></i><a href="Trangchu.php">Thanh toán khi nhận hàng</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-shield-alt"></i><a href="change_delivery.php">Đổi trả trong 7 ngày</a></span>
        <!--        <span class="topp"><a href="#">Bảo hành tận nơi</a></span>-->
    </div>
</div>
<!-- Header -->
<div class="row header">
    <div class="topnav" id="myTopnav">
        <a href="Trangchu.php" class="logo">
           
            <span class="logo2">ABCmobile</span></a>
        <a href="Trangchu.php">Trang Chủ</a>
        <a href="introduce.php">Giới Thiệu</a>
        <a href="tel: 0963543864">Liên Hệ</a>

        <a href="javascript:void(0);"
           style="font-size:19px;"
           class="icon" onclick="myFunction()">&#9776;</a>

        <?php
        if (isset($_SESSION['account']) or isset($_SESSION['avatar']))
        {
            $prfuser = prf_user($_SESSION['id_kh']);
            $prf = mysqli_fetch_array($prfuser);
            $anhdd = $prf['avatar'];
            echo "<a class='regis_log' href='profile_user.php'>
                  <img src='../Images/$anhdd' alt=''>"."
                  <font style='color: bisque'>".$_SESSION['account']."</font></a>";
        }else
        {
            ?>
            <a href="register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
            <a class="regis_log" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
        <?php } ?>
        <a href="cart.php" class="regis_log">
            <i class="fa fa-cart-plus"></i>
        </a>
        <div class="search">
            <form action="result_search.php" method="post" class="form-inline">
                <input type="text" name="text_search" id="search" class="form-control text-search" placeholder="Tìm kiếm...">
                <input type="submit" value="Tìm kiếm" name="search" class="btn btn-warning">
            </form>
        </div>
    </div>
    <div class="row result-search">
        <div class="list-group col-md-5 col-md-offset-4" id="show-list">
            <!--            <a href="#" class="list-group-item border-1">List 1</a>-->
        </div>
    </div>
</div>

<!--  Body  -->
<div class="container">
    <div class="row profile">
        <div class="col-md-4 profile-content">
            <div>
                <?php $prfuser = prf_user($_SESSION['id_kh']);
                $prf = mysqli_fetch_array($prfuser);
                $anhdd = $prf['avatar']; echo "<img src='../Images/$anhdd'
                    alt=''>"."<b>".$_SESSION['account']."</b>"; ?>
            </div>
            <div class="prf-text">
                <input class="prf-user" id="prf-user" type="checkbox" >
                <label for="prf-user"><i class="fa fa-user-circle"></i> Tài khoản của tôi</label>
                <div class="prf-user-file">
                    <a href="profile_user.php">Hồ sơ của tôi</a> <br>
                    <a href="change_password.php">Đổi mật khẩu</a>
                </div>
            </div>
            <div class="prf-text">
                <a href="like_product.php">
                    <i class=" fa fa-heart"></i> Yêu thích
                </a>
            </div>
            <div class="prf-text">
                <a href="order.php">
                    <i class="fa fa-newspaper"></i> Đơn đặt hàng
                </a>
            </div>
        </div>
        <div class="col-md-8 profile-title">
            <table width="100%">
                <tr>
                    <td><h3>Đổi mật khẩu</h3></td>
                    <td align="right"><h4><a href='logout.php' class='glyphicon glyphicon-log-out'>ĐăngXuất</a></h4></td>
                </tr>
                <tr><td colspan="2">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</td></tr>
            </table>
            <hr>
            <form method="post">
                <div class="form-group">
                    <label for="pass">Mật khẩu hiện tại</label>
                    <input type="password" name="pass" class="form-control" id="pass">
                </div>
                <div class="form-group">
                    <label for="npwd">Mật khẩu mới:</label>
                    <input type="password" name="new_pass" class="form-control" id="npwd">
                </div>
                <div class="form-group">
                    <label for="re-pwd">Xác nhận mật khẩu:</label>
                    <input type="password" name="re_pass" class="form-control" id="re-pwd">
                </div>
                <div class="form-group">
                    <button type="submit" name="change_pwd" class="btn btn-danger">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['change_pwd'])){
        $mk = $_POST['pass'];
        $new_mk = $_POST['new_pass'];
        $re_mk = $_POST['re_pass'];
        if (!empty($mk) && !empty($new_mk) && !empty($re_mk))
        {
            $checkpass = check_pwd($_SESSION['id_kh'],$mk);
            $num_chk = mysqli_fetch_array($checkpass);
            if ($num_chk['mat_khau'] == $mk){
                if (strlen($new_mk) >= 8){
                    if ($new_mk === $re_mk){
                        $kt_kytu = "[\W]";
                        if (!preg_match($kt_kytu,$new_mk)){
                            $up_pass= change_pwd($_SESSION['id_kh'],$new_mk);
                            if ($up_pass){
                                echo "<script>alert('Đổi mật khẩu thành công!')</script>";
                            }else{
                                echo "<script>alert('Đổi mật khẩu không thành công!')</script>";
                            }
                        }else{
                            echo "<script>alert('Mật khẩu không được chứa ký tự đặc biệt')</script>";
                        }
                    }else{
                        echo "<script>alert('Mật khẩu chưa trùng khớp')</script>";
                    }
                }else{
                    echo "<script>alert('Mật khẩu phải từ 8 ký tự trở lên')</script>";
                }
            }else{
                echo "<script>alert('Mật khẩu hiện tại chưa chính xác!')</script>";
            }
        }
        else{
            echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
        }
    }
?>

<!----------------Back To Top------------------->
<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="fas fa-chevron-circle-up"></span>
</div>
<!------------Call----------------->
<a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet"
   href="tel:0967448690" data-toggle="tooltip" title="Gọi ngay cho tôi" data-placement="right">
    <div id="calltrap-ico"></div>
</a>
<!-------------------Inbox------------------------->
<div class="float-ck">
    <div id="hide_float_right">

        <a href="javascript:hide_float_right()">
            <i class="fa fa-comment-alt"></i> Chat với nhân viên tư vấn !
            <span><i class="fas fa-minus"></i></span>
        </a>

    </div>
    <div id="float_content_right">
        <!– Start quang cao–>
        <div class="kh-ib">
            <br>
            <p><b>Nhập thông tin của bạn *</b></p>
            <form method="post">
                <p><input type="text" class="form-control" name="ten_ib" id="" placeholder="Nhập họ và tên của bạn"></p>
                <p><input type="text" class="form-control" name="email_ibb" id="" placeholder="Nhập email của bạn"></p>
                <p><input type="tel" class="form-control" name="sdt_ib" id="" placeholder="Nhập số điện thoại của bạn"></p>
                <b>Tin nhắn *</b>
                <textarea name="tin_ib" class="form-control" cols="30" rows="7" placeholder="Nội dung tin nhắn"></textarea>
                <hr>
                <button type="submit" class="btn btn-danger" name="send_ib">Gửi tin nhắn</button>
            </form>
        </div>

        <!– End quang cao –>

    </div>
</div>
<!-------------Footer------------->
<div class="row footer">
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>VỀ ABCmobile</b> <br>
        <a href="introduce.php">Giới thiệu về ABCmobile</a> <br>
        <a href="pay.php">Thanh toán</a> <br>
        <a href="customer_care.php">Chăm sóc khách hàng</a> <br>
        <a href="data_backup.php">Quy định về việc sao lưu dữ liệu</a> <br>
        <a href="endow.php">Ưu đãi từ đối tác</a> <br>
        <a href="business_cooperation.php">Liên hệ hợp tác cùng ABCmobile</a> <br>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6">
    <b>CHÍNH SÁCH & HỖ TRỢ</b> <br>
        <a href="online_shopping.php">Hỗ trợ mua hàng trực tuyến</a> <br>
        <a href="installment.php">Hướng dẫn mua trả góp</a> <br>
        <a href="freeship.php">Chính sách giao hàng</a> <br>
        <a href="information_security.php">Chính sách bảo mật thông tin</a> <br>
        <a href="warranty_policy.php">Chính sách bảo hành</a> <br>
        <a href="change_delivery.php">Chính sách đổi trả</a>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>THÔNG TIN LIÊN HỆ</b> <br>  
        <i class="fas fa-mobile-alt"></i>
        <span>Điện thoại: 0963543864 <a href="tel: "></a></span> <br>
        <i class="fas fa-phone-volume"></i>
        <span>Hotline: 0963543864 <a href="tel: "></a></span> <br>
        <i class="fas fa-envelope-open-text"></i>
        <span>Email: <a href="https://www.google.com/gmail">dinhhoanglong010@gmail.com</a></span>
    </div>
   
</div>
<div class="row follow">
    <div class="fot col-md-12 col-sm-12 col-xs-12 text-center">
        <h4><b>Theo dõi chúng tôi</b></h4>
        <a href=""><div class="fab fa-facebook"></div> <span>Facebook</span></a>
        <a href=""><div class="fab fa-instagram"></div> <span>Instagram</span></a>
        <a href=""><div class="fab fa-twitter"></div> <span>Twitter</span></a>
        <a href=""><div class="fab fa-youtube"></div> <span>Youtube</span></a>
    </div>
</div>
</body>
</html>
<script src="../Public/JS/carousel.js"></script>
<script src="../Public/JS/search.js"></script>
