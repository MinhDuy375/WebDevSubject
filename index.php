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
        'description' => '',
        'link' => 'Week2/Week2.php',
        'status' => 'coming_soon'
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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background particles */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.15)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="80" r="2.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="1.8" fill="rgba(255,255,255,0.12)"/></svg>');
            animation: floatingParticles 20s linear infinite;
            pointer-events: none;
        }

        @keyframes floatingParticles {
            0% { transform: translateY(0px) translateX(0px); }
            50% { transform: translateY(-20px) translateX(10px); }
            100% { transform: translateY(0px) translateX(0px); }
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .header-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            animation: slideInDown 1s ease-out;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        h1 {
            color: #ffffff;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #fff, #f0f8ff);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: titleGlow 3s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            0% { filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.5)); }
            100% { filter: drop-shadow(0 0 15px rgba(255, 255, 255, 0.8)); }
        }

        .semester-info {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .progress-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .progress-bar {
            flex: 1;
            min-width: 180px;
            height: 8px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 5px;
            transition: width 2s ease-out;
            animation: progressAnimation 2s ease-out;
        }

        @keyframes progressAnimation {
            from { width: 0%; }
        }

        .stats {
            display: flex;
            gap: 20px;
            color: #fff;
            font-weight: 600;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            color: #4facfe;
        }

        .weeks-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }

        .week-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 20px;
            text-decoration: none;
            color: #ffffff;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            opacity: 0;
            transform: translateY(30px);
            animation: cardSlideIn 0.6s ease-out forwards;
        }

        .week-card:nth-child(2) { animation-delay: 0.2s; }
        .week-card:nth-child(3) { animation-delay: 0.4s; }
        .week-card:nth-child(4) { animation-delay: 0.6s; }

        @keyframes cardSlideIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .week-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .week-card:hover::before {
            left: 100%;
        }

        .week-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .week-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .week-number {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .status-active {
            background: rgba(76, 175, 80, 0.8);
            color: white;
        }

        .status-coming-soon {
            background: rgba(255, 193, 7, 0.8);
            color: #333;
        }

        .week-title {
            font-size: 1.3rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .week-description {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 0;
            line-height: 1.4;
        }



        .week-card.coming-soon {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .week-card.coming-soon:hover {
            transform: none;
            box-shadow: none;
        }

        .footer-info {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .generated-time {
            font-style: italic;
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .weeks-grid {
                grid-template-columns: 1fr;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .progress-section {
                flex-direction: column;
                align-items: stretch;
            }
            
            .stats {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
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

        <!-- Weeks Grid -->
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

        <!-- Footer Info -->
        <div class="footer-info">
            <div>💡 Các tuần học mới sẽ được cập nhật liên tục trong suốt học kỳ</div>
            <div class="generated-time">
                Trang được tạo lúc: <?php echo date('d/m/Y H:i:s'); ?>
            </div>
        </div>
    </div>

    <script>
        // Interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.week-card:not(.coming-soon)');
            
            // Hover effects
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

            // Update progress bar animation
            setTimeout(() => {
                const progressFill = document.querySelector('.progress-fill');
                progressFill.style.width = '<?php echo $progress_percentage; ?>%';
            }, 500);
        });
    </script>
</body>
</html>