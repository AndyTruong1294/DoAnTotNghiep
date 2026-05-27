<?php
$btc='';$ndd='';$chucVu='';$sdt='';$email='';$tenSuKien='';$ngayToChuc='';$gioBatDau='';$diaDiem='';$noiDung='';
if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
    while($row=mysqli_fetch_assoc($data['dulieu'])){
        $mask=$row['maSuKien'];
        $btc=$row['tenDonViToChuc'];
        $sdt=$row['soDienThoai'];
        $email=$row['email'];
        $tenSuKien=$row['tenSuKien'];
        $ngay = $row['ngay']; 
        $gio = $row['gio'];
        $diaDiem=$row['diaDiem'];
        $noiDung=$row['noiDung'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sự kiện</title>
</head>
<body>
    <form action="<?php echo BASE_URL ?>QuanLySuKien/sua" method="post" enctype="multipart/form-data">
        <h2 style="text-align: center;">Chỉnh sửa sự kiện</h2>
        <hr>
        <input type="hidden" name="txtMaSuKien" class="form-control" value="<?php echo $mask; ?>" readonly >
        <h3>Thông tin Ban tổ chức</h3>
        <div class="mb-3">
            <label class="form-label">Ban tổ chức</label>
            <input type="text" name="txtBTC" class="form-control" value="<?php echo $btc; ?>" readonly >
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="tel" name="txtSDT" class="form-control" pattern="[0-9]{10,11}" placeholder="Nhập số điện thoại liên hệ" required value="<?php echo $sdt; ?>" maxlength="20">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="txtEmail" class="form-control" placeholder="Nhập địa chỉ email liên hệ" required value="<?php echo $email; ?>" maxlength="50">
                </div>
            </div>
        </div>

        <hr>
        <h3>Thông tin sự kiện</h3>
        <div class="mb-3">
            <label class="form-label">Tên sự kiện</label>
            <input type="text" name="txtTenSK" class="form-control" placeholder="Nhập tên sự kiện" required value="<?php echo $tenSuKien; ?>" maxlength="100">
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Ngày tổ chức</label>
                    <input type="date" name="txtNgay" class="form-control" placeholder="Nhập ngày tổ chức sự kiện" required value="<?php echo $ngay; ?>" >
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Thời gian bắt đầu</label>
                    <input type="time" name="txtGio" class="form-control" placeholder="Nhập thời gian bắt đầu sự kiện" required value="<?php echo $gio; ?>" >
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Địa điểm tổ chức</label>
            <input type="text" name="txtDiaDiem" class="form-control" placeholder="Nhập địa điểm tổ chức sự kiện" required value="<?php echo $diaDiem; ?>" maxlength="200">
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung chương trình</label>
            <textarea class="form-control" name="txtNoiDung" rows="3" placeholder="Tóm tắt nội dung chương trình sự kiện" required><?php echo $noiDung; ?></textarea>
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-primary"  type="submit" name="btnSua">Chỉnh sửa và Cập nhật</button>
        </div>
        <div class="row row-cols-1">
        <div class="col">
            <div class="d-grid gap-2">
                <a href="<?php echo BASE_URL ?>QuanLySuKien/chitiet/<?php echo $mask ?>" class="btn btn-link">
                    Quay lại sự kiện
                </a>
            </div>
        </div>    
    </div>
    </form>
</body>
</html>