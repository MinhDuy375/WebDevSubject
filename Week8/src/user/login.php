<?php
session_start();
require '../employee.php';


if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role_name'] === 'admin') {
        header("Location: admin_homepage.php");
    } else {
        header("Location: user_homepage.php");
    }
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu';
    } else {

        global $conn;
        connect_db();

        $sql = "SELECT u.id, u.user_name, u.password, u.role_id, ur.role_name 
                FROM users u
                LEFT JOIN user_roles ur ON u.role_id = ur.id
                WHERE u.user_name = :username
                LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if ($user) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['role_name'] = $user['role_name'];


            if ($user['role_name'] === 'admin') {
                header("Location: admin_homepage.php");
            } else {
                header("Location: user_homepage.php");
            }
            exit;
        } else {
            $error = 'Tên đăng nhập hoặc mật khẩu không đúng';
        }

        disconnect_db();
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <h1>Đăng nhập hệ thống</h1>

    <?php if ($error): ?>
        <p style="color: red;"><strong><?php echo htmlspecialchars($error); ?></strong></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Tên đăng nhập:</td>
                <td>
                    <input type="text" name="username" required autofocus
                        value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
                </td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Đăng nhập">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>