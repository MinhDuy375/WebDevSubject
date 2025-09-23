<?php
require 'employee.php';

// Lấy danh sách roles & departments
$role = get_role();
$department = get_department();

$data = ['firstname'=>'','lastname'=>'','role'=>'','department'=>''];
$errors = [];

if (!empty($_POST['add_employee'])) {
    $data['firstname']  = $_POST['firstname'] ?? '';
    $data['lastname']   = $_POST['lastname'] ?? '';
    $data['role']       = $_POST['role'] ?? '';
    $data['department'] = $_POST['department'] ?? '';

    if ($data['firstname'] === '') $errors['firstname'] = 'Chưa nhập họ đệm nhân viên';
    if ($data['lastname'] === '')  $errors['lastname']  = 'Chưa nhập tên nhân viên';

    if (!$errors) {
        add_employee($data['firstname'], $data['lastname'], $data['department'], $data['role']);
        header("Location: employee_list.php");
        exit;
    }
}
disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm nhân viên</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Thêm nhân viên</h1>
<a href="employee_list.php">Trở về</a><br/><br/>
<form method="post" action="employee_add.php">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>First name</td>
            <td>
                <input type="text" name="firstname" value="<?php echo $data['firstname']; ?>"/>
                <?php if (!empty($errors['firstname'])) echo $errors['firstname']; ?>
            </td>
        </tr>
        <tr>
            <td>Last name</td>
            <td>
                <input type="text" name="lastname" value="<?php echo $data['lastname']; ?>"/>
                <?php if (!empty($errors['lastname'])) echo $errors['lastname']; ?>
            </td>
        </tr>
        <tr>
            <td>Role</td>
            <td>
                <select name="role">
                    <?php foreach ($role as $item){ ?>
                        <option value="<?php echo $item['role_name']; ?>"><?php echo $item['role_name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Department</td>
            <td>
                <select name="department">
                    <?php foreach ($department as $item){ ?>
                        <option value="<?php echo $item['department_name']; ?>"><?php echo $item['department_name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="add_employee" value="Lưu"/></td>
        </tr>
    </table>
</form>
</body>
</html>
