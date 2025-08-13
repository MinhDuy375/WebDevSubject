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
        
        .result-input {
            background-color: #f0f8ff;
            border: 2px solid #4169E1;
            font-weight: bold;
            color: #000080;
        }
        
    </style>
</head>
<body>
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
    <div style="
            text-align: center;
            margin-bottom: 50px;">
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
     
      href="Home.php">Về trang chủ</a>
    </div>
    
    <?php
    $so1 = '';
    $so2 = '';
    $pheptinh = 'cong';
    $ketqua = '';
    $da_tinh = false;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $so1 = $_POST['so1'];
        $so2 = $_POST['so2'];
        $pheptinh = $_POST['pheptinh'];
        $da_tinh = true;
        
        switch ($pheptinh) {
            case 'cong':
                $ketqua = $so1 + $so2;
                break;
            case 'tru':
                $ketqua = $so1 - $so2;
                break;
            case 'nhan':
                $ketqua = $so1 * $so2;
                break;
            case 'chia':
                $ketqua = ($so2 != 0) ? $so1 / $so2 : "Không thể chia cho 0";
                break;
        }
    }
    ?>
    
    <form method="post">
        <table>
            <tr>
                <th>Chọn phép tính:</th>
                <td>
                    <?php if ($da_tinh): ?>
                        <!-- Hiển thị phép tính đã chọn -->
                        <span class="selected-operation">
                            <?php
                            switch ($pheptinh) {
                                case 'cong': echo "Cộng"; break;
                                case 'tru': echo "Trừ"; break;
                                case 'nhan': echo "Nhân"; break;
                                case 'chia': echo "Chia"; break;
                            }
                            ?>
                        </span>
                        <!-- Giữ giá trị đã chọn trong hidden input -->
                        <input type="hidden" name="pheptinh" value="<?php echo $pheptinh; ?>">
                    <?php else: ?>
                        <!-- Hiển thị radio buttons khi chưa tính -->
                        <input type="radio" name="pheptinh" value="cong" 
                            <?php echo ($pheptinh == 'cong') ? 'checked' : ''; ?>> Cộng
                        <input type="radio" name="pheptinh" value="tru"
                            <?php echo ($pheptinh == 'tru') ? 'checked' : ''; ?>> Trừ
                        <input type="radio" name="pheptinh" value="nhan"
                            <?php echo ($pheptinh == 'nhan') ? 'checked' : ''; ?>> Nhân
                        <input type="radio" name="pheptinh" value="chia"
                            <?php echo ($pheptinh == 'chia') ? 'checked' : ''; ?>> Chia
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Số thứ nhất:</th>
                <td><input type="number" name="so1" value="<?php echo $so1; ?>" required></td>
            </tr>
            <tr>
                <th>Số thứ hai:</th>
                <td><input type="number" name="so2" value="<?php echo $so2; ?>" required></td>
            </tr>
            <?php if ($da_tinh): ?>
            <tr>
                <th>Kết quả:</th>
                <td><input type="text" value="<?php echo $ketqua; ?>" class="result-input" readonly></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <?php if ($da_tinh): ?>
                        <input type="submit" value="Tính lại" class="btn">
                        <input type="button" value="Làm mới" class="btn" onclick="window.location.href=window.location.pathname">
                    <?php else: ?>
                        <input type="submit" value="Tính" class="btn">
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>