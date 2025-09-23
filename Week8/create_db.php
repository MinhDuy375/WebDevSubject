<?php
$result = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_db'])) {
    $servername = "localhost";
    $username   = "root";
    $password   = "duy3725"; // đổi lại nếu khác

    try {
        // Kết nối MySQL
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Tạo database
        $sql = "CREATE DATABASE IF NOT EXISTS employee_db 
                CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        $conn->exec($sql);

        // Chọn database
        $conn->exec("USE employee_db");

        // Tạo bảng departments
        $sql = "CREATE TABLE IF NOT EXISTS departments (
                    department_id INT AUTO_INCREMENT PRIMARY KEY,
                    department_name VARCHAR(100) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        $conn->exec($sql);

        // Tạo bảng roles
        $sql = "CREATE TABLE IF NOT EXISTS roles (
                    role_id INT AUTO_INCREMENT PRIMARY KEY,
                    role_name VARCHAR(100) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        $conn->exec($sql);

        // Tạo bảng employees
        $sql = "CREATE TABLE IF NOT EXISTS employees (
                    employee_id INT AUTO_INCREMENT PRIMARY KEY,
                    first_name VARCHAR(100) NOT NULL,
                    last_name VARCHAR(100) NOT NULL,
                    department_id INT,
                    role_id INT,
                    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE SET NULL,
                    FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE SET NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        $conn->exec($sql);

        // Thêm dữ liệu mẫu vào departments
        $sql = "INSERT INTO departments (department_name) VALUES
                    ('IT'),
                    ('HR'),
                    ('Marketing')
                ON DUPLICATE KEY UPDATE department_name=VALUES(department_name)";
        $conn->exec($sql);

        // Thêm dữ liệu mẫu vào roles
        $sql = "INSERT INTO roles (role_name) VALUES
                    ('Manager'),
                    ('Staff'),
                    ('Intern')
                ON DUPLICATE KEY UPDATE role_name=VALUES(role_name)";
        $conn->exec($sql);

        $result = "✅ Tạo database và dữ liệu mẫu thành công!";
    } catch (PDOException $e) {
        $result = "❌ Lỗi: " . $e->getMessage();
    }

    $conn = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tạo Database</title>
</head>
<body>
    <h1>Tạo Database</h1>
    <form method="post">
        <input type="submit" name="create_db" value="Ấn để tạo">
    </form>
    <br>
    <?php if ($result !== "") echo "<b>Kết quả:</b> $result"; ?>
</body>
</html>
