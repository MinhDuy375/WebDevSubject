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
    $sql = "
    INSERT INTO MyGuests (firstname, lastname, email)
    VALUES 
    ('John','Doe','john@example.com'),
    ('Jane','Smith','janes@example.com'),
    ('James','Jahnson','jamesn@example.com'),
    ('Emily','Brown','Emily@example.com'),
    ('Michael','Davis','michael@example.com')
    ";

    // Thực thi SQL
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
} 
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
