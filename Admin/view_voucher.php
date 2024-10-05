<?php
require_once 'function.php'; // Bao gồm các hàm cần thiết (nếu có)
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['account'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy thông tin từ form
        $event_name = $_POST['event_name'];
        $discount_percentage = $_POST['discount_percentage'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Tạo mã voucher từ tên sự kiện
        $voucher_code = strtoupper(implode('', array_map(function($word) {
            return $word[0];
        }, explode(' ', $event_name)))) . date('Y') . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Kết nối đến database
        $conn = new mysqli('localhost', 'root', '', 'webdidong');

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối database thất bại: " . $conn->connect_error);
        }

        // Chuẩn bị câu lệnh SQL để thêm voucher
        $stmt = $conn->prepare("INSERT INTO vouchers (event_name, discount_percentage, start_date, end_date, voucher_code, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sisss", $event_name, $discount_percentage, $start_date, $end_date, $voucher_code);

        // Thực thi câu lệnh SQL
        if ($stmt->execute()) {
            $message = "Tạo voucher thành công! Mã Voucher: $voucher_code";
        } else {
             "<script>alert('Tạo voucher thành công! Mã Voucher: $voucher_code'); window.location.href = 'view_voucher.php';</script>";

        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();
    }
} else {
    header('location: ../Customer/login.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../Public/fontawesome-free-5.12.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Notable&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <link rel="stylesheet" href="../Public/CSS/admin.css">
    <title>ABCmobile - Tạo Voucher</title>
</head>

<body class="body-all-ad">
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
            <?php if (isset($_SESSION['account'])): ?>
                <a class='regis_log' href='../Customer/profile_user.php'>
                    <img src='../Images/dat.jpg' alt='User'> <font style='color: bisque'><?= $_SESSION['account'] ?></font>
                </a>
            <?php else: ?>
                <a href="../Customer/register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
                <a class="regis_log" href="../Customer/login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Body -->
    <div class="row body_admin">
        <div class="col-md-3 left-admin" id="left-admin">
            <div class="home-admin">
                <a href="Manager.php">
                    <i class="fas fa-house-damage"></i> Trang chủ Admin
                </a>
            </div>
        </div>
        <div class="col-md-9 right-admin" id="right-admin">
            <div class="row right-admin-top">
                <a href="../Customer/Trangchu.php">
                    <i class="fas fa-home"></i> Trang chủ website
                </a>
                <span> > </span>
                <a href="">Thêm mới Voucher</a>
            </div>
            <div class="row right-admin-bottom">
                <div class="form-add-voucher">
                    <form action="view_voucher.php" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="event_name">Tên sự kiện:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="event_name" name="event_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_percentage">Giảm Giá (% tối đa 30%):</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" max="30" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="start_date">Ngày Bắt Đầu:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="end_date">Ngày Kết Thúc:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tạo Voucher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Hiển thị danh sách Voucher -->
            <div class="row">
                <h3>Danh sách Voucher</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sự kiện</th>
                            <th>Giảm giá (%)</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Mã Voucher</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Kết nối đến cơ sở dữ liệu
                        $conn = new mysqli('localhost', 'root', '', 'webdidong');
                        if ($conn->connect_error) {
                            die("Kết nối database thất bại: " . $conn->connect_error);
                        }
                        // Lấy danh sách voucher
                        $result = $conn->query("SELECT * FROM vouchers");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['event_name']}</td>
                                        <td>{$row['discount_percentage']}</td>
                                        <td>{$row['start_date']}</td>
                                        <td>{$row['end_date']}</td>
                                        <td>{$row['voucher_code']}</td>
                                        <td>{$row['created_at']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Chưa có voucher nào.</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <p>© 2024 ABCmobile - Tất cả quyền được bảo lưu.</p>
    </div>
</body>
</html>
