<?php
require 'employee.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$role = [];
$name = '';
connect_db();
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM roles WHERE role_id = :id");
    $stmt->execute([':id' => $id]);
    $role = $stmt->fetch();
    if ($role) $name = $role['role_name'];
}
if (!empty($_POST['edit_role'])) {
    $name = trim($_POST['role_name'] ?? '');
    if ($name !== '') {
        $stmt = $conn->prepare("UPDATE roles SET role_name=:name WHERE role_id=:id");
        $stmt->execute([':name' => $name, ':id' => $id]);
        header("Location: role_list.php"); exit;
    }
}
disconnect_db();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Sửa chức vụ</title></head>
<body>
<h1>Sửa chức vụ</h1>
<a href="role_list.php">Trở về</a><br><br>
<form method="post">
    Tên chức vụ: <input type="text" name="role_name" value="<?php echo $name; ?>">
    <input type="submit" name="edit_role" value="Lưu">
</form>
</body>
</html>
