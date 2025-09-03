<style>
    th {
        width:150px; 
        border:1px solid black;
    }
</style>
<?php
echo "<table style='border:1px solid black;'>";
echo "<tr><th >Id</th><th>Firstname</th><th>Lastname</th><th>Reg_date</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px; border:1px solid black;'>" . parent::current() . "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>\n";
    }
}

$servername = "localhost";
$username = "root";   // thay bằng user MySQL thật (thường là root)
$password = "duy3725";   // thay bằng mật khẩu thật
$dbname = "b5_mydb";    // đổi thành tên DB bạn đã tạo

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT id, firstname, lastname, reg_date FROM MyGuests");
    $stmt->execute();

    // set kết quả trả về dạng mảng kết hợp (associative array)
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
