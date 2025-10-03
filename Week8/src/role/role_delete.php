<?php
require '../employee.php';


$id = 0;
if (isset($_POST['id'])) $id = (int)$_POST['id'];
elseif (isset($_GET['id'])) $id = (int)$_GET['id'];

if ($id) {
    delete_employee($id);
}
header("Location: employee_list.php");
exit;
