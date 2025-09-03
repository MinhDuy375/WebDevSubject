<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }

        .btn-home {
            display: inline-block;
            margin: 20px 0;
            padding: 12px 25px;
            border: 1px solid #555;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-home:hover {
            background: #333;
            color: #fff;
        }

        p {
            font-size: 18px;
            font-weight: bold;
            color: #444;
        }

        .info {
            text-align: left;
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.6;
        }

        .info span {
            font-weight: bold;
            color: #222;
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="btn-home" href="./OnGrade.php">Về trang chủ</a>

        <p>Form sử dụng POST</p>
        <div class="info">
            <span>Tên sách:</span> <?php echo $_POST["bookname"];?><br>
            <span>Tác giả:</span> <?php echo $_POST["author"];?><br>
            <span>Nhà xuất bản:</span> <?php echo $_POST["publicinghouse"];?><br>
            <span>Năm phát hành:</span> <?php echo $_POST["releaseyear"];?><br>
        </div>
    </div>
</body>
</html>
