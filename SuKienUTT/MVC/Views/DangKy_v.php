<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL ?>Public/Pictures/utt_edu_vn_logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>Public/Css/register.css">
</head>
<body style="background-image: url('<?php echo BASE_URL ?>Public/Pictures/uttpic.jpg');">
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Form fields will go here -->
            <div class="container">
                <h2 style="text-align: center;">Đăng ký tài khoản</h2>
                <i>Bạn là:</i>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="card"">
                            <img src="<?php echo BASE_URL ?>Public/Pictures/sinhvien_icon.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Sinh viên</h5>
                                <a href="<?php echo BASE_URL ?>DangKy/sinhvien_dangky" class="btn btn-primary">Đến trang đăng ký</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card"">
                            <img src="<?php echo BASE_URL ?>Public/Pictures/donvi_icon.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Đơn vị tổ chức sự kiện</h5>
                                <a href="<?php echo BASE_URL ?>DangKy/donvi_dangky" class="btn btn-primary">Đến trang đăng ký</a>
                            </div>
                        </div>
                    </div>
                </div>   
                <br>
                Đã có tài khoản? <a href="<?php echo BASE_URL ?>DangNhap">Đăng nhập ngay</a>             
            </div>
        </form>
    </div>
</body>
</html>