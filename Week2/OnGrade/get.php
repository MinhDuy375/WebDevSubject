<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
</head>
<body>
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
            :hover {
            background-color: lightgray;
            color: white;
        }
        "
     
      href="./OnGrade.php">Về trang chủ</a>
    </div>
<p>Form sử dụng get </p>
Tên sách: <?php echo $_GET["bookname"];?> <br>
Tác giả: <?php echo $_GET["author"];?> <br>
Nhà xuất bản: <?php echo $_GET["publicinghouse"];?> <br>
Năm phát hành: <?php echo $_GET["releaseyear"];?> <br>
</body>
</html>
