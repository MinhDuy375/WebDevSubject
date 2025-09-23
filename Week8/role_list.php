<?php
require 'employee.php';
$roles = get_role();
disconnect_db();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Danh sách chức vụ</title></head>
<body>
<h1>Danh sách chức vụ</h1>
<a href="employee_list.php">Về trang nhân viên</a> |
<a href="role_add.php">Thêm chức vụ</a>
<br><br>
<table width="100%" border="1" >
    <tr><td><b>ID</b></td><td>Tên chức vụ</td><td>Chọn thao tác</td></tr>
    <?php foreach ($roles as $role){ ?>
    <tr>
        <td><?php echo $role['role_id']; ?></td>
        <td><?php echo $role['role_name']; ?></td>
        <td>
            <form method="post" action="role_delete.php">
                <input onclick="window.location='role_edit.php?id=<?php echo $role['role_id']; ?>'" type="button" value="Sửa"/>
                <input type="hidden" name="id" value="<?php echo $role['role_id']; ?>"/>
                <input onclick="return confirm('Xóa chức vụ này?');" type="submit" name="delete" value="Xóa"/>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
