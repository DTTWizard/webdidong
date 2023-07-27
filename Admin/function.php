<?php
 require_once ('../Customer/connect.php');

//    DS Khach Hang
    function ds_kh(){
        global $conn;
        connect();
        $sql = "select * from khachhang";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
//      DS tài khoản theo ID
    function ds_kh_id($id){
        global $conn;
        connect();
        $sql = "select * from khachhang WHERE id_kh='$id'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
//      Sửa tài khoản
    function sua_tk($id, $tk, $mk, $avatar,$tenkh, $sdt, $email, $diachi){
        global $conn;
        connect();
        $sql = "Update khachhang set tai_khoan='$tk',mat_khau='$mk', avatar='$avatar',ten_kh='$tenkh',
                  sdt='$sdt',email='$email',dia_chi='$diachi' WHERE id_kh='$id'";
        $query = mysqli_query($conn, $sql);
        if($query) return true;
        else return false;
    }
//      Xóa tài khoản
    function xoa_tk($id){
        global $conn;
        connect();
        $sql = " delete from khachhang WHERE id_kh='$id'";
        $query = mysqli_query($conn, $sql);
        if($query) return true;
        else return false;
    }
//      Thêm tài khoản
    function them_tk($tk, $mk, $avatar,$tenkh, $sdt, $email, $diachi){
        global $conn;
        connect();
        $sql = "insert into khachhang(tai_khoan, mat_khau, avatar, ten_kh, sdt, email, dia_chi)
        VALUES ('$tk', '$mk', '$avatar','$tenkh', '$sdt', '$email', '$diachi')";
        $query = mysqli_query($conn, $sql);
        if ($query) return true;
        else return false;
    }
//      DS Damh muc san pham
    function ds_dmsp(){
        global $conn;
        connect();
        $sql = "select * from danhmuc_sp";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
//      Xóa danh mục sản phẩm
    function xoa_dmsp($id){
        global $conn;
        connect();
        $sql = " delete from danhmuc_sp WHERE id_dmsp='$id'";
        $query = mysqli_query($conn, $sql);
        if($query) return true;
        else return false;
    }
//      Thêm danh mục sản phẩm
    function them_dmsp($tendm,$logo){
        global $conn;
        connect();
        $sql = "insert into danhmuc_sp(ten_dmsp, logo_dmsp) VALUES ('$tendm', '$logo')";
        $query = mysqli_query($conn, $sql);
        if($query) return true;
        else return false;
    }
//      Danh mục sản phẩm theo id
    function ds_dmsp_id($id){
        global $conn;
        connect();
        $sql = "select * from danhmuc_sp WHERE id_dmsp='$id'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
//      Sửa danh mục sản phẩm
    function sua_dmsp($id, $ten_dmsp, $logo){
        global $conn;
        connect();
        $sql = "Update danhmuc_sp set ten_dmsp='$ten_dmsp', logo_dmsp='$logo' WHERE id_dmsp='$id'";
        $query = mysqli_query($conn, $sql);
        if($query) return true;
        else return false;
    }
//    DS Sản Phẩm
    function ds_sp(){
        global $conn;
        connect();
        $sql = "select * from sanpham, danhmuc_sp WHERE sanpham.id_dmsp = danhmuc_sp.id_dmsp ORDER BY sanpham.id_dmsp ASC ";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
//    DS Sản Phẩm theo ID
    function ds_sp_id($idsp){
        global $conn;
        connect();
        $sql = "select * from sanpham, danhmuc_sp WHERE sanpham.id_dmsp = danhmuc_sp.id_dmsp AND id_sp='$idsp'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
//      Xóa danh mục sản phẩm
    function xoa_sp($id){
        global $conn;
        connect();
        $sql = " delete from sanpham WHERE id_sp='$id'";
        $query = mysqli_query($conn, $sql);
        if($query) return true;
        else return false;
    }
//      DS Sản Phẩm theo ID
    function sua_sp($idsp, $tensp, $anhsp, $giasp, $giakm, $mausac, $trongluong, $kichthuoc,
                $soluong, $chipset, $pin, $cameratruoc, $camerasau, $cambien, $hedieuhanh, $gps, $blutooth,
                $wlan, $dpgmh, $ktmh, $loaisim, $rom, $ram, $iddmsp, $baohanh){
        global  $conn;
        connect();
        $sql = "update sanpham set ten_sp='$tensp', anh_sp='$anhsp',
                gia_sp='$giasp', gia_km='$giakm', mau_sac='$mausac', trong_luong='$trongluong',
                kich_thuoc='$kichthuoc', so_luong='$soluong', chip_set='$chipset', pin='$pin',
                camera_truoc='$cameratruoc', camerasau='$camerasau', cam_bien='$cambien', he_dieu_hanh='$hedieuhanh',
                gps='$gps', blutooth='$blutooth', wlan='$wlan', do_phan_giai_mh='$dpgmh', kich_thuoc_mh='$ktmh',
                loai_sim='$loaisim', rom='$rom', ram='$ram',id_dmsp='$iddmsp', bao_hanh='$baohanh' WHERE id_sp='$idsp'";
        $query = mysqli_query($conn, $sql);
        if ($query) return true;
        else return false;
    }
//      Thêm Sản phẩm
    function them_sp($iddmsp, $tensp, $anhsp, $giasp, $giakm, $mausac, $trongluong, $kichthuoc,
                     $soluong, $chipset, $pin, $cameratruoc, $camerasau, $cambien, $hedieuhanh, $gps, $blutooth,
                     $wlan, $dpgmh, $ktmh, $loaisim, $rom, $ram, $baohanh){
        global $conn;
        connect();
        $sql = "insert into sanpham(id_dmsp, ten_sp, anh_sp, gia_sp, gia_km, mau_sac, trong_luong, kich_thuoc,
                    so_luong, chip_set, pin, camera_truoc, camerasau, cam_bien, he_dieu_hanh, gps, blutooth,
                     wlan, do_phan_giai_mh, kich_thuoc_mh, loai_sim, rom, ram, bao_hanh) VALUES ('$iddmsp',
                     '$tensp', '$anhsp', '$giasp', '$giakm', '$mausac', '$trongluong', '$kichthuoc', '$soluong',
                     '$chipset', '$pin', '$cameratruoc', '$camerasau', '$cambien', '$hedieuhanh', '$gps', '$blutooth',
                     '$wlan', '$dpgmh', '$ktmh', '$loaisim', '$rom', '$ram', '$baohanh')";
        $query = mysqli_query($conn, $sql);
        if ($query) return true;
        else return false;
    }

//      DS Đơn đặt hàng
function ds_ddh(){
    global $conn;
    connect();
    $sql = "select * from don_dh,khachhang WHERE don_dh.id_kh=khachhang.id_kh";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Chi tiết đơn hàng
function view_order_details($id){
    global $conn;
    connect();
    $sql = "select chitiet_ddh.id_ddh,anh_sp,mau_sac,ten_sp, chitiet_ddh.so_luong as slspb, don_gia,
  chitiet_ddh.tong_tien from chitiet_ddh,sanpham
WHERE chitiet_ddh.id_sp=sanpham.id_sp AND chitiet_ddh.id_ddh='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      DS Đơn đặt hàng theo id_ddh
function ds_ddh_id($id){
    global $conn;
    connect();
    $sql = "select * from don_dh WHERE id_ddh='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Xóa Đơn hàng
function xoa_ddh($id){
    global $conn;
    connect();
    $sql = " delete from don_dh WHERE id_ddh='$id'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}

//      DS Bình luận
function ds_cmt(){
    global $conn;
    connect();
    $sql = "SELECT * from binhluan, sanpham WHERE binhluan.id_sp=sanpham.id_sp ORDER BY id_bl DESC ";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Xóa Bình luận
function xoa_bl($id){
    global $conn;
    connect();
    $sql = " delete from binhluan WHERE id_bl='$id'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//     Xem Bình luận theo ID
function ds_cmtid($id){
    global $conn;
    connect();
    $sql = "SELECT * from binhluan, sanpham WHERE id_bl='$id' AND binhluan.id_sp=sanpham.id_sp";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Phản hồi khách hàng
function rep_cmt($idkh, $idbl, $nd){
    global $conn;
    connect();
    $sql = "insert into rep_binhluan (id_kh, id_bl, ngay_gio, noi_dung) VALUES 
                    ('$idkh', '$idbl', CURRENT_TIMESTAMP , '$nd')";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Đếm số phản hồi cho 1 bình luận
function sl_repcmt($id){
    global $conn;
    connect();
    $sql = "SELECT id_bl,count(rep_binhluan.id_rep) as slrep from rep_binhluan WHERE id_bl='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Danh sách các phản hồi theo id bình luận
function ds_repcmt($id){
    global $conn;
    connect();
    $sql = "SELECT * from rep_binhluan WHERE id_bl='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Xóa phản hồi
function xoa_rep($id){
    global $conn;
    connect();
    $sql = " delete from rep_binhluan WHERE id_rep='$id'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Xem Bình luận theo id rep của khách hàng
function cmt_idrep($id){
    global $conn;
    connect();
    $sql = "SELECT binhluan.id_bl as idbl,ho_ten, sdt, binhluan.noi_dung as ndkh,
              sanpham.anh_sp, sanpham.ten_sp
            from binhluan,rep_binhluan,sanpham
            WHERE binhluan.id_bl=rep_binhluan.id_bl 
            AND binhluan.id_sp=sanpham.id_sp AND rep_binhluan.id_rep='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Phản hồi theo id
function repcmt_id($id){
    global $conn;
    connect();
    $sql = "SELECT * from rep_binhluan WHERE id_rep='$id'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Cập nhật phản hồi
function edit_rep($rep, $idkh, $idbl, $nd){
    global $conn;
    connect();
    $sql = "update rep_binhluan set id_kh='$idkh', id_bl='$idbl',
            ngay_gio=CURRENT_TIMESTAMP , noi_dung='$nd' WHERE id_rep='$rep'";
    $query = mysqli_query($conn, $sql);
    if($query) return true;
    else return false;
}
//      Thống kê
function tk_kh(){
    global $conn;
    connect();
    $sql = "SELECT count(id_kh) as sltk from khachhang";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_dm(){
    global $conn;
    connect();
    $sql = "SELECT count(id_dmsp) as sldm from danhmuc_sp";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_sp(){
    global $conn;
    connect();
    $sql = "SELECT count(id_sp) as slsp from sanpham";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_ddh(){
    global $conn;
    connect();
    $sql = "SELECT count(id_ddh) as slddh from don_dh";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_bl(){
    global $conn;
    connect();
    $sql = "SELECT count(id_bl) as slbl from binhluan";
    $query = mysqli_query($conn, $sql);
    return $query;
}
//      Tìm kiếm theo tên tài khoản
function search_tk($ten){
    global $conn;
    connect();
    $sql = "select * from khachhang WHERE khachhang.tai_khoan LIKE '%$ten%'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Tìm kiếm theo tên danh mục
function search_dm($ten){
    global $conn;
    connect();
    $sql = "select * from danhmuc_sp WHERE danhmuc_sp.ten_dmsp LIKE '%$ten%'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Tìm kiếm theo tên sản phẩm
function search_sp($ten){
    global $conn;
    connect();
    $sql = "select * from sanpham,danhmuc_sp WHERE sanpham.id_dmsp=danhmuc_sp.id_dmsp AND sanpham.ten_sp LIKE '%$ten%'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
//      Tìm kiếm Bình luận theo tên sản phẩm
function search_bl($ten){
    global $conn;
    connect();
    $sql = "select * from binhluan, sanpham WHERE binhluan.id_sp=sanpham.id_sp AND ten_sp LIKE '%$ten%'";
    $query= mysqli_query($conn, $sql);
    return $query;
}
?>