<?php
require 'employee.php';
$name = '';
if (!empty($_POST['add_role'])) {
    $name = trim($_POST['role_name'] ?? '');
    if ($name !== '') {
        global $conn;
        connect_db();
        $stmt = $conn->prepare("INSERT INTO roles(role_name) VALUES (:name)");
        $stmt->execute([':name' => $name]);
        header("Location: role_list.php"); exit;
    }
}
disconnect_db();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Thêm chức vụ</title></head>
<body>
<h1>Thêm chức vụ</h1>
<a href="role_list.php">Trở về</a><br><br>
<form method="post">
    Tên chức vụ: <input type="text" name="role_name" value="<?php echo $name; ?>">
    <input type="submit" name="add_role" value="Lưu">
</form>
</body>
</html>
