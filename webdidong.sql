-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 06:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdidong`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_gio` datetime NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id_bl`, `id_sp`, `ho_ten`, `ngay_gio`, `noi_dung`, `sdt`) VALUES
(1, 1, 'Phát LTP', '2020-06-29 17:14:28', 'Con này chạy android hay ios ạ', '0987689198'),
(2, 1, 'LTP', '2020-07-16 00:00:00', 'CURRENT_DATE', 'Còn Khóng'),
(3, 7, 'Nguyễn Văn A', '2020-07-16 00:00:00', 'Có màu đen k', '0999999999'),
(4, 28, 'Bê văn đê', '2020-07-16 00:00:00', 'Điện thoại tàu giá rẻ quá', '0284526785'),
(5, 22, 'Hoàng quỳnh Trang', '2020-07-16 00:00:00', 'Ở Hà Nội có mấy cơ sở bên mình thế ạ ?', '0963519899'),
(6, 18, 'Dàng a pháo', '2020-07-16 00:00:00', 'con này camera thò thụt phải không', '01234567890'),
(7, 3, 'Lan Anh', '2020-07-16 00:00:00', 'Camera nhiều zoom  lên tận mặt trăng luôn', '0356425652'),
(13, 31, 'Trịnh đào hoa', '2020-07-26 17:57:02', 'cho hỏi là mặt hàng này còn không', '0985456321'),
(14, 8, 'Hoàng Hoa Thám', '2020-08-05 15:56:53', 'Mình mới dùng con 1 tháng và trải nghiệm rất là thích lun', '0789526341'),
(15, 8, 'Nguyen van ânh', '2020-08-05 16:29:40', 'có tặng gì không', '0963589123'),
(16, 3, 'Phát dz', '2020-08-06 01:05:33', 'Camea 100x đúng k nhờ', '0926748870');

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_ddh`
--

CREATE TABLE `chitiet_ddh` (
  `id_ddh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiet_ddh`
--

INSERT INTO `chitiet_ddh` (`id_ddh`, `id_sp`, `so_luong`, `don_gia`, `tong_tien`) VALUES
(8, 5, 1, 17900000, 17900000),
(9, 5, 1, 17900000, 17900000),
(9, 9, 2, 9800000, 19600000),
(9, 28, 1, 30000000, 30000000),
(10, 6, 2, 14990000, 29980000),
(10, 22, 1, 2690000, 2690000),
(11, 32, 2, 14590000, 29180000),
(12, 3, 1, 14990000, 14990000),
(13, 3, 1, 14990000, 14990000),
(14, 3, 1, 14990000, 14990000),
(15, 6, 1, 14990000, 14990000),
(16, 3, 1, 14990000, 14990000),
(17, 7, 1, 8950000, 8950000),
(18, 5, 1, 17900000, 17900000),
(22, 3, 4, 14990000, 59960000),
(22, 13, 3, 8250000, 24750000),
(26, 7, 1, 8950000, 8950000),
(27, 5, 1, 17900000, 17900000),
(28, 19, 1, 11190000, 11190000),
(29, 3, 1, 14990000, 14990000),
(30, 7, 1, 8950000, 8950000),
(30, 8, 2, 16190000, 32380000),
(31, 5, 1, 17900000, 17900000),
(31, 8, 4, 16190000, 64760000),
(32, 28, 1, 12700000, 12700000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_sp`
--

CREATE TABLE `danhmuc_sp` (
  `id_dmsp` int(11) NOT NULL,
  `ten_dmsp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_dmsp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc_sp`
--

INSERT INTO `danhmuc_sp` (`id_dmsp`, `ten_dmsp`, `logo_dmsp`) VALUES
(1, 'IPHONE', 'icon_apple.jpg'),
(2, 'SAMSUNG', 'icon_samsung.jpg'),
(3, 'XIAOMI', 'icon_xiaomi.jpg'),
(4, 'OPPO', 'icon_oppo.png'),
(5, 'REALME', 'icon_realme.png'),
(7, 'HUAWEI', 'icon_huawei.jpg'),
(8, 'VSMART', 'icon_vsmart.png'),
(9, 'BLACKBERRY', 'icon_blaclberry.png'),
(12, 'Cool Pad', 'icon_coolpad.png'),
(14, 'Itel', 'icon_itel.jpg'),
(15, 'Masstel', 'icon_masstel.png'),
(16, 'Mobell', 'icon_mobell.jpg'),
(17, 'Nokia', 'icon_nokia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `don_dh`
--

CREATE TABLE `don_dh` (
  `id_ddh` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `ngay_lap` datetime NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `hoten_nn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_nn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_dh`
--

INSERT INTO `don_dh` (`id_ddh`, `id_kh`, `ngay_lap`, `tong_tien`, `hoten_nn`, `sdt_nn`, `email_nn`, `noi_nhan`, `ghi_chu`) VALUES
(8, 1, '2020-07-18 16:50:11', 17900000, 'Garen', '0888999555', 'Garen@gmail.com', 'Hà Nội', 'Hàng dễ vỡ đấy\r\n'),
(9, 1, '2020-07-18 16:50:53', 67500000, 'Lys Tans Phats', '0963785109', 'Lytanphat19091999@gmail.com', 'Rua ha, Thanh thuy, Thanh oai, Ha Noi', 'ok can than'),
(10, 1, '2020-07-19 13:06:39', 32670000, 'Syndra', '0444888999', 'Syndra@gmail.com', 'Hà Nội VN', 'Gọi điện trước nhé'),
(11, 1, '2020-07-19 13:12:14', 29180000, 'Coorki', '0222333111', 'Coorki@gmail.com', 'Việt Nam', 'Có tai nghe không hả'),
(12, 1, '2020-07-19 13:28:38', 14990000, 'Vikto', '0444111555', 'Vikto@gmail.com', 'Hồ Chí Minh', 'Cẩn thận hàng dễ vỡ đấy'),
(13, 1, '2020-07-19 13:29:21', 14990000, 'Ashe', '0145263524', 'Ashe@gmail.com', 'Hà Nội Việt Nam Trái Đất', 'Cẩn thận k tui boom'),
(14, 1, '2020-07-19 13:31:15', 14990000, 'Leesin', '0635241456', 'Leesin@gmail.com', 'Hải Phòng, Việt Nam', 'Có voucher gì k'),
(15, 1, '2020-07-19 13:31:44', 14990000, 'Morgana', '0789654123', 'Morgana@gmail.com', 'Biên Hòa, Đồng Nai', 'Ping 1000'),
(16, 1, '2020-07-19 13:32:06', 14990000, 'Karma', '0253641897', 'Karma@gmail.com', 'Vĩnh Phúc Corona', 'Giao hàng nhớ đeo khẩu trang'),
(17, 1, '2020-07-19 13:32:34', 8950000, 'Tristana', '0741852963', 'Tristana@gmail.com', 'Nam Định', 'Có test thử khhong'),
(18, 3, '2020-07-20 16:51:51', 17900000, 'vo danh', '3331122332', 'appp@gmail.com', 'Rua ha, Thanh thuy, Thanh oai, Ha Noi', 'Dịa chỉ 2: Rua ha, Thanh thuy, Thanh oai, Ha Noi'),
(22, 2, '2020-07-25 15:29:44', 84710000, 'Phát LTP', '0963785109', 'lytanphat99@gmail.com', '82 Rùa hạ, Thanh thùy, Thanh oai, HN', ''),
(26, 14, '2020-08-04 22:47:24', 8950000, '', '', '', '', ''),
(27, 14, '2020-08-05 13:14:04', 17900000, 'Tan Phat', '098756781', 'plokij@gmail.com', 'HCM', 'ok'),
(28, 14, '2020-08-05 13:15:16', 11190000, 'aaa', '098765432', 'jhfdsa@gmail.com', 'HCM', 'ok'),
(29, 14, '2020-08-05 14:30:43', 14990000, 'áddđ', '0987654321', 'adsgfdgfhg@gmail.com', 'JDAAAAAAA', 'aiosk'),
(30, 14, '2020-08-05 15:09:20', 41330000, 'Lý Tấn Phát', '0963785109', 'phatdz99@gmail.com', '82 - Rùa Hạ - Thanh Thùy - Thanh Oai - Hà Nội', 'Gọi lúc 10h sáng nhé'),
(31, 1, '2020-08-05 22:30:37', 82660000, 'Lý Tấn Phát', '0963785109', 'tanphat99@gmail.com', '82, Rùa Hạ, Thanh Thùy, Thanh Oai, Hà Nội', 'Cầm theo cả sim Viettel nha'),
(32, 2, '2020-08-05 22:35:18', 12700000, 'Lý Tấn Phát', '0963785109', 'tanphat99@gmail.com', '82, Rùa Hạ, Thanh Thùy, Thanh Oai, Hà Nội', 'Test kỹ điện thoại cho e nhé');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_giohang` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id_giohang`, `id_kh`, `id_sp`, `so_luong`) VALUES
(5, 9, 18, 1),
(6, 9, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(11) NOT NULL,
  `tai_khoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `tai_khoan`, `mat_khau`, `avatar`, `ten_kh`, `sdt`, `email`, `dia_chi`) VALUES
(1, 'admin', 'admin', 'Tan Phat.jpg', 'Lý Tấn Phát', '0963785109', 'lytanphat19091999@gmail.com', '82, Rùa Hạ, Thanh Thùy, Thanh Oai, Hà Nội'),
(2, 'lytanphat99', '12345678', 'phat2.jpg', 'Tấn Phát', '0584744125', 'tanphats2@gmail.com', 'Thanh Thùy, Thanh Oai, Hà Nội'),
(3, 'lytanphat999', '123', 'phat1.jpg', 'Yasuo', '0987987888', 'yasuo@gmail.com', 'Riot game'),
(7, 'garenltp', '9899', 'phat4.jpg', 'Garen Long Tướng', '0666222555', 'garenltp@gmail.com', 'Thôn Rùa Hạ 1 - Xã Thanh Thùy - Huyện Thanh Oai -Hà Nội, Rùa Hạ 1 - Thanh Thùy - Thanh Oai - Hà Nội'),
(8, 'nguyenvana', '123', 'Tan Phat.jpg', '', '', '', ''),
(9, 'suhao', '123456', 'Userp.png', 'suhaohao', '0963789666', 'xuhaohuxu@gmail.com', 'vo danh'),
(11, 'nguoidungb', '123456', 'logo.png', 'Vo danh b', '0987654326', 'nddz@gmail.com', 'Viet Nam'),
(12, 'tanphat012', '12345678', '', '', '', '', ''),
(14, 'quynhtrang', '12345678', 'telesale.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rep_binhluan`
--

CREATE TABLE `rep_binhluan` (
  `id_rep` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_bl` int(11) NOT NULL,
  `ngay_gio` datetime NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rep_binhluan`
--

INSERT INTO `rep_binhluan` (`id_rep`, `id_kh`, `id_bl`, `ngay_gio`, `noi_dung`) VALUES
(2, 1, 15, '2020-08-05 17:50:56', 'Nhân viên ABCmobile sẽ liên hệ cho bạn trong thời gian sớm nhất !'),
(3, 1, 14, '2020-08-05 19:26:31', 'cảm ơn bạn đã phản hồi sản phẩm của shopppppppppp'),
(5, 1, 13, '2020-08-05 18:14:06', 'Còn nhiều lắm bạn'),
(8, 1, 3, '2020-08-05 18:52:51', 'còn nha bạn\r\nbạn đặt hàng đi ạ'),
(10, 1, 15, '2020-08-05 18:57:41', 'có rất nhiều phần quà hấp dẫn'),
(16, 1, 14, '2020-08-06 01:59:12', 'ok'),
(17, 1, 14, '2020-08-06 02:07:57', 'okkk');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `id_dmsp` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `gia_km` int(11) NOT NULL,
  `mau_sac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trong_luong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kich_thuoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `chip_set` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camera_truoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camerasau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cam_bien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `he_dieu_hanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blutooth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wlan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_phan_giai_mh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kich_thuoc_mh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_sim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bao_hanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dmsp`, `ten_sp`, `anh_sp`, `gia_sp`, `gia_km`, `mau_sac`, `trong_luong`, `kich_thuoc`, `so_luong`, `chip_set`, `pin`, `camera_truoc`, `camerasau`, `cam_bien`, `he_dieu_hanh`, `gps`, `blutooth`, `wlan`, `do_phan_giai_mh`, `kich_thuoc_mh`, `loai_sim`, `rom`, `ram`, `bao_hanh`) VALUES
(1, 1, 'iPhone 11 Pro Max 256GB Chính hãng(VNA)', 'iphone11promax_1.webp', 37590000, 32590000, 'GOLD', '226g', '158.0mm - 77.8mm - 8.1mm', 300, 'A13 Bionic', '3969 mAh', '12 MP ƒ/2.2 aperture', '3 Camera 12MP:- Camera tele: ƒ/2.0 aperture- Camera góc rộng: ƒ/1.8 aperture- Camera siêu rộng: ƒ/2.4 aperture', 'FaceID, Con quay hồi chuyển, Gia tốc kế, Cảm biến tiệm cận, Cảm biến ánh sáng xung quanh', 'iOS 13', 'GPS/GNSS', '5.0', '802.11ax Wi‑Fi 6 with 2x2 MIMO', '2688 x 1242 pixels', '6.5 inches', 'Nano-SIM + eSIM', '256 GB', '4 GB', '12 Tháng'),
(3, 2, 'Samsung Galaxy S20+ BTS Edition', 's20_ultra_bts_edition_0003_samsung_galaxy_s20_plus_bts_edit.jpg', 24990000, 14990000, 'Tím', '186 g', '161.9 x 73.7 x 7.8 mm', 7, 'Exynos 990 (7 nm+)', 'Li-Po 4500 mAh battery, Fast charging 25W, USB Power Delivery 3.0, Fast Qi/PMA wireless charging 15W, Reverse wireless charging 9W', '10 MP, f/2.2, 26mm (wide), 1/3.2\", 1.22µm, Dual Pixel PDAF', '12 MP, f/1.8, 26mm (wide), 1/1.76\", 1.8µm, Dual Pixel PDAF, OIS 64 MP, f/2.0, 29mm (telephoto), 1/1.72\", 0.8µm, PDAF, OIS, 1.1x optical zoom, 3x hybrid zoom 12 MP, f/2.2, 13mm (ultrawide), 1.4µm, Super Steady video 0.3 MP, TOF 3D, f/1.0, (d', 'Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10, One UI 2', 'A-GPS, GLONASS, BDS, GALILEO', '5.0, A2DP, LE', 'Wi-Fi 802.11 a/b/g/n/ac/ax, dual-band, Wi-Fi Direct, hotspot', '1440 x 3200 pixels', '6.7 inches', '2 SIM (Nano-SIM)', '128 GB', '8 GB', '24 tháng'),
(5, 1, 'iPhone 11 Chính hãng(VN/A)', 'iphone11-pro_1.webp', 23590000, 17900000, 'Xanh lá', '194 g', '150.9mm - 75.7mm - 8.3mm', 471, '	A13 Bionic', '3110 mAh', '12 MP, ƒ/2.2 aperture', 'Camera kép 12MP: - Camera góc rộng: ƒ/1.8 aperture - Camera siêu rộng: ƒ/2.4 aperture', 'FaceID, Con quay hồi chuyển, Gia tốc kế, Cảm biến tiệm cận, Cảm biến ánh sáng xung quanh', '	iOS 13', 'GPS/GNSS', '5.0', '802.11ax Wi‑Fi 6 with 2x2 MIMO', '1792 x 828 pixel', '6.1 inches', 'Nano-SIM + eSIM', '256 GB', '4 GB', '24 tháng'),
(6, 1, 'Apple iPhone XR 64GB Chính hãng(VN/A)', 'iphone_xr_64gb.webp', 16290000, 14990000, 'Đỏ', '194 g', '150,9 x 75,7 x 8,3 mm', 785, 'Apple A12 Bionic', '2749 mAh', '7MP', '12MP', 'FaceID', 'iOS 13', 'A-GPS, GLONASS', 'v5.0, A2DP, LE', '	802.11 a/b/g/n/ac, 2 ăng-ten, điểm truy cập cá nhân', '1792 x 828 pixel', '6.1 inches', 'Nano-SIM', '64 GB', '3 GB', '12 Tháng'),
(7, 1, 'Apple iPhone 7 Plus 32GB Chính hãng(Mã VN/A)', '600_iphone_7_plus_silver_800x800_1_1.jpg', 11990000, 8950000, 'Bạc', '188 g (6.63 oz)', '158.2 x 77.9 x 7.3 mm (6.23 x 3.07 x 0.29 in)', 379, 'Apple A10 Fusion APL1W24', 'Li-ion 2900 mAh', '7 MP (f/2.2, 32mm), 1080p@30fps, 720p@240fps, nhận diện khuôn mặt, HDR', '12 MP (f/1.8, 28mm, 1/3\", OIS) + 12 MP (f/2.8, 56mm, 1/3.6\"), tự động lấy nét nhận diện theo giai đoạn, 2x zoom quang học, 4 LED flash (2 tone)', 'Vân tay, gia tốc, la bàn, khoảng cách, con quay quy hồi, phong vũ biểu', 'iOS 11', 'A-GPS, GLONASS, GALILEO, QZSS', '4.2, A2DP, LE', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot', '1080 x 1920 pixels', '5.5 inches', 'Nano-SIM', '32 GB', '3 GB', '12 tháng'),
(8, 2, 'Samsung Galaxy Note 10+ (Plus)', 'note_10_plus_xanh.jpg', 26990000, 16190000, 'Xanh', '196 g', '77.2 mm x 162.3 mm x 7.9 mm', 977, 'Samsung Exynos 9825', '4300 mAh, Quick Charge 45W', '10 MP (F2.2)', '- Góc siêu rộng: 16MP (F2.2) - Góc rộng: 12MP OIS (F.15/F2.4) - Tele: 12MP OIS (F2.1) - Ống kính cảm biến chiều sâu TOF', 'Mở khóa bằng khuôn mặt, Mở khoá vân tay dưới màn hình', 'Android 9.0 (Pie)', 'BDS, A-GPS, GLONASS', 'LE, apt-X, A2DP, v5.0', 'Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi Direct, Wi-Fi hotspot', '3040 x 1440 pixels', '6.8 inches', '2 SIM (Nano-SIM)', '256 GB', '12 GB', '24 tháng'),
(9, 2, 'Samsung Galaxy Note 10 Lite', 'note-10-lite-.webp', 11490000, 9800000, 'Đen', '199 g', '163.7 mm - Ngang 76.1 mm - Dày 8.7 mm', 251, 'Exynos 9810 8 nhân', '4500 mAh', '- 32.0Mp - Flash màn hình, Nhận diện khuôn mặt, Làm đẹp (Beautify),Quay video HD, Quay video Full HD - Tự động lấy nét (AF)', '- Chính 12 MP và Phụ 12 MP,12 MP - Đèn Flash', 'Mở khoá vân tay dưới màn hình', 'Android 10', 'BDS, A-GPS, GLONASS', 'LE, A2DP, apt-X, v5.0', 'Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot', '1080 x 2280 pixels', '6.7 inches', '2 SIM (Nano-SIM)', '128 GB', '8 GB', '12 tháng'),
(10, 2, 'Samsung Galaxy Note 10', 'note10-do.png', 22990000, 14600000, 'Đỏ', '168 g', '71.8 mm x 151 mm x 7.9 mm', 493, 'Samsung Exynos 9825', '3500 mAh, sạc nhanh 25W', '10 MP (F2.2)', '- Góc siêu rộng: 16MP (F2.2) - Góc rộng: 12MP OIS (F.15/F2.4) - Tele: 12MP OIS (F2.1)', 'FaceID, Con quay hồi chuyển, Gia tốc kế, Cảm biến tiệm cận, Cảm biến ánh sáng xung quanh', '9.0 (Pie)', 'BDS, A-GPS, GLONASS', 'apt-X, LE, A2DP, v5.0', 'Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi Direct, Wi-Fi hotspot', '1080 x 2280 pixels', '6.3 inches', '2 SIM (Nano-SIM)', '256 GB', '8 GB', '12 Tháng'),
(11, 3, 'Xiaomi Redmi Note 9s 4G 64GB', 'redmi_note_9s_0002_layer_1.jpg', 5490000, 4800000, 'Xanh dương', '209 g', '165.75 mm x 76.68 mm x 8.8 mm', 1200, 'Qualcomm SM7125 Snapdragon 720G (8 nm)', 'Non-removable Li-Po 5020 mAh battery, Fast charging 18W', '16 MP, f/2.5, (wide), 1.0µm', 'Camera chính: 48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF Camera siêu rộng: 8 MP, f/2.2, 13mm (ultrawide), 1/4.0\", 1.12µm Camera macro: 5 MP, f/2.4, (macro), 1.12µm Camera xoá phông: 2 MP, f/2.4, (depth)', 'Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10, MIUI 11', 'A-GPS, GLONASS, GALILEO, BDS', '5.0, A2DP, LE', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '1080 x 2400 pixels', '6.67 inches', '2 SIM (Nano-SIM)', '64 GB', '4 GB', '12 Tháng'),
(12, 3, 'Xiaomi Redmi 9', 'redmi_9_0002_layer_1.jpg', 3590000, 3300000, 'Tím', '190 g', '165.8 x 76.7 x 8.8 mm', 600, 'Mediatek Helio G70 (12 nm)', 'Li-Po 5000 mAh battery, Fast charging 18W', '5 MP', '13 MP, f/1.8, (wide), 1/3.1\", 1.12µm, PDAF 8 MP, f/2.2, 118˚ (ultrawide), 1/4.0\", 1.12µm 5 MP, f/2.4, (macro) 2 MP, f/2.4, (depth)', 'Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10, MIUI 12', 'Yes, with A-GPS, GLONASS, GALILEO, BDS', '5.0, A2DP, LE', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '1080 x 2400 pixels', '6.53 inches', '2 SIM (Nano-SIM)', '32 GB', '3 GB', '12 tháng'),
(13, 3, 'Xiaomi Mi Note 10 Lite 64GB', 'mi-note-10-lite_0001_1_1.jpg', 8990000, 8250000, 'Trắng', '208 g', '157.8 x 74.2 x 9.7 mm', 987, 'Qualcomm SDM730 Snapdragon 730G (8 nm)', 'Li-Po 5260 mAh battery', '16 MP, f/2.0, 26mm (wide), 1/2.8\", 0.8µm', '64 MP, f/1.9, 26mm (wide), 1/1.72\", 0.8µm, PDAF 8 MP, f/2.2, 13mm (ultrawide), 1/4.0\", 1.12µm 5 MP, f/2.4, (macro) 2 MP, f/2.4, (depth)', 'Cảm biến vân tay trong màn hình, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10.0; MIUI 11', 'Hỗ trợ A-GPS, GLONASS, GALILEO, BDS', '5.0, A2DP, LE, aptX HD', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '1920 x 1080 pixels', '6.47 inches', '2 SIM (Nano-SIM)', '64 GB', '6 GB', '12 tháng'),
(14, 3, 'Xiaomi Redmi Note 8 Pro 128GB', 'xiaomi-redmi-note-8-pro-xanh-1_1.webp', 590000, 550000, 'Xanh dương', '180 g', '150,9 x 75,7 x 8,3 mm', 200, 'Helio G90T', '4500 mAh, sạc nhanh 18W', '20 MP', '4 camera: - Cảm biến chính: 64 MP - Camera góc rộng: 8 MP - Camera macro 2 MP - Cảm biến độ sâu 2 MP', 'Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10.0; MIUI 11', '5.0, A2DP, LE', '5.0, A2DP, LE, EDR', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '1920 x 1080 pixels', '6.53 inches', '2 SIM (Nano-SIM)', '64 GB', '3GB', '12 tháng'),
(15, 3, 'Xiaomi Redmi 8A', 'xiaomi-redmi-8a-1-600x600.jpg', 2290000, 2000000, 'Đỏ', '188 g', 'Dài 156.5 mm - Ngang 75.4 mm - Dày 9.4 m', 2000, 'Qualcomm Snapdragon 439 8 nhân 64-bit', 'Li-Po 5000 mAh', '8 MP', '12 MP', 'Mở khóa bằng khuôn mặt', 'Android 9.0 (Pie)', 'BDS, A-GPS, GLONASS', 'LE, A2DP, v4.2', 'Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Wi-Fi hotspot', '720 x 1520 pixels', '6.2 inches', '2 SIM (Nano-SIM)', '3', '2 GB', '12 tháng'),
(16, 4, 'OPPO A92', 'oppo-a92-tim-400x460-400x460.png', 6490000, 5990000, 'Tím', '192 g', '162 x 75.5 x 8.9 mm', 700, 'Qualcomm SM6125 Snapdragon 665 (11 nm)', 'Li-Po 5000 mAh, Fast charging 18W', '16 MP, f/2.0, (wide), 1/3.1, 1.0µm', 'Camera chính: 48 MP, f/1.7, (wide), 1/2.0\", 0.8µm, PDAF Camera siêu rộng: 8 MP, f/2.2, 119° (ultrawide), 1/4.0\", 1.12µm Camera xoá phông: 2 MP, f/2.4, (depth) Camera B/W: 2 MP B/W, f/2.4', 'Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10, ColorOS 7.1', 'A-GPS, GLONASS, GALILEO, BDS', '5.0, A2DP, LE', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '1080 x 2400 pixels', '6.5 inches', '2 SIM (Nano-SIM)', '128 GB', '8 GB', '12 tháng'),
(17, 4, 'Oppo Reno 3', 'oppo-reno3-trang-400x460-400x460.png', 8490000, 7700000, 'Trắng', '170 g', '160.2 x 73.3 x 7.9 mm', 1100, 'Mediatek MT6779 Helio P90 (12 nm)', 'Non-removable Li-Po 4025 mAh battery, Fast charging 30W, 50% in 30 min, 100% in 73 min (advertised), VOOC 3.0', 'Camera chính: 44 MP, f/2.4, 26mm (wide), 1/2.65\", 0.7µm Camera xoá phông: 2 MP, f/2.4, (depth)', 'Camera chính: 48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF Camera tele: 13 MP, f/2.4, 52mm (telephoto), 1/3.4\", 1.0µm, 2x optical zoom, PDAF Camera góc siêu rộng: 8 MP, f/2.2, 13mm (ultrawide), 1/4.0\", 1.12µm Camera xoá phông: 2 MP B/W, f', 'Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10, ColorOS 7', 'A-GPS, GLONASS, GALILEO, BDS', '5.0, A2DP, LE', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '1080 x 2400 pixels', '6.4 inches', '2 SIM (Nano-SIM)', '128 GB', '8 GB', '12 tháng'),
(18, 4, 'Oppo Find X2', 'oppo-find-x2-xanh-400x460-1-400x460.png', 23990000, 17990000, 'Xanh', '196 g', 'Dài 164.9 -Ngang 74.5 -Dày 8 mm', 400, 'Qualcomm Snapdragon 865', '4200 mAh Li-Ion, Hỗ trợ sạc nhanh', '32 MP', 'Chính 48 MP & Phụ 13 MP, 12 MP', '- Vân tay ẩn trong màn hình: Hỗ trợ - Cảm biến: Cảm biến nhiệt độ màu, Cảm biến ánh sáng, Cảm biến tiệm cận, La Bàn, Con Quay Hồi Chuyển.', 'Android 10.0 , ColorOS 7.0', 'BDS, A-GPS, GLONASS', 'Bluetooth v5.1', '802.11a/b/g/n/ac/ax; WLAN 2.4G/WLAN 5.1G/WLAN 5.8G/WLAN Display; 2×2 MIMO; support Wi-Fi 6', '3168 x 1440 pixel', '6.7 inches', '2 SIM (Nano-SIM)', '256 GB', '12 GB', '12 tháng'),
(19, 4, 'Oppo Reno 3 Pro', 'oppo-reno3-pro-den-400x460-400x460.png', 14990000, 11190000, 'Đen', '175 g', '158.8 x 73.4 x 8.1 mm', 750, 'Mediatek Helio P95 (12 nm)', 'Non-removable Li-Po 4025 mAh battery, Fast charging 30W, 50% in 20 min (advertised), VOOC 4.0', 'Camera chính: 44 MP, f/2.4, 26mm (wide), 1/2.65\", 0.7µm Camera xoá phông: 2 MP, f/2.4, (depth)', 'Camera chính:64 MP, f/1.7, 27mm (wide), 1/1.72\", 0.8µm, PDAF Camera tele:13 MP, f/2.4, 52mm (telephoto), 1/3.4\", 1.0µm, PDAF, 2x optical zoom Camera góc siêu rộng: 8 MP, f/2.2, 13mm (ultrawide), 1/4.0\", 1.12µm, AF Camera xoá phông: 2 MP B/W', 'Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10.0; ColorOS 7', 'A-GPS, GLONASS, GALILEO, BDS', '5.0, A2DP, LE', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '1080 x 2400 pixels', '6.4 inches', '2 SIM (Nano-SIM)', '256 GB', '8 GB', '12 tháng'),
(20, 5, 'Realme 6', 'realme-6-8gb-trang-400x460-1-1-400x460.png', 6990000, 6490000, 'Trắng', '202 g', '63.8 m x 75.8 mm x 8.9 mm', 900, 'Mediatek Helio G90T', '4300 mAh, Sạc nhanh VOOC 4.0(30W)', '16MP, f/2.0 + 8MP, f2.2', 'Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', 'Cảm biến vân tay tích hợp trên nút nguồn, 1 chạm Touch Access mở khoá siêu nhanh trong 0.29s, nhận diện 5 dấu vân tay khác nhau', 'Realme UI (Android 10)', 'A-GPS, GLONASS, BDS', '5.0, A2DP, LE', '802.11 a/b/g/n/ac, Dual-band, Wi-Fi Direct, Wi-Fi hotspot', '1080 x 2400 pixels', '6.5 inches', '2 SIM (Nano-SIM)', '128 GB', '8 GB', '12 tháng'),
(21, 5, 'Realme C3', 'realme-c3-red-460x400-400x460.png', 2990000, 2650000, 'Đỏ', '195 g', '164.4 x 75 x 9 mm', 630, 'Mediatek Helio G70 (12 nm)', 'Li-Po 5000 mAh', 'Camera trước: 5 MP, f/2.4, 27mm (wide), 1/5\", 1.12µm', 'Camera chính: 12 MP, f/1.8, 28mm (wide), 1/2.8\", 1.25µm, PDAF Camera Macro: 2 MP Camera đo chiều sâu:2 MP, f/2.4', 'Cảm biến vân tay, cảm biến gia tốc, cảm biến tiệm cận, la bàn', 'Android 10.0; realme UI 1.0', 'A-GPS, GLONASS, BD', '5.0, A2DP, LE, aptX', 'Wi-Fi 802.11 b/g/n, hotspot', '720 x 1600 pixel', '6.5 inches', '2 SIM (Nano-SIM)', '32 GB', '3GB', '12 tháng'),
(22, 5, 'Realme C11', 'realme-c11-095320-035343-400x460.png', 2990000, 2690000, 'Xanh lá', '196 g', '164.4 x 75.9 x 9.1 mm', 500, 'MediaTek Helio G35 (12 nm)', '5000 mAh Li-Polymer', '5 MP, f/2.4, 27mm (wide)', '13 MP, (wide), f/2.2, PDAF 2 MP, f/2.4, (depth)', 'Cảm biến sáng, cảm biến gia tốc, con quay hồi chuyển, la bàn', 'Android 10, realme UI 1.0', 'A-GPS, GLONASS, BDS', '5.0, A2DP, LE, aptX', 'Wi-Fi 802.11 b/g/n, hotspot', '750 x 1560 pixel', '6.5 inches', '2 SIM (Nano-SIM)', '32 GB', '3 GB', '12 Tháng'),
(23, 5, 'Realme C3i', 'realme-c3i-blue-400x460-400x460.png', 2590000, 2390000, 'Xanh', '195 g', '164.4 x 75 x 8.95 mm', 299, 'MediaTek Helio G70', '5000 mAh - Sạc nhanh 2A (10W)', '5 MP, f/2.4', '12.0 MP + 2.0 MP', 'Cảm biến chuyển động, Cảm biến gia tốc và la bàn', 'Realme UI (Android 10)', 'Có', 'v5.0', '802.11 a/b/g/n, Wi-Fi Direct, Wi-Fi hotspot GPS : Có', '720 x 1600 pixel', '6.5 inches', '2 SIM (Nano-SIM)', '32 GB', '3 GB', '12 tháng'),
(28, 3, 'Xiaomi Mi Note 10 Pro', 'mi-cc9-pro-blue_1.jpg', 14990000, 12700000, 'Xanh', '208 g', '150,9 x 75,7 x 8,3 mm', 29972, 'Snapdragon 730G 8 nhân', '5260 mAh', '32 MP', 'Chính 108 MP & Phụ 20 MP, 12 MP, 5 MP, 2 MP', 'Mở khóa bằng khuôn mặt, Mở khoá vân tay dưới màn hình', 'Android 9.0 (Pie)', 'BDS, A-GPS, GLONASS', 'apt-X, A2DP, LE, v5.0', 'Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi Direct, Wi-Fi hotspot', '1080 x 2340 pixels', '6.47 inches', '2 SIM (Nano-SIM)', '256 GB', '8 GB', '12 Tháng'),
(29, 3, 'Xiaomi Redmi 8', 'redmi-8-4g-den.png', 2990000, 2800000, 'Đen', '188 g', '156.5 mm - Ngang 75.4 mm - Dày 9.4 mm', 4000, 'Snapdragon 439 8 nhân', '5000 mAh - Tiết kiệm pin, Sạc nhanh Quick Charge 3.0', '8 MP', 'Chính 12 MP & Phụ 2 M', 'Mở khóa bằng vân tay, Mở khoá khuôn mặt', 'Android 9.0 (Pie)', 'BDS, A-GPS, GLONASS', 'A2DP, LE, v4.2', 'Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Wi-Fi hotspot', '720 x 1520 pixels', '6.2 inches', '2 SIM (Nano-SIM)', '64 GB', '4 GB', '12 tháng'),
(30, 3, 'POCO F2 PRO 8G', 'poco_f2_0001_layer_3_2.jpg', 14990000, 13990000, 'Bạc', '219 g', '163.3 x 75.4 x 8.9 mm', 25600, 'Qualcomm SM8250 Snapdragon 865 (7 nm+)', 'Li-Po 4700 mAh battery, Fast charging 30W, 100% in 63 min, USB Power Delivery 3.0, Quick Charge 4+', 'Motorized pop-up 20 MP, f/2.2, (wide), 1/3.4\", 0.8µm', '64 MP, f/1.9, 26mm (wide), 1/1.72\", 0.8µm, PDAF 5 MP, f/2.2, 50mm (telephoto macro), AF 13 MP, f/2.4, 123˚ (ultrawide), 1.12µm 2 MP, f/2.4, (depth)', 'Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển', 'Android 10, MIUI 11', 'Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, QZSS', '5.1, A2DP, LE, aptX HD, aptX Adaptive', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '6.67 inches', '1080 x 2400 pixels', '2 SIM (Nano-SIM)', '256 GB', '8 GB', '12 tháng'),
(31, 7, 'Huawei P40 Pro', 'p40_pro_0000_layer_2.jpg', 23990000, 35000000, 'Xám', '209 g', '158.2 x 72.6 x 9.0 mm', 999, 'Kirin 990 5G 8 nhân', '4200 mAh', 'Chính 32 MP & Phụ IR TOF 3D', 'Chính 50 MP & Phụ 40 MP,12 MP, TOF 3D', 'Mở khóa bằng vân tay, Mở khoá khuôn mặt', 'EMUI 10 (Android 10 không có Google)', 'A-GPS, GLONASS', 'A2DP, apt-X, EDR, LE, v5.1', 'Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi Direct, Wi-Fi hotspot', '1200 x 2640 pixels', '6.58 inches', '2 SIM (Nano-SIM)', '256 GB', '8 GB', '12 tháng'),
(32, 7, 'Huawei Mate 30 Pro', 'mate30__0006_layer_4.jpg', 21990000, 14590000, 'Xám bạc', '198 g', '158.1 x 73.1 x 8.8 mm', 714, 'HiSilicon Kirin 990 (7 nm)', 'Li-Po 4500 mAh, sạc nhanh 40W, sạc không dây 27W', '32 MP, f/2.0, 26mm (wide), 1/2.8\", 0.8µm I TOF 3D', 'Camera chính: 40 MP, f/1.6, 27mm (wide), 1/1.7\", PDAF, OIS Camera tele: 8 MP, f/2.4, 80mm (telephoto), 1/4\", PDAF, OIS, 3x optical zoom Camera siêu rộng: 40 MP, f/1.8, 18mm (ultrawide), 1/1.54\", PDAF Camera TOF 3D', 'Face ID, cảm biến vân tay, cảm biến gia tốc, cảm biến tiệm cận, con quay hồi chuyển, la bàn, gia tốc kế', 'Android 10.0; EMUI 10', 'dual-band A-GPS, GLONASS, BDS, GALILEO, QZSS', '5.1, A2DP, aptX HD, LE', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, DLNA, Wi-Fi Direct, hotspotWi-Fi 802.11 a/b/g/n/ac, dual-band, DLNA, Wi-Fi Direct, hotspot', '1176 x 2400 pixel', '6.53 inches', '2 SIM (Nano-SIM)', '256 GB', '8 GB', '12 tháng'),
(33, 7, 'Huawei Nova 7i', 'huawei-nova-7i-1_2.png', 7690000, 6790000, 'Xanh lá', '183 g', '159.2 x 76.3 x 8.7 mm', 222, 'HiSilicon Kirin 810 (7 nm)', 'Li-Po 4200 mAh, sạc nhanh 40W', '16 MP, f/2.0, (wide), 1/3.1\", 1.0µm', 'Camera góc rộng: 48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF Camera siêu rộng: 8 MP, f/2.4, (ultrawide) Camera macro: 2 MP, f/2.4, 27mm (macro), 1/5.0\", 1.75µm Cảm biến chiều sâu: 2 MP, f/2.4, (depth)', 'Cảm biến vân tay, cảm biến gia tốc, cảm biến tiệm cận, la bàn', 'Android 10.0; EMUI 10', 'A-GPS, GLONASS, GALILEO, BDS, QZSS', '5.0, A2DP, LE', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '1080 x 2310 pixels', '6.4 inches', '2 SIM (Nano-SIM)', '128 GB', '8 GB', '12 tháng'),
(34, 7, 'Huawei P30 Lite', 'huawei-p30-lite-400x460.png', 5490000, 3900000, 'Xanh coban', '159g', '72,7mm - 152,9mm - 7,4mm', 1900, 'Kirin 710', '3340 mAh', '32MP', '24MP + 8MP + 2MP', 'Cảm biến trọng lực, Cảm biến ánh sáng môi trường, Cảm biến tiệm cận, Con quay hồi chuyển, La bàn, Cảm biến vân tay', 'Android v9.0 (Pie)', 'A-GPS, Glonass', 'BT4.2, BLE, aptX, HWA và aptX HD', '2.4G: 802.11b/g/n 5G: 802.11 a/n/ac', '1080 x 2312 pixes', '6.15 inches', '2 SIM (Nano-SIM)', '128 GB', '6 GB', '12 tháng');

-- --------------------------------------------------------

--
-- Table structure for table `yeuthich`
--

CREATE TABLE `yeuthich` (
  `id_yt` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yeuthich`
--

INSERT INTO `yeuthich` (`id_yt`, `id_kh`, `id_sp`) VALUES
(4, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `chitiet_ddh`
--
ALTER TABLE `chitiet_ddh`
  ADD PRIMARY KEY (`id_ddh`,`id_sp`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `danhmuc_sp`
--
ALTER TABLE `danhmuc_sp`
  ADD PRIMARY KEY (`id_dmsp`);

--
-- Indexes for table `don_dh`
--
ALTER TABLE `don_dh`
  ADD PRIMARY KEY (`id_ddh`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Indexes for table `rep_binhluan`
--
ALTER TABLE `rep_binhluan`
  ADD PRIMARY KEY (`id_rep`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `id_bl` (`id_bl`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dmsp` (`id_dmsp`);

--
-- Indexes for table `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD PRIMARY KEY (`id_yt`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `danhmuc_sp`
--
ALTER TABLE `danhmuc_sp`
  MODIFY `id_dmsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `don_dh`
--
ALTER TABLE `don_dh`
  MODIFY `id_ddh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rep_binhluan`
--
ALTER TABLE `rep_binhluan`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `yeuthich`
--
ALTER TABLE `yeuthich`
  MODIFY `id_yt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitiet_ddh`
--
ALTER TABLE `chitiet_ddh`
  ADD CONSTRAINT `chitiet_ddh_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiet_ddh_ibfk_2` FOREIGN KEY (`id_ddh`) REFERENCES `don_dh` (`id_ddh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `don_dh`
--
ALTER TABLE `don_dh`
  ADD CONSTRAINT `don_dh_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rep_binhluan`
--
ALTER TABLE `rep_binhluan`
  ADD CONSTRAINT `rep_binhluan_ibfk_1` FOREIGN KEY (`id_bl`) REFERENCES `binhluan` (`id_bl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_binhluan_ibfk_2` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dmsp`) REFERENCES `danhmuc_sp` (`id_dmsp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD CONSTRAINT `yeuthich_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yeuthich_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
