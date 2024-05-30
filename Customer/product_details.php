<?php
require_once 'function.php';
session_start();
if (isset($_GET['IDSP'])){
    $iddt=$_GET['IDSP'];
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald:wght@700&display=swap" rel="stylesheet">
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
    <!---------------Menu------------------>
    <div class="row menu">

        <!---------------Carousel------------->
        <div class="col-md-8">
            <div id="myCarousel" class="carousel slide s1" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="../Images/caro_1.webp" alt="Los Angeles" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="../Images/caro_2.webp" alt="Chicago" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="../Images/caro_3.jpg" alt="New york" style="width:100%;">
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
            <img src="../Images/banner_ipp11.webp" alt="s2" class="banner_top">
            <img src="../Images/s20_series_right_banner_16.webp" alt="s2" class="banner_center">
            <img src="../Images/banner-nho-2.jpg" alt="s2" class="banner_bottom">
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
                <a href="view_product_category.php?idxem=<?php echo $num['id_dmsp'];?>">
                    <img src="../Images/<?php echo $num1['logo_dmsp'];?>" alt="s2">
                </a>
            <?php    }
            ?>
        </div>
    </div>

    <!---------------Thêm sản phẩm vào giỏ hàng------------------>
    <?php
        $ct_sp = ctsp($iddt);
        $num2 = mysqli_fetch_array($ct_sp);

        if (isset($_POST['add-cart']))
        {
            if (isset($_SESSION['id_kh'])){
                $soluongsp = (int)$_POST['soluong'];
                if ($soluongsp < $num2['so_luong'] || $soluongsp >= 1){
                    $ktra_gh = ktgh($_SESSION['id_kh'], $num2['id_sp']);
                    if (mysqli_num_rows($ktra_gh) != 0){
                        $num4 = mysqli_fetch_array($ktra_gh);
                        $tangsl_sp = tang_slsp($soluongsp, $num4['id_giohang']);
                        if ($tangsl_sp){
                            echo "<div class='popupunder alert alert-success fade in'>
                                    <button type='button' class='close close-sm' data-dismiss='alert'>
                                    <i class='glyphicon glyphicon-remove'></i>
                                    </button>
                                     <strong>Thông báo : </strong> Thêm sản phẩm vào giỏ hàng thành công ! <br>
                                    <a href='cart.php' title='s2'>Xem giỏ hàng của tôi</a>
                                  </div>";
                            //echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công !')</script>";
                        }else{
                            echo "<script>alert('Thêm sản phẩm vào giỏ hàng không thành công  1!')</script>";
                        }
                    }else{
                        $themsp = add_spgh($_SESSION['id_kh'], $num2['id_sp'], $soluongsp);
                        if ($themsp){
                            echo "<div class='popupunder alert alert-success fade in'>
                                    <button type='button' class='close close-sm' data-dismiss='alert'>
                                    <i class='glyphicon glyphicon-remove'></i>
                                    </button>
                                     <strong>Thông báo : </strong> Thêm sản phẩm vào giỏ hàng thành công ! <br>
                                    <a href='cart.php' title='s2'>Xem giỏ hàng của tôi</a>
                                  </div>";
                            //echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công !')</script>";
                        }else{
                            echo "<script>alert('Thêm sản phẩm vào giỏ hàng không thành công  2!')</script>";
                        }
                    }
                }else{
                    echo "<script>alert('Số lượng không hợp lệ !')</script>";
                }
            }else{
                echo "<script>alert('Bạn vui lòng đăng nhập !')</script>";
            }
        }
    ?>
    <form method="post">
    <div class="row product-details">
        <div class="col-md-12 product-prev-next">
            <a href="Trangchu.php">Home</a>
            <span class="fas fa-angle-right"></span>
            <a href="view_product_category.php?idxem=<?php echo $num2['id_dmsp']; ?>">Điện thoại</a>
            <span class="fas fa-angle-right"></span>
            <a href="view_product_category.php?idxem=<?php echo $num2['id_dmsp']; ?>"><?php echo $num2['ten_dmsp']; ?></a>
            <span class="fas fa-angle-right"></span>
            <?php echo $num2['ten_sp']; ?>
        </div>
        <div class="col-md-5 details-left">
            <div class="mag">
                <div class="magnify">
                    <img data-toggle="magnify"
                         src="../Images/<?php echo $num2['anh_sp']; ?>"
                         alt="Sản phẩm 1">
                    <div class="magnify-large"
                         style="background: url('http://hocwebgiare.com/thiet_ke_web_chuan_demo/magnifying_glass/images/168.jpg') no-repeat;">
                    </div>
                </div>
            </div>
            <div class="mux">
                <img src="../Images/Banner-PK_final1.jpg" alt="">
            </div>
            <p>Tình trạng</p>
            Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất (<?php echo $num2['ten_dmsp']; ?>) <br>
            <p>Bảo hành</p>
                Bảo hành chính hãng <?php echo $num2['bao_hanh']; ?> tại trung tâm bảo hành của
                <?php echo $num2['ten_dmsp']; ?> Việt Nam.
                Đổi mới trong 30 ngày tại <b><i>Store</i></b> nếu có lỗi nhà sản xuất.

        </div>

        <div class="col-md-7 details-right">
                <h3><?php echo $num2['ten_sp']; ?></h3>
                <p>Mô tả sản phẩm</p>
                <table class="table" style="border: none">
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Hãng sản xuất: </span></td>
                        <td><?php echo $num2['ten_dmsp']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Kích thước: </span></td>
                        <td><?php echo $num2['kich_thuoc']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Trọng lượng: </span></td>
                        <td><?php echo $num2['trong_luong']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> RAM: </span></td>
                        <td><?php echo $num2['ram']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Bộ nhớ trong: </span></td>
                        <td><?php echo $num2['rom']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Loại sim: </span></td>
                        <td><?php echo $num2['loai_sim']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Kích thước màn hình: </span></td>
                        <td><?php echo $num2['kich_thuoc_mh']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Độ phân giải màn hình: </span></td>
                        <td><?php echo $num2['do_phan_giai_mh']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Chip set: </span></td>
                        <td><?php echo $num2['chip_set']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Hệ điều hành: </span></td>
                        <td><?php echo $num2['he_dieu_hanh']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Pin: </span></td>
                        <td><?php echo $num2['pin']; ?></td>
                    </tr>
                    <tr>
                        <td class="tile-left"><i class="fas fa-check"></i><span> Màu sắc: </span></td>
                        <td><?php echo $num2['mau_sac']; ?></td>
                    </tr>
                </table>
                <div class="price">
                <span colspan="" class="price-sp">
                    <?php echo number_format($num2['gia_km'],0,',','.'); ?>&nbsp;đ
                </span>
                    <span class="price-km">
                    <?php echo number_format($num2['gia_sp'],0,',','.'); ?>&nbsp;đ
                </span>
                </div>
                <p class="slsp">
                    <label for="slsp">Số lượng: </label>
                    <input type="number" name="soluong" id="slsp" value="1">
                    <span>
                        <b>Tình trạng:</b>
                        <?php
                            if($num2['so_luong'] >= 1){
                                echo "<i> còn hàng</i>";
                            }else{
                                echo "<i>hết hàng</i>";
                            }
                        ?>
                    </span>
                </p>

                <div class="btn-add">
                    <button type="submit" name="add-cart" class="btn btn-danger">
                        MUA NGAY
                        <p>(Giao tận nơi hoặc lấy tại cửa hàng)</p>
                    </button>
                    <button type="submit" name="like_heart" class="btn btn-warning"><i class="fa fa-heart"></i></button>
                    <p class="call-add">
                        <i class="fa fa-phone-alt"></i> Gọi đặt mua:
                        <a href="tel:0963543864">
                        0963543864
                        </a>
                        (Miễn phí)
                    </p>
                </div>
        </div>
    </div>
    </form>

    <?php
        if (isset($_POST['like_heart'])){
            $add_like = like_product($_SESSION['id_kh'],$num2['id_sp']);
            if ($add_like){
                echo "<div class='popupunder alert alert-success fade in'>
                                    <button type='button' class='close close-sm' data-dismiss='alert'>
                                    <i class='glyphicon glyphicon-remove'></i>
                                    </button>
                                     <strong>Thông báo : </strong> Đã thêm vào sản phẩm yêu thích! <br>
                                    <a href='like_product.php' title='s2'>Danh sách sản phẩm yêu thích</a>
                                  </div>";
            }else{
                echo "<script>alert('Thêm sản phẩm vào yêu thích Lỗi')</script>";
            }
        }
    ?>
    <hr>
    <div class="row product-details-footer">
        <div class="col-md-7 details-footer-left">
            <h3>Hỏi đáp & tư vấn</h3>
            <?php
                if (isset($_POST['cmt-add'])){
                    $hoten = $_POST['cmt-name'];
                    $noidung = $_POST['cmt-text'];
                    $sdt = $_POST['cmt-sdt'];
                    if (!empty($hoten) && !empty($noidung) && !empty($sdt)){
                        $addcmt = add_cmt($iddt, $hoten, $noidung , $sdt);
                        if ($addcmt){
                            echo "<script>alert('Bình luận thành công')</script>";
                        }else{
                            echo "<script>alert('Lỗi')</script>";
                        }

                    }else{
                        echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
                    }

                }
            ?>
            <form method="post">
                <div class="form-group">
                 <textarea name="cmt-text" id="" cols="30" rows="10" class="form-control"
                   placeholder="Xin mời để lại câu hỏi, Store sẽ trả lời trong 1h từ 8h - 22h mỗi ngày."></textarea>
                </div>
                <div class="form-group">
                 <input type="text" name="cmt-name" class="form-control" placeholder="Họ tên (bắt buộc)">
                </div>
                <div class="form-group">
                 <input type="text" name="cmt-sdt" class="form-control" placeholder="Số điện thoại (bắt buộc)">
                </div>
                <div class="form-group">
                 <button type="submit" name="cmt-add" class="btn btn-danger">Gửi hỏi đáp</button>
                </div>
            </form>
            <hr>
            <form method="post">
                <table class="view-cmt" style="width: 100%;">
                <?php
                    $viewcmt = view_bl($iddt);
                    while ($num3 = mysqli_fetch_array($viewcmt))
                    {
                ?>
                        <tr>
                            <td class="ava-cmt">
                                <?php echo $num3['ncmt'];?>
                            </td>
                            <th><?php echo $num3['ho_ten'];?></th>
                        </tr>
                        <tr>
                            <td colspan="2" class="cmt">
                                <?php echo $num3['noi_dung'];?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="rep-cmt">
                                <a href="" name="idrep"
                                   style="color: #d70018;">
                                    <i class="far fa-comment-dots"></i>
                                    <span>Trả lời</span>
                                </a> |
                                <span class="time-cmt">
                                    <?php echo $num3['ngay_gio'];?>
                                </span>
                            </td>
                        </tr>
                        <?php
                        $viewrep = view_rep($num3['id_bl']);
                        while ($num5 = mysqli_fetch_array($viewrep))
                        {
                        ?>
                            <tr>
                                <td colspan="2">
                                    <div class="box_rep" style="min-height: 180px;position: relative;background: #eee;
                                margin-bottom: 10px;width: calc(100% - 30px);float: right;border: 1px solid #dadada;
                                border-radius: 5px;padding: 15px 15px 0;">
                                        <div class="rowuser">
                                            <span style="width: 100%;position: absolute;z-index: 2;top: -18px;color: #eee;
                                    text-align: left;left: 8px;">
                                                <font class="fa fa-caret-up fa-2x"></font>
                                            </span>
                                            <img src="../Images/logo1.PNG" width="25" height="25" alt="">
                                            <span style="padding-left: 6px;font-size: 17px;">
                                                <b>
                                                    <?php
                                                        $qtv = view_qtv();
                                                        $num6 = mysqli_fetch_array($qtv);
                                                        echo $num6['ten_kh'];
                                                    ?>
                                                </b>
                                            </span>
                                            <span style="background: #e11b1e;border-radius: 2px;padding: 0 5px;line-height: normal;
                                    border: 1px solid #e11b1e;font-size: 11px;color: #fff;font-weight: 400;
                                    display: inline-block;margin: 5px 0 0 10px;"><b>QTV</b></span>
                                        </div>
                                        <div class="question" style="display: block;overflow: hidden;position: relative;
                                margin: 0;font-size: 13px;color: #333;line-height: 24px;clear: both;float: none;
                                width: auto;padding: 10px 0 10px 30px;">
                                            Store xin chào A/C <?php echo $num3['ho_ten'];?> ạ<br>
                                            <?php echo $num5['noi_dung'];?> <br>
                                            Thông tin tới anh ạ.
                                        </div>
                                        <div class="rep-cmt">
                                            <a href="" style="color: #d70018;">
                                                <i class="far fa-comment-dots"></i>
                                                <span>Trả lời</span>
                                            </a> |
                                            <span class="time-cmt">
                                                <?php echo $num5['ngay_gio'];?>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    } ?>
            </table>
            </form>
        </div>
                    <!--Thông số kỹ thuật-->
        <div class="col-md-5 details-footer-right">
            <h3>Thông số kỹ thuật</h3>
            <table class="table table-bordered table-responsive">
                <tr>
                    <td class="tile-left">Hãng sản xuất: </td>
                    <td><?php echo $num2['ten_dmsp']; ?></td>
                </tr>
                <tr>
                    <td class="tile-left">Kích thước: </td>
                    <td><?php echo $num2['kich_thuoc']; ?></td>
                </tr>
                <tr>
                    <td class="tile-left">Trọng lượng: </td>
                    <td><?php echo $num2['trong_luong']; ?></td>
                </tr>
                <tr>
                    <td class="tile-left">Camera trước: </td>
                    <td><?php echo $num2['camera_truoc']; ?></td>
                </tr>
                <tr>
                    <td class="tile-left">Camera sau: </td>
                    <td><?php echo $num2['camerasau']; ?></td>
                </tr>
                <tr>
                    <td class="tile-left">Loại sim: </td>
                    <td><?php echo $num2['loai_sim']; ?></td>
                </tr>
                <tr>
                    <td class="tile-left">GPS: </td>
                    <td><?php echo $num2['gps']; ?></td>
                </tr>
                <tr>
                    <td class="tile-left">Blutooth: </td>
                    <td><?php echo $num2['blutooth']; ?></td>
                </tr>

                <tr>
                    <td colspan="2" class="xemtm">
                        <button type="button" class="btn btn-danger"
                                data-toggle="modal" data-target="#myModal">Xem thêm</button>
                    </td>
                </tr>
            </table>
<!---------------------Modal------------------>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thông số kỹ thuật chi tiết <?php echo $num2['ten_sp'];?></h4>
                        </div>
                        <div class="modal-body" style="overflow: auto; height: 500px">
                            <table class="table">
                                <tr>
                                    <th>Hãng sản xuất:</th>
                                    <td><b><?php echo $num2['ten_dmsp']; ?></b></td>
                                </tr>
                                <tr>
                                    <th>Kích thước: </th>
                                    <td><?php echo $num2['kich_thuoc']; ?></td>
                                </tr>
                                <tr>
                                    <th>Trọng lượng: </th>
                                    <td><?php echo $num2['trong_luong']; ?></td>
                                </tr>
                                <tr>
                                    <th>RAM: </th>
                                    <td><?php echo $num2['ram']; ?></td>
                                </tr>
                                <tr>
                                    <th>Bộ nhớ trong: </th>
                                    <td><?php echo $num2['rom']; ?></td>
                                </tr>
                                <tr>
                                    <th>Loại sim: </th>
                                    <td><?php echo $num2['loai_sim']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kích thước màn hình: </th>
                                    <td><?php echo $num2['kich_thuoc_mh']; ?></td>
                                </tr>
                                <tr>
                                    <th>Độ phân giải màn hình: </th>
                                    <td><?php echo $num2['do_phan_giai_mh']; ?></td>
                                </tr>
                                <tr>
                                    <th>Chip set: </th>
                                    <td><?php echo $num2['chip_set']; ?></td>
                                </tr>
                                <tr>
                                    <th>Hệ điều hành: </th>
                                    <td><?php echo $num2['he_dieu_hanh']; ?></td>
                                </tr>
                                <tr>
                                    <th>Camera trước: </th>
                                    <td><?php echo $num2['camera_truoc']; ?></td>
                                </tr>
                                <tr>
                                    <th>Camera sau: </th>
                                    <td><?php echo $num2['camerasau']; ?></td>
                                </tr>
                                <tr>
                                    <th>WLAN: </th>
                                    <td><?php echo $num2['wlan']; ?></td>
                                </tr>
                                <tr>
                                    <th>Blutooth: </th>
                                    <td><?php echo $num2['blutooth']; ?></td>
                                </tr>
                                <tr>
                                    <th>GPS: </th>
                                    <td><?php echo $num2['gps']; ?></td>
                                </tr>
                                <tr>
                                    <th>Cảm biến: </th>
                                    <td><?php echo $num2['cam_bien']; ?></td>
                                </tr>
                                <tr>
                                    <th>Pin: </th>
                                    <td><?php echo $num2['pin']; ?></td>
                                </tr>


                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
<!---------------------/Modal------------------->
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
   href="tel:0963543864" data-toggle="tooltip" title="Gọi ngay cho tôi" data-placement="right">
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
<script src="../Public/JS/zoom.js"></script>
<script src="../Public/JS/alert.js"></script>
