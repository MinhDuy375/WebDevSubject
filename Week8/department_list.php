<?php
require 'employee.php';
$departments = get_department();
disconnect_db();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Danh sách phòng ban</title></head>
<body>
<h1>Danh sách phòng ban</h1>
<a href="employee_list.php">Về trang nhân viên</a> |
<a href="department_add.php">Thêm phòng ban</a>
<br><br>
<table width="100%" border="1" >
    <tr><td><b>ID</b></td><td>Tên phòng ban</td><td>Chọn thao tác</td></tr>
    <?php foreach ($departments as $dep){ ?>
    <tr>
        <td><?php echo $dep['department_id']; ?></td>
        <td><?php echo $dep['department_name']; ?></td>
        <td>
            <form method="post" action="department_delete.php">
                <input onclick="window.location='department_edit.php?id=<?php echo $dep['department_id']; ?>'" type="button" value="Sửa"/>
                <input type="hidden" name="id" value="<?php echo $dep['department_id']; ?>"/>
                <input onclick="return confirm('Xóa phòng ban này?');" type="submit" name="delete" value="Xóa"/>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
