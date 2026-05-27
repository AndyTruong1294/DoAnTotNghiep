<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ đơn vị</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/Css/home.css">
    <style>
        h5 {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="info-box">
        <label>Mã đơn vị của bạn là:</label>
        <label id="lblMaDV" class="highlight-text">
            <?php 
                // Kiểm tra nếu session tồn tại thì echo ra
                echo isset($_SESSION['maDonVi']) ? $_SESSION['maDonVi'] : 'Chưa có mã'; 
            ?>
        </label>
    </div>
</body>
</html>

