<?php
$btc='';$ndd='';$chucVu='';$sdt='';$email='';$tenSuKien='';$ngayToChuc='';$gioBatDau='';$diaDiem='';$noiDung='';$trangThai='';
if(isset($data['thongtinsukien'])&&mysqli_num_rows($data['thongtinsukien'])>0){
    while($row=mysqli_fetch_assoc($data['thongtinsukien'])){
        $masukien=$row['maSuKien'];
        $btc=$row['tenDonViToChuc'];
        $sdt=$row['soDienThoai'];
        $email=$row['email'];
        $tenSuKien=$row['tenSuKien'];
        $orgDate = $row['ngay']; $ngayToChuc = date("d/m/Y", strtotime($orgDate));
        $orgTime = $row['gio']; $gioBatDau = date("H:i", strtotime($orgTime));
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
    <title>Thông tin sự kiện</title>
</head>
<body>
    <form action="<?php echo BASE_URL ?>SinhVien/dangky/<?php echo $masukien; ?>" method="POST">
    <h3>Thông tin sự kiện</h3>
    <div class="row">
        <div class="col-2">Ban tổ chức:</div>
        <div class="col-10"> <b><?php echo $btc; ?></b></div>

        <div class="col-2">Số điện thoại:</div>
        <div class="col-4"><?php echo $sdt ?></div>

        <div class="col-2">Email:</div>
        <div class="col-4"><?php echo $email ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">Tên sự kiện:</div>
        <div class="col-10"> <b><?php echo $tenSuKien; ?></b></div>

        <div class="col-2">Ngày:</div>
        <div class="col-4"><?php echo $ngayToChuc; ?></div>

        <div class="col-2">Thời gian bắt đầu:</div>
        <div class="col-4"><?php echo $gioBatDau; ?></div>

        <div class="col-2">Địa điểm:</div>
        <div class="col-10"><?php echo $diaDiem; ?></div>

        <div class="col-2">Giới thiệu:</div>
        <div class="col-10"><?php echo $noiDung; ?></div>

    </div>
    <br>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary" name="btnDangKy" data-start="<?php echo $orgDate.' '.$orgTime?>" id="btn-checkin">
            Quan tâm và Đăng ký tham gia
        </button>
    </div>
    </form>
</body>
</html>

<script>
    document.getElementById('btn-checkin').addEventListener('click', function(e) {
        // 1. Lấy thời gian từ thuộc tính data-start
        let startTime = new Date(this.getAttribute('data-start')).getTime();

        // 2. Lấy thời gian hiện tại
        let now = new Date().getTime();

        // 3. Kiểm tra điều kiện
        if (now > startTime) {
            // Chặn hành động submit của form
            e.preventDefault(); 
            alert("Sự kiện đã kết thúc. Cảm ơn bạn đã quan tâm!");
        } 
        // Nếu còn trong thời gian (now <= startTime), trình duyệt sẽ 
        // tự động thực hiện hành động submit của nút bấm mà không cần code thêm.
    });
</script>