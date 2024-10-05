<?php
 require_once('function.php');
session_start();
ob_start();
$loi = "";

//if ($_SERVER["REQUEST_METHOD"] == "GET") {
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER["REQUEST_METHOD"] == 'POST' ) {
    $email = $_POST['email']; // Nhận email từ form

    // Kiểm tra định dạng email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $loi = "Email không hợp lệ. Vui lòng nhập đúng định dạng email.";
    }
    else {
        // Kết nối cơ sở dữ liệu và kiểm tra email
        $conn = new PDO("mysql:host=localhost;dbname=webdidong;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM khachhang WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $count = $stmt->rowCount();
        if ($count == 0) {
            $loi = "Email bạn nhập chưa đăng kí thành viên của chúng tôi.";
        } else {
             $matkhaumoi = substr(md5( rand(0,999999)),0,8);

            $sql = "UPDATE  khachhang SET mat_khau =? WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([ $matkhaumoi,$email]);
            $kq = sendPasswordResetEmail($email, $matkhaumoi);


        }
    }


}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <!-- <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <script src="../Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <!-- <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js"></script> -->
    <script src="../Public/JS/navbar.js"></script>
    <link rel="stylesheet" href="../Public/fontawesome-free-5.12.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Notable&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="../Public/CSS/call.css">
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <link rel="stylesheet" href="../Public/CSS/login.css">
    <title>password reset </title>
</head>

<body>
    <div class="row headers">
        <div class="container">
            <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-hand-holding-usd"></i><a href="Trangchu.php">
                    Cam kết giá tốt nhất</a></span>
            <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-truck-moving"></i><a href="freeship.php">Miễn
                    phí vận chuyển</a></span>
            <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-map-marked-alt"></i><a
                    href="Trangchu.php">Thanh toán khi nhận hàng</a></span>
            <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-shield-alt"></i><a
                    href="change_delivery.php">Đổi trả trong 7 ngày</a></span>
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
            <a href="tel: 0963543864 ">Liên Hệ</a>

            <a href="javascript:void(0);" style="font-size:19px;" class="icon" onclick="myFunction()">&#9776;</a>

            <a href="cart.php" class="regis_log">
                <i class="fa fa-cart-plus"></i>
            </a>
            <div class="search">
                <form action="result_search.php" method="post" class="form-inline">
                    <input type="text" name="text_search" id="search" class="form-control text-search"
                        placeholder="Tìm kiếm...">
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

    <!--------Body-->
    <div class="container a">
        <div class="b">
            <img src="../Images/Userp.png" alt="Lys Tan Phat Dz">
        </div>
        <form method="post">
            <div class="form-group">
                <label for="tk">Nhập email của bạn</label>
                <input type="text" class="form-control" id="tk" name="email" placeholder="Tên tài khoản" />
            </div>
            <div class="c">
                <button type="submit" class="btn btn-warning" name="send_mail">Gửi yêu cầu</button>
            </div>
            <?php if ($loi != "") { ?>
            <div style="color: red;"><?php echo $loi ?></div>
            <?php } ?>

            <div class="text-center" style="margin-top: 10px">
                <p>Hoặc</p>
                <i>Bạn chưa có tài khoản? </i><span><a href="register.php">Tạo tài khoản</a></span>
            </div>
        </form>
    </div>

    <div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left" title="Trở lên đầu trang">
        <span class="fas fa-chevron-circle-up"></span>
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
            <a href="">
                <div class="fab fa-facebook"></div> <span>Facebook</span>
            </a>
            <a href="">
                <div class="fab fa-instagram"></div> <span>Instagram</span>
            </a>
            <a href="">
                <div class="fab fa-twitter"></div> <span>Twitter</span>
            </a>
            <a href="">
                <div class="fab fa-youtube"></div> <span>Youtube</span>
            </a>
        </div>
    </div>
</body>

</html>
<script src="../Public/JS/carousel.js"></script>
<script src="../Public/JS/search.js"></script>