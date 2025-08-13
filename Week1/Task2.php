<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task 2 - Week 1</title>
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
     
      href="./Week1.php">Về trang chủ</a>
    </div>
<div style>
<?php


$limit = 10; 
$total_records = 100; 
$total_pages = ceil($total_records / $limit);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;

$start = ($page - 1) * $limit;
$end = $start + $limit;

echo "<table border='1' width='500' cellpadding='8' cellspacing='0'>";
echo "<tr><th>STT</th><th>Tên sách</th><th>Nội dung sách</th></tr>";

for ($i = $start + 1; $i <= $end && $i <= $total_records; $i++) {
    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>Tensach$i</td>";
    echo "<td>Noidung$i</td>";
    echo "</tr>";
}
echo "</table><br>";

echo "<div style='margin-top:10px;'>";

if ($page > 1) {
    $prev = $page - 1;
    echo "<a href='?page=$prev' style='margin-right:5px;'>&laquo Trước</a>";
} else {
    echo "<span style='color:gray; margin-right:5px;'>&laquo Trước</span>";
}

for ($p = 1; $p <= $total_pages; $p++) {
    if ($p == $page) {
        echo "<strong>$p</strong> ";
    } else {
        echo "<a href='?page=$p'>$p</a> ";
    }
}

if ($page < $total_pages) {
    $next = $page + 1;
    echo "<a href='?page=$next' style='margin-left:5px;'>Sau &raquo;</a>";
} else {
    echo "<span style='color:gray; margin-left:5px;'>Sau &raquo;</span>";
}

echo "</div>";
?>

</div>

</body>
</html>
