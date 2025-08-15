<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phép tính</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <div class="header-section">
            <h2>LẬP TRÌNH WEB - TRANG BÀI TẬP</h2>
            <h3>Tuần 1</h3>
        </div>
        
        <a href="../index.php" class="back-link">Về trang chủ</a>
        
        <div class="tasks-grid">
            <a href="Task1.php" class="task-card">
                <div class="task-header">
                    <div class="task-number">01</div>
                    <div class="status-badge status-active">Hoàn thành</div>
                </div>
                <div class="task-title">Bài 1</div>
                <div class="task-description">Bài tập cơ bản về HTML và PHP</div>
            </a>
            <a href="Task2.php" class="task-card">
                <div class="task-header">
                    <div class="task-number">02</div>
                    <div class="status-badge status-active">Hoàn thành</div>
                </div>
                <div class="task-title">Bài 2</div>
                <div class="task-description">Phân trang danh sách sách</div>
            </a>
            <a href="Task3/Home.php" class="task-card">
                <div class="task-header">
                    <div class="task-number">03</div>
                    <div class="status-badge status-active">Hoàn thành</div>
                </div>
                <div class="task-title">Bài 3</div>
                <div class="task-description">Các phép tính cơ bản</div>
            </a>
            <a href="Task4/Task4.php" class="task-card">
                <div class="task-header">
                    <div class="task-number">04</div>
                    <div class="status-badge status-active">Hoàn thành</div>
                </div>
                <div class="task-title">Bài 4</div>
                <div class="task-description">Bài tập nâng cao</div>
            </a>
        </div>
        
        <div class="footer-info">
            <div>💡 Các bài tập tuần 1 của khóa học Lập trình Web</div>
            <div class="generated-time">
                Trang được tạo lúc: <?php echo date('d/m/Y H:i:s'); ?>
            </div>
        </div>
    </div>
</body>
</html>