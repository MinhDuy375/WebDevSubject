<?php
require 'auth.php';
check_admin();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
</head>

<body>
    <h1>Trang quản trị hệ thống</h1>
    <p>Xin chào <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong> (Quản trị viên)</p>

    <hr>

    <h3>Menu quản trị:</h3>
    <ul>
        <li><a href="admin_homepage.php">Trang chủ</a></li>
        <li><a href="../employee/employee_list.php">Quản lý nhân viên</a></li>
        <li><a href="user_list.php">Quản lý người dùng</a></li>
        <li><a href="logout.php">Đăng xuất</a></li>
    </ul>

    <hr>

    <h3>Thông tin tài khoản:</h3>
    <p>Tên đăng nhập: <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
    <p>Vai trò: <?php echo htmlspecialchars($_SESSION['role_name']); ?></p>
    <p>ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>

</body>

</html>