<?php
$masv='';$hoten='';$ngaysinh='';$gioitinh='';$sdt='';$email='';$tendangnhap='';$matkhau='';
if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
    while($row=mysqli_fetch_assoc($data['dulieu'])){
        $masv=$row['maSinhVien'];
        $hoten=$row['hoTen'];
        $ngaysinh=$row['ngaySinh'];
        $gioitinh=$row['gioiTinh'];
        $sdt=$row['soDienThoai'];
        $email=$row['email'];
        $tendangnhap=$row['tenDangNhap'];
        $matkhau=$row['matKhau'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản sinh viên</title>
</head>
<body>
    <h3>Tài khoản sinh viên</h3>
    <div class="row">
        <div class="col-2">
            Mã sinh viên:
        </div>
        <div class="col-10">
            <input type="text" name="txtMaSV" class="form-control" value="<?php echo $masv; ?>" required readonly form="formCapNhat">
            <hr>
        </div>

        <div class="col-2">
            Họ và tên:
        </div>
        <div class="col-10">
            <input type="text" name="txtHoTen" class="form-control" value="<?php echo $hoten; ?>" required form="formCapNhat" maxlength="50">
            <hr>
        </div>

        <div class="col-2">
            Ngày sinh:
        </div>
        <div class="col-10">
            <input type="date" name="txtNgaySinh" class="form-control" value="<?php echo $ngaysinh; ?>" required form="formCapNhat">
            <hr>
        </div>

        <div class="col-2">
            Giới tính:
        </div>
        <div class="col-10">
            <select class="form-select" name="txtGioitinh" required form="formCapNhat">
                <option value="">-- Vui lòng chọn --</option>
                <option value="Nam" <?php echo ($gioitinh == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="Nữ" <?php echo ($gioitinh == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                <option value="Khác" <?php echo ($gioitinh == 'Khác') ? 'selected' : ''; ?>>Khác</option>
            </select>
            <hr>
        </div>

        <div class="col-2">
            Số điện thoại:
        </div>
        <div class="col-10">
            <input type="tel" name="txtSoDienThoai" class="form-control" value="<?php echo $sdt; ?>" required pattern="[0-9]{10,11}" form="formCapNhat" maxlength="20">
            <hr>
        </div>

        <div class="col-2">
            Email:
        </div>
        <div class="col-10">
            <input type="email" name="txtEmail" class="form-control" value="<?php echo $email; ?>" required form="formCapNhat" maxlength="50">
            <hr>
        </div>

        <div class="col-2">
            Tên đăng nhập:
        </div>
        <div class="col-10">
            <input type="text" name="txtTenDangNhap" class="form-control" value="<?php echo $tendangnhap; ?>" required form="formCapNhat" maxlength="50">
            <hr>
        </div>

        <div class="col-2">
            Mật khẩu:
        </div>
        <div class="col-10">
            <input type="password" name="txtMatKhau" class="form-control" value="<?php echo $matkhau; ?>" required form="formCapNhat" maxlength="50">
            <br>
        </div>
        <hr>
    </div>
    <div class="col">
        <form action="<?php echo BASE_URL;?>SinhVien/capnhat" method="post" id="formCapNhat" name="formCapNhat">
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="btnCapNhat">Cập nhật thông tin</button>
            </div> 
        </form>
        
    </div>
</body>
</html>