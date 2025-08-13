<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phép tính</title>
    <style>
        body {
            font-family: Arial;
        }
        h2 {
            color: blue;
            text-align: center;
        }
        table {
            margin: auto;
            border: 1px solid blue;
            padding: 10px;
        }
        th {
            text-align: right;
            padding-right: 10px;
            color: brown;
        }
        .title {
            text-align: center;
            font-weight: bold;
        }
        .btn {
            padding: 5px 10px;
        }
                div {
             text-align: center;
             margin-Bottom: 50px
        }
        a{
            margin: 15px;
            padding: 10px 20px; 
            border: 1px solid gray;
             
            text-decoration: none; 
            border-radius: 5px;
        }
        a:hover{
            background-Color: lightgray;
            color: white;
        }
    </style>
</head>
<body>
    <h2>KIỂM TRA TÍNH CHẴN LẺ CỦA MỘT SỐ</h2>
<div>
   <a href="Home.php" >
    Về trang chủ
</a>
    </div>
    <form method="post">
        <table>
            
            <tr>
                <th>Nhập số :</th>
                <td><input type="number" name="so1" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="Kiểm tra" class="btn">
                </td>
            </tr>
        </table>
    </form>

    <?php
    require 'utils.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $so1 = $_POST['so1'];

        if(laSoChan($so1)){
            echo "<h3 style='text-align:center;'>Là số chẵn</h3>";
        }
        else {
            echo "<h3 style='text-align:center;'>Là số lẻ</h3>";
        }
    }
    ?>
</body>
</html>
