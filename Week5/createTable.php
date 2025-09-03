<?php 
$servername = "localhost";
$username = "root";   // thay bằng user MySQL thật (thường là root)
$password = "duy3725";   // thay bằng mật khẩu thật
$dbname = "b5_mydb";

try {
    // Kết nối database bằng PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Câu lệnh SQL tạo bảng
    $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    // Thực thi SQL
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
} 
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
