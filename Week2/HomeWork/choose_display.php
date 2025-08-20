<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Chọn hiển thị biên lai</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      padding: 40px;
      text-align: center;
    }
    .box {
      background: #fff;
      display: inline-block;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,.1);
    }
    h2 {
      margin-bottom: 20px;
    }
    form {
      margin: 15px 0;
    }
    button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background: #007bff;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>Bạn muốn xem biên lai từ:</h2>
    <form action="display.php" method="get">
      <input type="hidden" name="source" value="session">
      <button type="submit">Session</button>
    </form>
    <form action="display.php" method="get">
      <input type="hidden" name="source" value="cookie">
      <button type="submit">Cookie</button>
    </form>
  </div>
</body>
</html>
