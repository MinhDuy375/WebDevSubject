<?php
require '../employee.php';

$employee = get_all_employees();
disconnect_db();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Danh sách nhân viên</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Danh sách nhân viên</h1>
    <a href="../user/admin_homepage.php">Về trang quản trị</a> |
    <a href="../department/department_list.php">View Department</a> |
    <a href="../role/role_list.php">View Role</a> |
    <a href="../employee/employee_add.php">Thêm nhân viên</a>
    <br /><br />

    <table width="100%" border="1">
        <tr>
            <td><b>First name</b></td>
            <td>Last name</td>
            <td>Role</td>
            <td>Department</td>
            <td>Chọn thao tác</td>
        </tr>
        <?php foreach ($employee as $item) { ?>
            <tr>
                <td><?php echo $item['first_name']; ?></td>
                <td><?php echo $item['last_name']; ?></td>
                <td><?php echo $item['role_name']; ?></td>
                <td><?php echo $item['department_name']; ?></td>
                <td>
                    <form method="post" action="../employee/employee_delete.php">
                        <input onclick="window.location='../employee/employee_edit.php?id=<?php echo $item['employee_id']; ?>'" type="button" value="Sửa" />
                        <input type="hidden" name="id" value="<?php echo $item['employee_id']; ?>" />
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa" />
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>