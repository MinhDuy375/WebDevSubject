<?php
// Biến kết nối toàn cục
global $pdo;

// Hàm kết nối database
function connect_db() {
    // Gọi tới biến toàn cục $pdo
    global $pdo;
    
    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$pdo) {
        try {
            $dsn = "mysql:host=localhost;dbname=qlsinhvien;charset=utf8";
            $username = "root";
            $password = "duy3725";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $pdo = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Can't not connect to database: " . $e->getMessage());
        }
    }
}

// Hàm ngắt kết nối
function disconnect_db() {
    // Gọi tới biến toàn cục $pdo
    global $pdo;
    
    // Nếu đã kết nối thì thực hiện ngắt kết nối
    if ($pdo) {
        $pdo = null;
    }
}

// Hàm lấy tất cả sinh viên
function get_all_students() {
    // Gọi tới biến toàn cục $pdo
    global $pdo;
    
    // Hàm kết nối
    connect_db();
    
    try {
        // Câu truy vấn lấy tất cả sinh viên
        $sql = "SELECT * FROM sinhvien";
        
        // Thực hiện câu truy vấn
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        // Lấy tất cả kết quả
        $result = $stmt->fetchAll();
        
        // Trả kết quả về
        return $result;
    } catch (PDOException $e) {
        return array();
    }
}

// Hàm lấy sinh viên theo ID
function get_student($student_id) {
    // Gọi tới biến toàn cục $pdo
    global $pdo;
    
    // Hàm kết nối
    connect_db();
    
    try {
        // Câu truy vấn lấy sinh viên theo ID
        $sql = "SELECT * FROM sinhvien WHERE id = :id";
        
        // Thực hiện câu truy vấn với prepared statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Lấy kết quả
        $result = $stmt->fetch();
        
        // Nếu không có kết quả thì trả về mảng rỗng
        if (!$result) {
            $result = array();
        }
        
        // Trả kết quả về
        return $result;
    } catch (PDOException $e) {
        return array();
    }
}

// Hàm thêm sinh viên
function add_student($student_name, $student_sex, $student_birthday) {
    // Gọi tới biến toàn cục $pdo
    global $pdo;
    
    // Hàm kết nối
    connect_db();
    
    try {
        // Câu truy vấn thêm với prepared statement
        $sql = "INSERT INTO sinhvien(hoten, gioitinh, ngaysinh) VALUES (:name, :sex, :birthday)";
        
        // Thực hiện câu truy vấn
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $student_name, PDO::PARAM_STR);
        $stmt->bindParam(':sex', $student_sex, PDO::PARAM_STR);
        $stmt->bindParam(':birthday', $student_birthday, PDO::PARAM_STR);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}

// Hàm sửa sinh viên
function edit_student($student_id, $student_name, $student_sex, $student_birthday) {
    // Gọi tới biến toàn cục $pdo
    global $pdo;
    
    // Hàm kết nối
    connect_db();
    
    try {
        // Câu truy vấn sửa với prepared statement
        $sql = "UPDATE sinhvien SET 
                hoten = :name,
                gioitinh = :sex,
                ngaysinh = :birthday
                WHERE id = :id";
        
        // Thực hiện câu truy vấn
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $student_name, PDO::PARAM_STR);
        $stmt->bindParam(':sex', $student_sex, PDO::PARAM_STR);
        $stmt->bindParam(':birthday', $student_birthday, PDO::PARAM_STR);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}

// Hàm xóa sinh viên
function delete_student($student_id) {
    // Gọi tới biến toàn cục $pdo
    global $pdo;
    
    // Hàm kết nối
    connect_db();
    
    try {
        // Câu truy vấn xóa với prepared statement
        $sql = "DELETE FROM sinhvien WHERE id = :id";
        
        // Thực hiện câu truy vấn
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}