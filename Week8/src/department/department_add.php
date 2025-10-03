<?php
require '../employee.php';

$name = '';
if (!empty($_POST['add_department'])) {
    $name = trim($_POST['department_name'] ?? '');
    if ($name !== '') {
        global $conn;
        connect_db();
        $stmt = $conn->prepare("INSERT INTO departments(department_name) VALUES (:name)");
        $stmt->execute([':name' => $name]);
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
    <title>Thêm phòng ban</title>
</head>

<body>
    <h1>Thêm phòng ban</h1>
    <a href="department_list.php">Trở về</a><br><br>
    <form method="post">
        Tên phòng ban: <input type="text" name="department_name" value="<?php echo $name; ?>">
        <input type="submit" name="add_department" value="Lưu">
    </form>
</body>

</html>