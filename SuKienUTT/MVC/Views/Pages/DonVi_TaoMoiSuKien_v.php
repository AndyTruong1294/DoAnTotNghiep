<?php
$btc='';
if(isset($data['thongtinbtc'])&&mysqli_num_rows($data['thongtinbtc'])>0){
    while($row=mysqli_fetch_assoc($data['thongtinbtc'])){
        $btc=$row['tenDonViToChuc'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo mới sự kiện</title>
</head>
<body>
    <form action="<?php echo BASE_URL ?>QuanLySuKien/them" method="post" enctype="multipart/form-data">
        <h2 style="text-align: center;">Tạo mới sự kiện</h2>
        <hr>

        <h3>Thông tin Ban tổ chức</h3>
        <input type="hidden" name="txtMaDV" class="form-control" value="<?php echo $_SESSION['maDonVi']; ?>" readonly >
        <div class="mb-3">
            <label class="form-label">Ban tổ chức</label>
            <input type="text" name="txtBTC" class="form-control" value="<?php echo $btc; ?>" readonly >
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="tel" name="txtSDT" class="form-control" pattern="[0-9]{10,11}" placeholder="Nhập số điện thoại liên hệ" required maxlength="20">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="txtEmail" class="form-control" placeholder="Nhập địa chỉ email liên hệ" required maxlength="50">
                </div>
            </div>
        </div>

        <hr>
        <h3>Thông tin sự kiện</h3>
        <div class="mb-3">
            <label class="form-label">Tên sự kiện</label>
            <input type="text" name="txtTenSK" class="form-control" placeholder="Nhập tên sự kiện" required maxlength="100">
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Ngày tổ chức</label>
                    <input type="date" name="txtNgay" class="form-control" placeholder="Nhập ngày tổ chức sự kiện" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Thời gian bắt đầu</label>
                    <input type="time" name="txtGio" class="form-control" placeholder="Nhập thời gian bắt đầu sự kiện" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Địa điểm tổ chức</label>
            <input type="text" name="txtDiaDiem" class="form-control" placeholder="Nhập địa điểm tổ chức sự kiện" required maxlength="200">
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung chương trình</label>
            <textarea class="form-control" name="txtNoiDung" rows="3" placeholder="Tóm tắt nội dung chương trình sự kiện" required></textarea>
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-primary"  type="submit" name="btnDangKy">Tạo sự kiện mới</button>
        </div>
    </form>
</body>
</html>