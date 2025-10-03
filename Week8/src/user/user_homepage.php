<?php
require 'auth.php';
check_employee();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang nhân viên</title>
</head>

<body>
    <h1>Trang dành cho nhân viên</h1>
    <p>Xin chào <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong> (Nhân viên)</p>

    <hr>

    <h3>Menu:</h3>
    <ul>
        <li><a href="user_homepage.php">Trang chủ</a></li>
        <li><a href="logout.php">Đăng xuất</a></li>
    </ul>

    <hr>

    <h3>Thông tin tài khoản:</h3>
    <p>Tên đăng nhập: <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
    <p>Vai trò: <?php echo htmlspecialchars($_SESSION['role_name']); ?></p>
    <p>ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>

    <hr>

    <p><em>Đây là khu vực dành cho nhân viên. Bạn có thể xem thông tin cá nhân và thực hiện các chức năng được phân quyền.</em></p>

</body>

</html>