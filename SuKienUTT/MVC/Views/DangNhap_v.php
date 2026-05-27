<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL ?>Public/Pictures/utt_edu_vn_logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>Public/Css/register.css">
</head>
<body style="background-image: url('<?php echo BASE_URL ?>Public/Pictures/uttpic.jpg');">
    <div>
        <form action="<?php echo BASE_URL ?>DangNhap/xuly" method="post" enctype="multipart/form-data">
            <!-- Form fields will go here -->
            <div class="container">
                <div id="formSponsor" class="register-form">
                    <h3 style="text-align: center;">Đăng nhập</h3>

                    <hr>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label"><b><i>Bạn là:</i></b></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radVaitro" id="inlineRadio1" value="Sinh viên" checked>
                        <label class="form-check-label" for="inlineRadio1"><b>Sinh viên</b></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radVaitro" id="inlineRadio2" value="Đơn vị">
                        <label class="form-check-label" for="inlineRadio2"><b>Đơn vị tổ chức sự kiện</b></label>
                    </div>
                    <hr>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tên đăng nhập</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtTendangnhap" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Mật khẩu</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="txtMatkhau" required>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="btnDangnhap">Đăng nhập</button>
                        <button class="btn btn-link" type="button">
                            <a href="<?php echo BASE_URL ?>DangKy">Đăng ký</a>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>