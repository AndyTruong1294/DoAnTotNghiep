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
        <form action="<?php echo BASE_URL ?>DangKy/donvi_taotaikhoan" method="post" enctype="multipart/form-data">
            <!-- Form fields will go here -->
            <div class="container">
                <div id="formSponsor" class="register-form">
                    <h3>Đăng ký cho Đơn vị tổ chức</h3>
                    
                    <h5>Thông tin đăng nhập</h5>
                    <i>*Thông tin này sẽ được sử dụng cho mục đích đăng nhập</i>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tên đăng nhập</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtTendangnhapDV" required maxlength="50">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Mật khẩu</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="txtMatkhauDV" required maxlength="50">
                        </div>
                    </div>

                    <h5>Thông tin đơn vị</h5>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tên đơn vị</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtTendonvi" required maxlength="50">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Giới thiệu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtMota" required>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="btnDangkyDV">Đăng ký</button>
                        </div> 
                    </div>
                </div>
                </div>
        </form>
    </div>
</body>
</html>