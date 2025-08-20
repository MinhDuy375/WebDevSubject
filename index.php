<?php
// Cấu hình các tuần học
$weeks = [
    [
        'number' => '01',
        'title' => 'Tuần 1',
        'description' => 'Khởi đầu với các bài tập PHP cơ bản',
        'link' => 'Week1/Week1.php',
        'status' => 'active'
    ],
    [
        'number' => '02',
        'title' => 'Tuần 2', 
        'description' => 'Truyền dữ liệu với Get/Post - Lưu trữ trong Session và Cookie',
        'link' => 'Week2/Week2.php',
        'status' => 'active'
    ],
    [
        'number' => '03',
        'title' => 'Tuần 3', 
        'description' => '',
        'link' => '',
        'status' => 'in-coming'
    ],
    
];

// Thông tin trang
$page_title = "Lập Trình Web - PHP Course";
$current_semester = "Học kỳ " . (date('n') >= 8 ? "1" : "2") . " - Năm " . date('Y');
$total_weeks = 13;
$active_weeks = count(array_filter($weeks, function($week) { 
    return $week['status'] === 'active'; 
}));

// Function tính toán progress
function getProgress($weeks) {
    $total = 13;
    $completed = count(array_filter($weeks, function($week) { 
        return $week['status'] === 'active'; 
    }));
    return round(($completed / $total) * 100);
}

$progress_percentage = getProgress($weeks);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
   
        <div class="header-section">
            <h1>⚡ LẬP TRÌNH WEB</h1>
            <div class="semester-info">
                <?php echo $current_semester; ?> • Trang Bài Tập & Thực Hành
            </div>
            
            <div class="progress-section">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: <?php echo $progress_percentage; ?>%"></div>
                </div>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $active_weeks; ?></div>
                        <div>Hoàn thành</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $total_weeks; ?></div>
                        <div>Tổng tuần</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $progress_percentage; ?>%</div>
                        <div>Tiến độ</div>
                    </div>
                </div>
            </div>
        </div>

 
        <div class="weeks-grid">
            <?php foreach ($weeks as $index => $week): ?>
                <?php if ($week['status'] === 'active'): ?>
                    <a href="<?php echo $week['link']; ?>" class="week-card">
                <?php else: ?>
                    <div class="week-card coming-soon">
                <?php endif; ?>
                
                    <div class="week-header">
                        <div class="week-number"><?php echo $week['number']; ?></div>
                        <div class="status-badge status-<?php echo str_replace('_', '-', $week['status']); ?>">
                            <?php echo $week['status'] === 'active' ? 'Hoàn thành' : 'Sắp có'; ?>

                        </div>
                    </div>
                    
                    <div class="week-title"><?php echo $week['title']; ?></div>
                    <div class="week-description"><?php echo $week['description']; ?></div>
                
                <?php if ($week['status'] === 'active'): ?>
                    </a>
                <?php else: ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

       
        <div class="footer-info">
            <div>💡 Các tuần học mới sẽ được cập nhật liên tục trong suốt học kỳ</div>
            <div class="generated-time">
                Trang được tạo lúc: <?php echo date('d/m/Y H:i:s'); ?>
            </div>
        </div>
    </div>

    <script>
        // hiệu ứng khi hover
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.week-card:not(.coming-soon)');
            
           
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    createSparkle(this);
                });
            });

            function createSparkle(element) {
                for (let i = 0; i < 3; i++) {
                    setTimeout(() => {
                        const sparkle = document.createElement('div');
                        sparkle.style.position = 'absolute';
                        sparkle.style.width = '4px';
                        sparkle.style.height = '4px';
                        sparkle.style.background = '#fff';
                        sparkle.style.borderRadius = '50%';
                        sparkle.style.pointerEvents = 'none';
                        sparkle.style.zIndex = '1000';
                        
                        const rect = element.getBoundingClientRect();
                        sparkle.style.left = (Math.random() * rect.width) + 'px';
                        sparkle.style.top = (Math.random() * rect.height) + 'px';
                        
                        element.style.position = 'relative';
                        element.appendChild(sparkle);
                        
                        sparkle.animate([
                            { opacity: 0, transform: 'scale(0)' },
                            { opacity: 1, transform: 'scale(1)' },
                            { opacity: 0, transform: 'scale(0)' }
                        ], {
                            duration: 800,
                            easing: 'ease-out'
                        }).onfinish = () => sparkle.remove();
                    }, i * 100);
                }
            }

            
            setTimeout(() => {
                const progressFill = document.querySelector('.progress-fill');
                progressFill.style.width = '<?php echo $progress_percentage; ?>%';
            }, 500);
        });
    </script>
</body>
</html>