<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Receipt</title>

</head>
<body>
<?php    
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name  = htmlspecialchars($_POST['last_name']);
    $email      = htmlspecialchars($_POST['email']);
    $invoice_id = htmlspecialchars($_POST['invoice_id']);
    $payfor     = isset($_POST['payfor']) ? $_POST['payfor'] : [];
    $info       = htmlspecialchars($_POST['additional_info']);

    // Xử lý upload file
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_tmp  = $_FILES['receipt']['tmp_name'];
    $file_name = basename($_FILES['receipt']['name']);
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($file_tmp, $file_path)) {
        $upload_success = true;
    } else {
        $upload_success = false;
    }

    // Giao diện biên lai
     $_SESSION['name'] = $first_name . " ". $last_name;
     $_SESSION['email'] = $email;
     $_SESSION['invoiceId'] = $invoice_id;
    $_SESSION['payFor'] = $payfor;
    $_SESSION['infor'] = $info;
    $_SESSION['uploadSuccess'] = $upload_success;
    $_SESSION['filePath'] = $file_path;

    setcookie("name", $first_name. " ". $last_name, time() + 86400, "/");
    setcookie("email", $email, time() + 86400, "/");
    setcookie("invoiceId", $invoice_id, time() + 86400, "/");
    setcookie("payFor", implode(", ", $payfor), time() + 86400, "/");
    setcookie("infor", $info, time() + 86400, "/");
    setcookie("uploadSuccess", $upload_success, time() + 86400, "/");
    setcookie("filePath", $file_path, time() + 86400, "/");

    header("Location: choose_display.php");
    exit();
}
?>
</body>
</html>
