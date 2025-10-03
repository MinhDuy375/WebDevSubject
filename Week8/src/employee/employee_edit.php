<?php
require '../employee.php';


// Lấy list role & department
$role = get_role();
$department = get_department();

// Lấy id nhân viên
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$data = ['firstname' => '', 'lastname' => '', 'role' => '', 'department' => ''];
$errors = [];

// Lấy thông tin nhân viên hiện tại
if ($id) {
    $rows = get_employees($id);
    if ($rows) {
        $row = $rows[0];
        $data['firstname']  = $row['first_name'];
        $data['lastname']   = $row['last_name'];
        $data['role']       = $row['role_name'];
        $data['department'] = $row['department_name'];
    } else {
        die("Không tìm thấy nhân viên");
    }
}

// Nếu submit form
if (!empty($_POST['edit_employee'])) {
    $data['firstname']  = $_POST['firstname'] ?? '';
    $data['lastname']   = $_POST['lastname'] ?? '';
    $data['role']       = $_POST['role'] ?? '';
    $data['department'] = $_POST['department'] ?? '';

    if ($data['firstname'] === '') $errors['firstname'] = 'Chưa nhập họ đệm nhân viên';
    if ($data['lastname'] === '')  $errors['lastname']  = 'Chưa nhập tên nhân viên';

    if (!$errors) {
        edit_employee($id, $data['firstname'], $data['lastname'], $data['department'], $data['role']);
        header("Location: employee_list.php");
        exit;
    }
}
disconnect_db();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sửa nhân viên</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Sửa nhân viên</h1>
    <a href="employee_list.php">Trở về</a><br /><br />
    <form method="post" action="employee_edit.php?id=<?php echo $id; ?>">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>First name</td>
                <td>
                    <input type="text" name="firstname" value="<?php echo $data['firstname']; ?>" />
                    <?php if (!empty($errors['firstname'])) echo $errors['firstname']; ?>
                </td>
            </tr>
            <tr>
                <td>Last name</td>
                <td>
                    <input type="text" name="lastname" value="<?php echo $data['lastname']; ?>" />
                    <?php if (!empty($errors['lastname'])) echo $errors['lastname']; ?>
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="role">
                        <?php foreach ($role as $item) { ?>
                            <option value="<?php echo $item['role_name']; ?>"
                                <?php if ($data['role'] === $item['role_name']) echo 'selected'; ?>>
                                <?php echo $item['role_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="department">
                        <?php foreach ($department as $item) { ?>
                            <option value="<?php echo $item['department_name']; ?>"
                                <?php if ($data['department'] === $item['department_name']) echo 'selected'; ?>>
                                <?php echo $item['department_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="edit_employee" value="Lưu" /></td>
            </tr>
        </table>
    </form>
</body>

</html>