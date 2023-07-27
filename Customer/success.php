<?php
require_once ("function.php");
session_start();
ob_start();
if (!isset($_SESSION['id_kh'])){
    echo "<b>NOT 404</b>";
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
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js"></script>
    <script src="../Public/JS/navbar.js"></script>
    <link rel="stylesheet" href="../Public/fontawesome-free-5.12.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Notable&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/CSS/call.css">
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <title>ABCmobile - Điện thoại chính hãng, giá tốt nhất</title>
</head>
<body>
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
        <a href="tel: 0967448690">Liên Hệ</a>

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

<!-------------------Body---------------------->
<div class="container">
    <div class="row" style="margin: auto;margin-top: 10px;">
        <div class="main">
            <div class="col-main">
                <a href="Trangchu.php"><i class="fa fa-chevron-left"></i> Tiếp tục tìm kiếm sản phẩm</a>
                <div class="module">
                    <h1 style="color: #2e7d32; display: block; text-align: center; font-size: 24px;">Đặt hàng thành công</h1>
                </div>
                <div class="module" style="border: solid 1px #eee; background: #fff; padding: 10px;">
                    <p>Cảm ơn Quý khách hàng đã chọn mua hàng tại Store. Trong<b> 30 phút</b>, Store sẽ <b>SMS hoặc Gọi</b> để xác nhận đơn hàng.</p>
                    <p>* Các đơn hàng từ <b> 21h tối tới 9h</b> sáng hôm sau, Store sẽ liên hệ với Quý khách trước 12h trưa cùng ngày.</p>
                    <p>Nếu anh/chị cần tư vấn, trợ giúp vui lòng gọi <strong>1800.2097</strong>. Xin cám ơn !</p>

                    <strong style="margin-top: 20px;">Thông tin đặt hàng</strong>
                    <div style="background: rgba(65, 166, 116, 0.15); padding: 10px; border: solid 1px #eee; margin-top: 10px;">
                        <?php
                            $hoadon = bill($_SESSION['id_kh']);
                            $bill = mysqli_fetch_array($hoadon);
                        ?>
                                Số đơn hàng: <strong><?php echo $bill['id_ddh'];?></strong>
                                <br>
                                Người đặt hàng : <strong><?php echo $_SESSION['account']?></strong>
                                <br>
                                Người nhận: <strong><?php echo $bill['hoten_nn'];?></strong>
                                <br>
                                Số Điện thoại: 0967448690 <strong><?php echo $bill['sdt_nn'];?></strong>
                                <br>
                                Email: <strong><?php echo $bill['email_nn'];?></strong>
                                <br>
                                Địa chỉ nhận hàng: <strong><?php echo $bill['noi_nhan'];?></strong>
                                <br>
                                Ghi chú từ người mua: <strong><?php echo $bill['ghi_chu'];?></strong>
                                <br><br>
                        Hình thức thanh toán: <strong>Thanh toán khi nhận hàng</strong>
                        <br>
                        Trạng thái thanh toán: <strong>Chưa thanh toán</strong>
                        <br>
                        <strong style="color: #e11b1e;">* Lưu ý: Khuyến mại chỉ được giữ trong vòng 24H kể từ khi đặt hàng. Quá 24H sẽ áp dụng giá mới tại thời điểm đó</strong>
                    </div>
                    <strong style="margin-top: 20px; font-size: 24px; display: block; text-align: center;">Sản phẩm đã đặt</strong>
                    <div class="module" style="border: solid 1px #eee;">
                        <div class="row" style="margin: auto;">
                            <?php
                                $tongtien = 0;
                                $ct_hd = details_bill($bill['id_ddh']);
                                while ($ct_bill = mysqli_fetch_array($ct_hd))
                                {
                            ?>
                                    <div class="col-lg-6 col-md-12 col-sm-12"
                                         style="padding: 10px; border-bottom: solid 1px #eee;min-height: 120px;">
                                        <div class="left" style="float: left;max-width: 20%;">
                                            <a href="#">
                                                <img src="../Images/<?php echo $ct_bill['anh_sp'];?>" style="width: 100%;height: 96px;">
                                            </a>
                                        </div>
                                        <div class="right" style="float: left;max-width: 80%">
                                            <strong>
                                                <a href="#" style="color: #3c3d41; font-size: 14px;">
                                                    <?php echo $ct_bill['ten_sp'];?>
                                                </a>
                                            </strong>
                                            <br class="clear">
                                            <span class="price-box">
                                    <span class="regular-price">
                                        <span class="price" style="color: #e11b1e;font-weight: bold">
                                            <?php echo number_format($ct_bill['don_gia'],0,',','.');?>&nbsp;₫
                                        </span>
                                    </span>
                                </span>
                                            <br>
                                            Màu: <?php echo $ct_bill['mau_sac'];?> <br>
                                            Số lượng: <?php echo $ct_bill['slspb'];?>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>

                        <div style="padding-top: 12px;padding-bottom: 32px;padding-left: 20px;padding-right: 20px;font-size: 16px;">
                            <div class="left" style="float: left">
                                Tổng tiền phải thanh toán
                            </div>
                            <div class="right" style="float: left;padding-left: 20px;">
                                <span class="price-box" style="color: #e11b1e;font-weight: bold">
                                    <span class="regular-price">
                                        <span class="price"><?php echo number_format($bill['tong_tien'],0,',','.'); ?>&nbsp;₫</span>
                                    </span>
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="module" style="text-align: center; margin-top: 13px">
                        <a href="Trangchu.php" class="btn btn-default btn-sm">Quay lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        <span>Điện thoại: 0967448690 <a href="tel: "></a></span> <br>
        <i class="fas fa-phone-volume"></i>
        <span>Hotline: 0967448690 <a href="tel: "></a></span> <br>
        <i class="fas fa-envelope-open-text"></i>
        <span>Email: <a href="https://www.google.com/gmail">buitrongdat0904@gmail.com</a></span>
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