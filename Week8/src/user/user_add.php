<?php
require '../employee.php';

$role = get_user_role();

$data = ['username' => '', 'password' => '', 'role' => ''];
$errors = [];

if (!empty($_POST['add_user'])) {
    $data['username']  = $_POST['username'] ?? '';
    $data['password']   = $_POST['password'] ?? '';
    $data['role']       = $_POST['role'] ?? '';

    if ($data['username'] === '') $errors['username'] = 'Chưa nhập tài khoản';
    if ($data['password'] === '')  $errors['password']  = 'Chưa nhập mật khẩu';

    if (!$errors) {
        add_user($data['username'], $data['password'], $data['role']);
        header("Location: user_list.php");
        exit;
    }
}
disconnect_db();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>

<body>
    <h1>Thêm người dùng</h1>
    <a href="user_list.php">Trở về</a>
    <form action="user_add.php" method="post">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>User name</td>
                <td>
                    <input type="text" name="username" value="<?php echo $data['username']; ?>" />
                    <?php if (!empty($errors['username'])) echo $errors['username']; ?>
                </td>
            </tr>
            <tr>
                <td>Last name</td>
                <td>
                    <input type="text" name="password" value="<?php echo $data['password']; ?>" />
                    <?php if (!empty($errors['password'])) echo $errors['password']; ?>
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="role">
                        <?php foreach ($role as $item) { ?>
                            <option value="<?php echo $item['role_name']; ?>"><?php echo $item['role_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="add_user" value="Lưu" /></td>
            </tr>
        </table>
    </form>

</body>

</html>