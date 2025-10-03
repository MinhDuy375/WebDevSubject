<?php
require 'auth.php';
check_admin();
require '../employee.php';

$users = get_all_users();
disconnect_db();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
</head>

<body>
    <h1>Danh sách người dùng</h1>
    <p>Xin chào <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></p>

    <a href="admin_homepage.php">← Về trang chủ</a> |
    <a href="user_add.php">+ Thêm người dùng</a> |
    <a href="logout.php">Đăng xuất</a>

    <br><br>

    <table width="70%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Vai trò</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['user_name']); ?></td>
                <td><?php echo htmlspecialchars($user['role_name']); ?></td>
                <td>
                    <a href="user_edit.php?id=<?php echo $user['id']; ?>">Sửa</a> |
                    <a href="user_delete.php?id=<?php echo $user['id']; ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa người dùng này?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>