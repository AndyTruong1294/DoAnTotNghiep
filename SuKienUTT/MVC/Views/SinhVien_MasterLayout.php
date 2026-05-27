<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Sự kiện UTT</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>Public/Css/ML.css">
    <link rel="icon" type="image/x-icon" href="http://localhost/UTT/Public/Pictures/utt_edu_vn_logo.jpg">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <div class="layout">
        <div class="header">
            <div style="width: fit-content;">
                <img src="<?php echo BASE_URL ?>Public/Pictures/uttbanner.png" alt="University of Transport and Communications banner logo" style="height: 60pt;">
            </div>
            <div style="padding-top: 10pt; padding-left: 20pt;">
                <h1>Sự kiện UTT</h1>
            </div>
            <div style="margin-left: auto; padding: 10px 20px;">
                Chào mừng, <?php echo isset($_SESSION['maSinhVien']) ? $_SESSION['maSinhVien'] : 'Chưa có mã'; ?> | <a href="<?php echo BASE_URL ?>DangNhap" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Đăng xuất</a>
            </div>
        </div>

        <div class="menu">
            <hr>
            <a href="<?php echo BASE_URL ?>SinhVien">
                <button type="button" class="btn" style="color: orange;">
                    <h5>Trang chủ</h5>
                </button>
            </a>
            <hr>
            <a href="<?php echo BASE_URL ?>SinhVien/taikhoan">
                <button type="button" class="btn" style="color: orange;">
                    <h5>Tài khoản</h5>
                </button>
            </a>
            <hr>
            <a href="<?php echo BASE_URL ?>SinhVien/hoatdong">
                <button type="button" class="btn" style="color: orange;">
                    <h5>Hoạt động</h5>
                </button>
            </a>
            <hr>
        </div>

        <div class="main">
            <div class="content">
                <?php 
                if(isset($data))
                    include_once './MVC/Views/Pages/'.$data['page'].'.php';
                ?>
            </div>
        </div>

        <div class="footer">
            
        </div>
    </div>
</body>
</html>