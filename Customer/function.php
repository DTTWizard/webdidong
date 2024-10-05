<?php
require_once ("connect.php");
function generateVoucherCode($length = 8) {
    return strtoupper(bin2hex(random_bytes($length / 2)));
}

// Hàm thêm voucher vào cơ sở dữ liệu
function addVoucher($discount, $expiration_date) {
    $code = generateVoucherCode();
    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO vouchers (code, discount, expiration_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $code, $discount, $expiration_date);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return $code; // Trả về mã voucher
    } else {
        $stmt->close();
        $conn->close();
        return false; // Trả về false nếu có lỗi
    }
}

// Hàm lấy tất cả các voucher
function getAllVouchers() {
    $conn = getDBConnection();
    $sql = "SELECT * FROM vouchers";
    $result = $conn->query($sql);
    
    $vouchers = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $vouchers[] = $row;
        }
    }
    $conn->close();
    return $vouchers;
}
//      Hien tai khoan
function account($user){
    global $conn;
    connect();
    $sql = "select * from khachhang WHERE tai_khoan='$user'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Login
function login($user,$pass){
    global $conn;
    connect();
    $sql = "select * from khachhang WHERE tai_khoan='$user' and mat_khau='$pass'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Kiem tra
function ktra($user){
    global $conn;
    connect();
    $sql = "select * from khachhang WHERE tai_khoan='$user'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Register
function register($user,$pass){
    global $conn;
    connect();
    $sql="insert into khachhang(tai_khoan, mat_khau)
              VALUES ('$user', '$pass')";
    $query = mysqli_query($conn, $sql);
    if ($query) return true;
    else return false;
}
//      Change Password
function change_pwd($id,$pass){
    global $conn;
    connect();
    $sql="update khachhang set mat_khau='$pass' WHERE id_kh='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) return true;
    else return false;
}
//      Check Password
function check_pwd($id,$pass){
    global $conn;
    connect();
    $sql = "select * from khachhang WHERE mat_khau='$pass' AND id_kh='$id'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Tìm kiếm theo tên sp
function search($ten){
    global $conn;
    connect();
    $sql = "SELECT * 
            FROM sanpham 
            WHERE ten_sp LIKE '%$ten%' 
            OR gia_sp LIKE '%$ten%' 
            OR gia_km LIKE '%$ten%' 
            OR ram LIKE '%$ten%' 
            OR rom LIKE '%$ten%';
    ";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Danh sach Danh muc san pham limit 9
function ds_dmsp(){
    global $conn;
    connect();
     $sql = "select * from danhmuc_sp WHERE id_dmsp ORDER BY id_dmsp ASC limit 8";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Danh sach Danh muc san pham lấy từ vị trí thứ 9 trở đi
//  Câu lệnh SQL bên dưới nói rằng “trả về chỉ 30 bản ghi, bắt đầu từ bản ghi 9 (OFFSET 8)
function ds_dmsp_nine(){
    global $conn;
    connect();
    $sql = "select * from danhmuc_sp WHERE id_dmsp ORDER BY id_dmsp ASC limit 30 OFFSET 8";
    $query = mysqli_query($conn, $sql);
    return $query;
}

//      Điện thoại nổi bật nhất lấy 4 vị trí đầu tiên
function dt_noibat(){
    global $conn;
    connect();
    $sql = "select *, (gia_sp - gia_km) as giamgia from sanpham 
            WHERE id_sp ORDER BY giamgia DESC limit 4";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Điện thoại nổi bật nhất lấy 4 vị trí bắt đầu từ vị trí thứ 5
function dt_noibat_five(){
    global $conn;
    connect();
    $sql = "select *, (gia_sp - gia_km) as giamgia from sanpham 
            WHERE id_sp ORDER BY giamgia DESC limit 4 offset 4";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Danh mục sản phẩm
function ds_dmsps(){
    global $conn;
    connect();
    $sql = "select * from danhmuc_sp WHERE id_dmsp ORDER BY id_dmsp limit 6";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Điện thoại theo hãng
function dt_dmsp($iddm){
    global $conn;
    connect();
    $sql = "select * from sanpham WHERE id_dmsp='$iddm' ORDER BY id_sp DESC limit 8 ";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      xem thêm điện thoại theo hãng
function view_dt_dmsp($iddm){
    global $conn;
    connect();
    $sql = "select * from danhmuc_sp WHERE id_dmsp='$iddm'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      xem thêm điện thoại theo hãng
function view_dt($iddmsp){
    global $conn;
    connect();
    $sql = "select * from sanpham WHERE id_dmsp='$iddmsp'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Điện thoại nổi bật theo hãng
function view_dt_on($id){
    global $conn;
    connect();
    $sql = "select *, (gia_sp - do_phan_giai_mh) as giamgia 
            from sanpham, danhmuc_sp WHERE sanpham.id_dmsp=danhmuc_sp.id_dmsp 
            AND danhmuc_sp.id_dmsp='$id'
            ORDER BY giamgia DESC limit 4";
    $query = mysqli_query($conn, $sql);
    return $query;
}

//      Chi tiet san pham
function ctsp($id){
    global $conn;
    connect();
    $sql = "select * from sanpham,danhmuc_sp WHERE id_sp='$id' AND 
        sanpham.id_dmsp=danhmuc_sp.id_dmsp";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Kiểm tra sản phẩm có trong giỏ hàng chua
function ktgh($idkh, $idsp){
    global $conn;
    connect();
    $sql = "select * from gio_hang WHERE id_kh='$idkh' AND id_sp='$idsp'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      nếu sản phẩm có trong giỏ hàng rồi thì tăng thêm
function tang_slsp($sl, $idgh){
    global $conn;
    connect();
    $sql = "UPDATE gio_hang SET so_luong = so_luong + '$sl' WHERE id_giohang='$idgh'";
    $query = mysqli_query($conn, $sql);
    if ($query) return true;
    else return false;
}
//      Thêm sản phẩm vào giỏ hàng
function add_spgh($idkh, $idsp, $sl){
    global $conn;
    connect();
    $sql = "insert into gio_hang(id_kh, id_sp, so_luong) VALUES 
            ($idkh,$idsp,$sl)";
    $query = mysqli_query($conn, $sql);
    if ($query) return true;
    else return false;
}
//      View gio hang
function view_gh($idkh){
    global $conn;
    connect();
    $sql = "select id_giohang, gio_hang.id_sp, anh_sp, ten_sp, gia_km, mau_sac,
            gio_hang.so_luong, (gia_km * gio_hang.so_luong) as thanh_tien from gio_hang, sanpham 
WHERE gio_hang.id_kh='$idkh' AND gio_hang.id_sp=sanpham.id_sp";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Xóa giỏ hàng theo từng sp
function delete_gh($id)
{
    global $conn;
    connect();
    $sql = "DELETE FROM gio_hang WHERE id_giohang='$id'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Đặt hàng
function buy_cart($idkh,$tongtien,$hotennn,$sdtnn,$emailnn,$noinhannn,$ghichunn){
    global $conn;
    connect();
    $sql = "insert into don_dh(id_kh, ngay_lap, tong_tien, hoten_nn, sdt_nn, email_nn, noi_nhan, ghi_chu) 
        VALUES ('$idkh', CURRENT_TIME , '$tongtien', '$hotennn', '$sdtnn', '$emailnn', '$noinhannn', '$ghichunn')";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Chi tiết đơn đặt hàng
function ct_ddh($iddh, $idsp, $sl, $dongia, $tongtien){
    global $conn;
    connect();
    $sql = "insert into chitiet_ddh(id_ddh, id_sp, so_luong, don_gia, tong_tien) VALUES 
            ('$iddh', '$idsp', '$sl', '$dongia', '$tongtien')";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Giảm số lượng sản phẩm khi đặt mua
function giam_sl($idsp, $sl){
    global $conn;
    connect();
    $sql = "update sanpham set so_luong = so_luong - '$sl' WHERE 
              id_sp='$idsp'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Delete giỏ hàng khi đặt hàng thành công
function delete_gh_idkh($id)
{
    global $conn;
    connect();
    $sql = "DELETE FROM gio_hang WHERE id_kh = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Đặt hàng thành công và xuất hóa đơn cho khách hàng
function bill($id){
    global $conn;
    connect();
    $sql = "select * from don_dh WHERE id_kh='$id' ORDER BY id_ddh DESC LIMIT 1";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//  Chi tiết hóa đơn
function details_bill($id){
    global $conn;
    connect();
    $sql = "select *, chitiet_ddh.so_luong as slspb from chitiet_ddh, sanpham WHERE chitiet_ddh.id_sp=sanpham.id_sp AND 
            id_ddh='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Danh sách đơn đặt hàng theo id_kh
function view_order($id){
    global $conn;
    connect();
    $sql = "select * from don_dh WHERE id_kh='$id' ORDER BY id_ddh DESC ";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Chi tiết đơn đặt hàng theo id_kh
function view_order_details($id){
    global $conn;
    connect();
    $sql = "select *, chitiet_ddh.so_luong as slspb from chitiet_ddh, sanpham WHERE chitiet_ddh.id_sp=sanpham.id_sp AND 
            id_ddh='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}

//      Chi tiết từng đơn hàng
function view_order_ct($id){
    global $conn;
    connect();
    $sql = "select * from don_dh WHERE id_ddh='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Hiển thị bình luận
function view_bl($id){
    global $conn;
    connect();
    $sql = "select *,SUBSTRING(ho_ten,1,1) as ncmt from binhluan WHERE id_sp='$id' ORDER by id_bl DESC limit 5";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Thêm bình luận
function add_cmt($idsp,$hoten,$noidung,$sdt){
    global $conn;
    connect();
    $sql = "insert into binhluan (id_sp, ho_ten, ngay_gio, noi_dung, sdt) VALUES 
        ('$idsp', '$hoten', CURRENT_TIMESTAMP , '$noidung', '$sdt')";
    $query = mysqli_query($conn, $sql);
    if ($query) return true;
    else return false;
}
//      Trả lời bình luận
function add_rep($idkh,$idbl,$noidung){
    global $conn;
    connect();
    $sql = "insert into rep_binhluan (id_kh, id_bl, ngay_gio, noi_dung) VALUES 
        ('$idkh', '$idbl', CURRENT_TIMESTAMP , '$noidung')";
    $query = mysqli_query($conn, $sql);
    if ($query) return true;
    else return false;
}
//      Hiển thị phản hồi
function view_rep($id){
    global $conn;
    connect();
    $sql = "select * from rep_binhluan WHERE id_bl='$id'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Hiển thị tên QTV
function view_qtv(){
    global $conn;
    connect();
    $sql = "select * from khachhang WHERE id_kh=1";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Profile user
function prf_user($id){
    global $conn;
    connect();
    $sql = "select * from khachhang WHERE id_kh='$id'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Update profile user
function up_prf_user($id, $ten, $avata, $sdt, $email, $diachi){
    global $conn;
    connect();
    $sql = "update khachhang set ten_kh='$ten', avatar='$avata',sdt='$sdt', email='$email', dia_chi='$diachi' WHERE id_kh='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) return true;
    else return false;
}
//      Delete Đơn đặt hàng
function delete_ddh($id)
{
    global $conn;
    connect();
    $sql = "DELETE FROM don_dh WHERE id_ddh= '$id'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Xóa đơn đặt hàng thì tăng số lượng sp vào
function tang_soluong($id,$soluong)
{
    global $conn;
    connect();
    $sql = "UPDATE sanpham set so_luong = so_luong + '$soluong' WHERE id_sp = '$id'";
    $query = mysqli_query($conn,$sql);
    if($query) return true;
    else return false;
}
//      Thêm sản phẩm yêu thích
function like_product($idkh, $idsp){
    global $conn;
    connect();
    $sql = "insert into yeuthich (id_kh, id_sp) VALUES ('$idkh', '$idsp')";
    $query = mysqli_query($conn,$sql);
    if($query) return true;
    else return false;
}
//      DS yêu thích theo idkh
function ds_like($id){
    global $conn;
    connect();
    $sql = "SELECT * FROM yeuthich,sanpham
WHERE yeuthich.id_sp=sanpham.id_sp AND yeuthich.id_kh='$id' ORDER BY yeuthich.id_sp DESC";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Xóa sp khỏi yêu thích
function delete_like($id)
{
    global $conn;
    connect();
    $sql = "DELETE FROM yeuthich WHERE id_yt='$id'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
function sendPasswordResetEmail($email, $matkhaumoi) {
    require "../PHPMailer-master/src/PHPMailer.php";
    require "../PHPMailer-master/src/SMTP.php";
    require "../PHPMailer-master/src/Exception.php";

    $mail = new PHPMailer\PHPMailer\PHPMailer(true); // true: enables exceptions
    try {
        $mail->SMTPDebug = 0; // 0,1,2: debug mode
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  // SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'dttdtt957@gmail.com'; // SMTP username
        $mail->Password = 'rreqmimkdzuukoaj'; // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL
        $mail->Port = 465;  // port to connect to
        $mail->setFrom('dttdtt957@gmail.com', 'Tiến');
        $mail->addAddress($email); // Set the recipient's email
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư gửi lại mật khẩu mới';

        // Login page URL
        $loginUrl = "http://yourwebsite.com/login"; // Replace this with your actual login page URL

        // Customize the email body with the new password and login link
        $noidungthu = "<p>Mật khẩu mới của bạn là: <strong>" . $matkhaumoi . "</strong></p>";
        $noidungthu .= "<p>Bạn có thể đăng nhập bằng mật khẩu mới tại liên kết này: <a href='http://localhost/webdidong/Customer/login.php". "'>Đăng nhập</a></p>";

        $mail->Body = $noidungthu;

        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo "<script>alert('Gửi yêu cầu thành công!.Bạn check mật khẩu mới ở email của bạn.');</script>";
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}



?>