<?php
    require_once ("function.php");
    session_start();
    ob_start();
if (!isset($_SESSION['id_kh'])){
    header('location: Trangchu.php');
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
            <span class="logo1">A</span>
            <span class="logo2">BCmobile</span></a>
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
<div class="row body-cart">
    <div class="container">
        <a href="Trangchu.php"><h5><i class="fa fa-chevron-left"></i> Mua thêm sản phẩm khác</h5></a>
        <h3>Giỏ hàng của tôi</h3>
        <form method="post">
            <div class="row">
                <div class="col-md-12 table-responsive cart-top">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Tùy chọn</th>
                        </tr>
                        <?php
                        $arr = array();
                        $tongtien = 0;
                        $ktra_gh = view_gh($_SESSION['id_kh']);

                        if (mysqli_num_rows($ktra_gh) != 0)
                        {
                            while ($row = mysqli_fetch_array($ktra_gh))
                            {
                                $arr[] = array((int)$row['id_sp'], (int)$row['so_luong'], (int)$row['gia_km'],(int)$row['thanh_tien']);
                                ?>
                                <tr>
                                    <td><img src="../Images/<?php echo $row['anh_sp'];?>" style="width: 60px; height: 60px" alt=""></td>
                                    <td><?php echo $row['ten_sp'];?></td>
                                    <td><?php echo $row['mau_sac'];?></td>
                                    <td><?php echo $row['gia_km'];?></td>
                                    <td><?php echo $row['so_luong'];?></td>
                                    <td><?php echo $row['thanh_tien'];?></td>
                                    <td>
                                        <a href="delete_cart.php?idgh=<?php echo $row['id_giohang']; ?>"
                                           onClick ="if(confirm('Bạn chắc chắn muốn xóa sản phẩm này ?'))
                               return true; else return false;"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>

                                <?php
                                $tongtien += $row['thanh_tien'];
                            }
                        }else{
                         ?>
                            <tr>
                                <td colspan="7">
                                    <h3>Giỏ hàng trống</h3>
                                    <h5 class="text-center"><a href="Trangchu.php">
                                            <i class="fa fa-chevron-left"></i> Lựa chọn thêm sản phẩm khác</a></h5>
                                </td>
                            </tr>
                       <?php }
                        ?>
                    </table>
                </div>
                <div class="col-md-12 cart-bottom">
                    <div class="container">
                        <h4><b>ĐỊA CHỈ NHẬN HÀNG</b></h4>
                        <div class="col-md-4">
                            <label for="tenkh">Họ và tên</label>
                            <input type="text" name="ten_nn" id="tenkh" class="form-control" placeholder="Họ và tên (*)">
                        </div>
                        <div class="col-md-4">
                            <label for="sdt">Số điện thoại</label>
                            <input type="text" name="sdt_nn" id="sdt" class="form-control" placeholder="Số điện thoại (*)">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email</label>
                            <input type="email" name="email_nn" id="email" class="form-control" placeholder="Email (*)">
                        </div>
                        <div class="col-md-12">
                        <label for="new_input">Nhập mã giảm giá</label>
                        <input type="text" name="discount_code" id="new_input" class="form-control" placeholder="Nhập mã giảm giá (nếu có)">
                            <label for="diachi">Địa chỉ giao hàng</label>
                            <input type="text" name="diachi_nn" id="diachi" class="form-control" placeholder="Địa chỉ giao hàng (*)">
                        </div>
                        <div class="col-md-12">
                            <label for="ghichu">Ghi chú</label>
                            <textarea name="ghichu_nn" id="ghichu" class="form-control" cols="30" rows="10"
                            placeholder="Ghi chú"></textarea>
                        </div>
                        <div class="col-md-12 prices">
                            <b class="price1">TỔNG GIÁ TRỊ THANH TOÁN:</b>
                            <b class="price2"><?php echo number_format($tongtien,0,',','.'); ?>&nbsp;đ</b>
                        </div>
                        <div class="col-md-12 but-add-cart">
                            <button type="submit" name="ok-add" class="btn btn-danger">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
global $conn;
    if (isset($_POST['ok-add'])){
        $tennn = $_POST['ten_nn'];
        $sdtnn = $_POST['sdt_nn'];
        $emailnn = $_POST['email_nn'];
        $diachinn = $_POST['diachi_nn'];
        $ghichunn = $_POST['ghichu_nn'];
        if (!empty($arr)){
            // Ensure customer delivery details are filled
            if (!empty($tennn) && !empty($sdtnn) && !empty($emailnn) && !empty($diachinn)){
                
                // Initialize total amount
                $tongtien = 0;
        
                // Loop through the cart to calculate total based on discounted price
                foreach ($arr as $key => $value) {
                    // Assuming you want to apply a discount to the original price
                    $original_price = $value[2];
                    $quantity = $value[1];
                    
                    // Calculate the discounted price
                    $discount_percentage = 0.10; // Example: 10% discount (adjust as necessary)
                    $discounted_price = $original_price * (1 - $discount_percentage);
                    
                    // Multiply by the quantity
                    $tongtien += $discounted_price * $quantity;
                }
        
                // Proceed with placing the order if total is calculated
                $dathang = buy_cart($_SESSION['id_kh'], $tongtien, $tennn, $sdtnn, $emailnn, $diachinn, $ghichunn);
                if ($dathang){
                    $insert_idctddh = mysqli_insert_id($conn);
                    foreach ($arr as $key => $value){
                        $ctddh = ct_ddh($insert_idctddh, $value[0], $value[1], $value[2], $value[3]);
                    }
                    if ($ctddh){
                        foreach ($arr as $key => $value){
                            $giamsl = giam_sl($value[0], $value[1]); // Deduct the quantity sold
                        }
                        if ($giamsl){
                            $del_gh_idkh = delete_gh_idkh($_SESSION['id_kh']); // Clear the cart after successful order
                            if ($del_gh_idkh){
                                header("location: success.php"); // Redirect to success page
                            }else{
                                echo "<script>alert('Đặt hàng không thành công')</script>";
                            }
                        }else{
                            echo "<script>alert('Đặt hàng không thành công')</script>";
                        }
                    }else {
                        echo "<script>alert('Đặt hàng không thành công')</script>";
                    }
                }else{
                    echo "<script>alert('Đặt hàng không thành công')</script>";
                }
            }else{
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin nhận hàng !')</script>";
            }
        }else{
            echo "<script>alert('Giỏ hàng trống')</script>";
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
        <span>Điện thoại: 0963546864 <a href="tel: "></a></span> <br>
        <i class="fas fa-phone-volume"></i>
        <span>Hotline: 0963546864 <a href="tel: "></a></span> <br>
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
<script src="../Public/JS/alert.js"></script>