<?php
    require_once 'function.php';
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
    <title>ABCmobile - Điện thoại chính hãng, giá tốt nhất</title>
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
        <div class="topnav" id="myTopnav" style="position:">
            <a href="Trangchu.php" class="logo">

                <span class="logo2">Shop</span></a>
            <a href="Trangchu.php">Trang Chủ</a>
            <a href="introduce.php">Giới Thiệu</a>
            <a href="tel: 0963543864">Liên Hệ</a>

            <a href="javascript:void(0);" style="font-size:19px;" class="icon" onclick="myFunction()">&#9776;</a>

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

    <!--  Body  -->
    <div class="container">
        <!---------------Menu------------------>
        <div class="row menu">

            <!---------------Carousel------------->
            <div class="col-md-8">
                <div id="myCarousel" class="carousel slide s1" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="../Images/samsung-s20-untral.png" alt="s2" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="../Images/caro_2.webp" alt="s2" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="../Images/caro_3.jpg" alt="s2" style="width:100%;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <img src="../Images/banner_ipp11.webp" alt="" class="banner_top">
                <img src="../Images/baner-gif-1%20(3).gif" alt="" class="banner_center">
                <img src="../Images/Sam-samsung-398-110-398x110.png" alt="" class="banner_bottom">
            </div>

        </div>

        <div class="row logos">
            <?php
            $dsdmsp = ds_dmsp();
            while ($num = mysqli_fetch_array($dsdmsp))
            {
        ?>
            <a href="view_product_category.php?idxem=<?php echo $num['id_dmsp'];?>">
                <img src="../Images/<?php echo $num['logo_dmsp'];?>" alt="s2">
           
            </a>
            <?php    }
        ?>
            <input class="toggle-box" id="identifier-1" type="checkbox">
            <label for="identifier-1">Xem thêm</label>
            <div class="logo_sp">
                <?php
            $dsdmsp_nine = ds_dmsp_nine();
            while ($num1 = mysqli_fetch_array($dsdmsp_nine))
            {
                ?>
                <a href="view_product_category.php?idxem=<?php echo $num1['id_dmsp'];?>">
                    <img src="../Images/<?php echo $num1['logo_dmsp'];?>" alt="s2">
                </a>
                <?php    }
            ?>
            </div>
        </div>
        <!---------------Điện thoại nổi bật------------------>

        <div class="row">
            <h3 class="theloai">ĐIỆN THOẠI NỔI BẬT NHẤT</h3>
            <div class="well">
                <div id="myCarousels" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <?php
                                $dtnb = dt_noibat();
                                while ($num2 = mysqli_fetch_array($dtnb))
                            { ?>
                                <div class="products">
                                    <div class="col-md-3 col-sm-6 items">
                                        <a href="product_details.php?IDSP=<?php echo $num2['id_sp'];?>">
                                            <div class="item-description">
                                                <figure>
                                                    <img src="../Images/<?php echo $num2['anh_sp'];?>"
                                                        class="item-img animate" alt="Sản phẩm 1" width="310"
                                                        height="450">
                                                </figure>
                                                <div class="pmh-view">
                                                    <p class="pmh-title">Giảm còn</p>
                                                    <p class="pmh-content"><?php echo $num2['gia_km'];?> <u>đ</u></p>
                                                </div>
                                            </div>
                                            <div class="text-content">
                                                <h5><?php echo $num2['ten_sp'];?></h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php }
                            ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <?php
                                $dtnb_five = dt_noibat_five();
                                while ($num3 = mysqli_fetch_array($dtnb_five))
                                { ?>
                                <div class="products">
                                    <div class="col-md-3 col-sm-6 items">
                                        <a href="product_details.php?IDSP=<?php echo $num3['id_sp'];?>">
                                            <div class="item-description">
                                                <figure>
                                                    <img src="../Images/<?php echo $num3['anh_sp'];?>"
                                                        class="item-img animate" alt="Sản phẩm 1" width="310"
                                                        height="450">
                                                </figure>
                                                <div class="pmh-view">
                                                    <p class="pmh-title">Giảm còn</p>
                                                    <p class="pmh-content"><?php echo $num3['gia_km'];?> <u>đ</u></p>
                                                </div>
                                            </div>
                                            <div class="text-content">
                                                <h5><?php echo $num3['ten_sp'];?></h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control s" href="#myCarousels" data-slide="prev">
                        << /a>
                            <a class="right carousel-control s" href="#myCarousels" data-slide="next">
                                ></a>
                </div>
            </div>
        </div>
        <!------DS Điện thoai---->
        <?php
        $ds_hang = ds_dmsps();
        while ($num4 = mysqli_fetch_array($ds_hang))
        {
    ?>
        <div class="row">
            <h3 class="theloai"><?php echo $num4['ten_dmsp'];?></h3>
            <?php
                    $dt_hang = dt_dmsp($num4['id_dmsp']);
                    while ($num5 = mysqli_fetch_array($dt_hang))
                    {
                ?>
            <div class="products">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center items">
                    <a href="product_details.php?IDSP=<?php echo $num5['id_sp'];?>">
                        <div class="item-description">
                            <figure>
                                <img src="../Images/<?php echo $num5['anh_sp'];?>" class="item-img animate"
                                    alt="Sản phẩm 1">
                            </figure>
                            <hr>
                            <div class="text-content">
                                <h5><?php echo $num5['ten_sp'];?></h5>
                                <h5>
                                    <span><?php echo number_format($num5['gia_km'],0,',','.');?>&nbsp;đ</span>
                                    <small><?php echo number_format($num5['gia_sp'],0,',','.');?>&nbsp;đ</small>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>

            <a href="view_product_category.php?idxem=<?php echo $num4['id_dmsp'];?>" class="col-md-12 viewall">
                <div class="view-all text-danger">Xem thêm điện thoại</div>
            </a>
        </div>
        <?php  } ?>
    </div>

    <!----------------Back To Top------------------->
    <div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left" title="Trở lên đầu trang">
        <span class="fas fa-chevron-circle-up"></span>
    </div>
    <!------------Call----------------->
    <a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet" href="tel:0963543864"
        data-toggle="tooltip" title="Gọi ngay cho tôi" data-placement="right">
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
                        <p><input type="text" class="form-control" name="ten_ib" id=""
                                placeholder="Nhập họ và tên của bạn"></p>
                        <p><input type="text" class="form-control" name="email_ibb" id=""
                                placeholder="Nhập email của bạn"></p>
                        <p><input type="tel" class="form-control" name="sdt_ib" id=""
                                placeholder="Nhập số điện thoại của bạn"></p>
                        <b>Tin nhắn *</b>
                        <textarea name="tin_ib" class="form-control" cols="30" rows="7"
                            placeholder="Nội dung tin nhắn"></textarea>
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
            <a href="">
                <div class="fab fa-facebook"></div> <span></span>
            </a>
            <a href="">
                <div class="fab fa-instagram"></div> <span></span>
            </a>
            <a href="">
                <div class="fab fa-twitter"></div> <span></span>
            </a>
            <a href="">
                <div class="fab fa-youtube"></div> <span></span>
            </a>
        </div>
    </div>
</body>

</html>

<script src="../Public/JS/carousel.js"></script>
<script src="../Public/JS/search.js"></script>