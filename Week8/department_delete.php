<?php
require 'employee.php';
$id = 0;
if (isset($_POST['id'])) $id = (int)$_POST['id'];
elseif (isset($_GET['id'])) $id = (int)$_GET['id'];

if ($id) {
    connect_db();
    $stmt = $conn->prepare("DELETE FROM departments WHERE department_id = :id");
    $stmt->execute([':id' => $id]);
}
header("Location: department_list.php");
exit;
?>
