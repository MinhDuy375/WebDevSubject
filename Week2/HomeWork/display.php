<?php
session_start();
$source = isset($_GET['source']) ? $_GET['source'] : 'session';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Payment Receipt</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f8f9fa; padding: 30px; }
    .receipt { max-width: 600px; margin: auto; background: #fff; padding: 25px; border-radius: 8px;
               box-shadow: 0 0 10px rgba(0,0,0,.1); border: 1px solid #ddd; }
    .receipt h2 { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
    .row { display: flex; justify-content: space-between; margin-bottom: 10px; }
    .label { font-weight: bold; color: #555; }
    .value { text-align: right; color: #000; }
    .receipt img { display: block; margin: 15px auto; border: 1px solid #ccc; border-radius: 5px; max-width: 100%; }
    .footer { margin-top: 20px; text-align: center; font-size: 14px; color: #777;
              border-top: 1px dashed #aaa; padding-top: 10px; }
  </style>
</head>
<body>
<?php
if ($source === "session" && isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $invoiceId = $_SESSION['invoiceId'];
    $payFor = $_SESSION['payFor'];
    $info = $_SESSION['infor'];
    $uploadSuccess = $_SESSION['uploadSuccess'];
    $filePath = $_SESSION['filePath'];
} elseif ($source === "cookie" && isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
    $email = $_COOKIE['email'];
    $invoiceId = $_COOKIE['invoiceId'];
    $payFor = isset($_COOKIE['payFor']) ? explode(", ", $_COOKIE['payFor']) : [];
    $info = $_COOKIE['infor'] ?? "";
    $uploadSuccess = $_COOKIE['uploadSuccess'];
    $filePath = $_COOKIE['filePath'];
} else {
    echo "⚠ Không có dữ liệu để hiển thị.";
    exit;
}

echo "<div class='receipt'>";
echo "<h2>Payment Receipt ($source)</h2>";

echo "<div class='row'><div class='label'>Name:</div><div class='value'>$name</div></div>";
echo "<div class='row'><div class='label'>Email:</div><div class='value'>$email</div></div>";
echo "<div class='row'><div class='label'>Invoice ID:</div><div class='value'>$invoiceId</div></div>";
echo "<div class='row'><div class='label'>Pay For:</div><div class='value'>" . implode(", ", $payFor) . "</div></div>";
echo "<div class='row'><div class='label'>Additional Info:</div><div class='value'>$info</div></div>";

if ($uploadSuccess) {
    echo "<div class='row'><div class='label'>Uploaded Receipt:</div></div>";
    echo "<img src='$filePath' alt='Receipt Image'>";
} else {
    echo "<div class='row'><div class='label'>Uploaded Receipt:</div><div class='value'>Upload Failed!</div></div>";
}

echo "<div class='footer'>Thank you for your submission!</div>";
echo "</div>";
?>
<div style="
            text-align: center;
            margin-bottom: 50px;
            margin-top: 40px;">
        <a style="
            margin: 15px;
            padding: 10px 20px;
            border: 1px solid gray;
            text-decoration: none;
            border-radius: 5px;
            color: #333;
            :hover {
            background-color: lightgray;
            color: white;
        }
        "
     
      href="./HomeWork.php">Về trang nhập biên lai</a>
    </div>
</body>
</html>
