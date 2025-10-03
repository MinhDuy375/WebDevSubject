<?php
require '../employee.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$dep = [];
$name = '';
connect_db();
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM departments WHERE department_id = :id");
    $stmt->execute([':id' => $id]);
    $dep = $stmt->fetch();
    if ($dep) $name = $dep['department_name'];
}
if (!empty($_POST['edit_department'])) {
    $name = trim($_POST['department_name'] ?? '');
    if ($name !== '') {
        $stmt = $conn->prepare("UPDATE departments SET department_name=:name WHERE department_id=:id");
        $stmt->execute([':name' => $name, ':id' => $id]);
        header("Location: department_list.php");
        exit;
    }
}
disconnect_db();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sửa phòng ban</title>
</head>

<body>
    <h1>Sửa phòng ban</h1>
    <a href="department_list.php">Trở về</a><br><br>
    <form method="post">
        Tên phòng ban: <input type="text" name="department_name" value="<?php echo $name; ?>">
        <input type="submit" name="edit_department" value="Lưu">
    </form>
</body>

</html>