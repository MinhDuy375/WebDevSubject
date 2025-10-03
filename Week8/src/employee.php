<?php
global $conn;

/**
 * Kết nối CSDL bằng PDO, gán vào biến toàn cục $conn
 */
function connect_db()
{
    global $conn;
    if ($conn instanceof PDO) return;

    $db_host = 'localhost';
    $db_name = 'employee_db';
    $db_user = 'root';
    $db_pass = 'duy3725'; // đổi lại mật khẩu nếu khác
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

    try {
        $conn = new PDO($dsn, $db_user, $db_pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $e) {
        die("Lỗi kết nối: " . $e->getMessage());
    }
}

/**
 * Ngắt kết nối
 */
function disconnect_db()
{
    global $conn;
    $conn = null;
}

/**
 * Lấy toàn bộ nhân viên
 */
function get_all_employees()
{
    global $conn;
    connect_db();
    $sql = "SELECT e.employee_id, e.first_name, e.last_name,
                   r.role_name, d.department_name
            FROM employees e
            LEFT JOIN roles r ON r.role_id = e.role_id
            LEFT JOIN departments d ON d.department_id = e.department_id
            ORDER BY e.employee_id ASC";   // ASC: nhỏ → lớn
    $stmt = $conn->query($sql);
    return $stmt->fetchAll();
}

/**
 * Lấy nhân viên theo id
 */
function get_employees($employee_id)
{
    global $conn;
    connect_db(); // ĐÃ SỬA: xóa dấu + thừa
    $sql = "SELECT e.employee_id, e.first_name, e.last_name,
                   e.role_id, e.department_id,
                   r.role_name, d.department_name
            FROM employees e
            LEFT JOIN roles r ON r.role_id = e.role_id
            LEFT JOIN departments d ON d.department_id = e.department_id
            WHERE e.employee_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $employee_id]);
    return $stmt->fetchAll();
}

/**
 * Thêm nhân viên
 */
function add_employee($firstname, $lastname, $department_name, $role_name)
{
    global $conn;
    connect_db();

    $dep = get_departmentid($department_name);
    $role = get_roleid($role_name);
    if (!$dep || !$role) return false;

    $sql = "INSERT INTO employees(first_name, last_name, department_id, role_id)
            VALUES (:firstname, :lastname, :department_id, :role_id)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        ':firstname'      => $firstname,
        ':lastname'       => $lastname,
        ':department_id'  => $dep['department_id'],
        ':role_id'        => $role['role_id'],
    ]);
}

/**
 * Sửa nhân viên
 */
function edit_employee($id, $firstname, $lastname, $department_name, $role_name)
{
    global $conn;
    connect_db();

    $dep = get_departmentid($department_name);
    $role = get_roleid($role_name);
    if (!$dep || !$role) return false;

    $sql = "UPDATE employees
               SET first_name   = :firstname,
                   last_name    = :lastname,
                   department_id = :department_id,
                   role_id      = :role_id
             WHERE employee_id  = :id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        ':firstname'      => $firstname,
        ':lastname'       => $lastname,
        ':department_id'  => $dep['department_id'],
        ':role_id'        => $role['role_id'],
        ':id'             => $id,
    ]);
}

/**
 * Xóa nhân viên
 */
function delete_employee($id)
{
    global $conn;
    connect_db();
    $stmt = $conn->prepare("DELETE FROM employees WHERE employee_id = :id");
    return $stmt->execute([':id' => $id]);
}

/**
 * Lấy danh sách chức vụ
 */
function get_role()
{
    global $conn;
    connect_db();
    $stmt = $conn->query("SELECT role_id, role_name FROM roles ORDER BY role_id ASC");
    return $stmt->fetchAll();
}

/**
 * Lấy danh sách phòng ban
 */
function get_department()
{
    global $conn;
    connect_db();
    $stmt = $conn->query("SELECT department_id, department_name FROM departments ORDER BY department_id ASC");
    return $stmt->fetchAll();
}

/**
 * Lấy role_id theo tên role
 */
function get_roleid($role_name)
{
    global $conn;
    connect_db();
    $stmt = $conn->prepare("SELECT role_id FROM roles WHERE role_name = :name LIMIT 1");
    $stmt->execute([':name' => $role_name]);
    return $stmt->fetch();
}

/**
 * Lấy department_id theo tên department
 */
function get_departmentid($department_name)
{
    global $conn;
    connect_db();
    $stmt = $conn->prepare("SELECT department_id FROM departments WHERE department_name = :name LIMIT 1");
    $stmt->execute([':name' => $department_name]);
    return $stmt->fetch();
}

/**
 * Lấy tất cả người dùng
 */
function get_all_users()
{
    global $conn;
    connect_db();
    $sql = "SELECT u.*, ur.role_name 
            FROM users u
            LEFT JOIN user_roles ur ON u.role_id = ur.id
            ORDER BY u.id ASC";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll();
}

/**
 * Lấy ID vai trò người dùng theo tên
 */
function get_user_role_id($user_role_name)
{
    global $conn;
    connect_db();
    $stmt = $conn->prepare("SELECT id FROM user_roles WHERE role_name = :name LIMIT 1");
    $stmt->execute([':name' => $user_role_name]);
    return $stmt->fetch();
}

/**
 * Lấy danh sách vai trò người dùng
 */
function get_user_role()
{
    global $conn;
    connect_db();
    $stmt = $conn->query("SELECT id, role_name FROM user_roles ORDER BY id ASC");
    return $stmt->fetchAll();
}

/**
 * Thêm người dùng mới
 * LƯU Ý: $password phải đã được mã hóa trước khi truyền vào
 */
function add_user($username, $password, $user_role_name)
{
    global $conn;
    connect_db();
    $role_id = get_user_role_id($user_role_name);

    if (!$role_id) return false;

    $sql = "INSERT INTO users(user_name, password, role_id)
            VALUES (:username, :password, :user_role_id)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        ':username'      => $username,
        ':password'      => $password,
        ':user_role_id'  => $role_id['id'],
    ]);
}
