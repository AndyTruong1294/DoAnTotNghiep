<?php
$masukien='';$btc='';$ndd='';$chucVu='';$sdt='';$email='';$tenSuKien='';$ngayToChuc='';$gioBatDau='';$diaDiem='';$noiDung='';
if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
    while($row=mysqli_fetch_assoc($data['dulieu'])){
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

$mabophan='';$tencv='';$mota='';$ghichu='';$macongviec='';
if(isset($data['chitietcongviec']) && mysqli_num_rows($data['chitietcongviec']) > 0){
    while($rowcv=mysqli_fetch_assoc($data['chitietcongviec'])){
        $macongviec=$rowcv['maCongViec'];
        $mabophan=$rowcv['maBoPhan'];
        $tencv=$rowcv['tenCongViec'];
        $mota=$rowcv['moTa'];
        $thoiHan=$rowcv['thoiHan'];
        $ngayHoanThanh=$rowcv['ngayHoanThanh'];
        $ghichu=$rowcv['ghiChu'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật công việc</title>
</head>
<body>
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
    <div class="row row-cols-1">
        <div class="col">
            <div class="d-grid gap-2">
                <a href="<?php echo BASE_URL ?>QuanLySuKien/chitiet/<?php echo $masukien ?>" class="btn btn-link">
                    Quay lại sự kiện
                </a>
            </div>
        </div>    
    </div>
    <hr>

    <form action="<?php echo BASE_URL; ?>/QuanLySuKien/suacongviec/<?php echo $masukien; ?>/<?php echo $macongviec; ?>" method="post">
        <h3>Cập nhật công việc</h3>
        <div class="row">
            <div class="col-4">Bộ phận</div>
            <div class="col-8">
                <select class="form-select" name="txtMaBoPhan" required>
                    <?php
                        if(isset($data['dulieubophan']) && mysqli_num_rows($data['dulieubophan'])>0){
                            mysqli_data_seek($data['dulieubophan'], 0);
                            while($row=mysqli_fetch_assoc($data['dulieubophan'])){
                    ?>
                                <option value="<?php echo $row['maBoPhan']; ?>" <?php echo ($mabophan == $row['maBoPhan']) ? 'selected' : ''; ?>><?php echo $row['tenBoPhan']; ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <hr>
            </div>

            <div class="col-4"><label class="form-label">Tên công việc</label></div>
            <div class="col-8"><input type="text" class="form-control"  placeholder="Nhập tên công việc" name="txtTencv" value="<?php echo $tencv; ?>" required maxlength="50"><hr></div>
            
            <div class="col-4"><label class="form-label">Mô tả công việc</label></div>
            <div class="col-8"><textarea name="txtMota" class="form-control" placeholder="Hãy nhập mô tả cho công việc" ><?php echo $mota; ?></textarea><hr></div>
            
            <div class="col-4"><label class="form-label" name="txtTrangThai">Thời hạn</label></div>
            <div class="col-8">
                <input type="date" class="form-control" name="txtThoiHan" value="<?php echo $thoiHan; ?>">
                <hr>
            </div>

            <div class="col-4"><label class="form-label" name="txtTrangThai">Ngày xong</label></div>
            <div class="col-8">
                <input type="date" class="form-control" name="txtNgayHoanThanh" value="<?php echo $ngayHoanThanh; ?>">
                <hr>
            </div>
            
            <div class="col-4"><label class="form-label">Ghi chú</label></div>
            <div class="col-8"><textarea name="txtGhiChu" class="form-control" placeholder="Hãy nhập ghi chú cho công việc" ><?php echo $ghichu; ?></textarea></div>
        </div>
        <hr>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="btnSuaCongViec">
                Cập nhật công việc
            </button>
            <a href="<?php echo BASE_URL; ?>/QuanLySuKien/xoacongviec/<?php echo $masukien; ?>/<?php echo $macongviec; ?>" class="btn btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa công việc này không?');">
                Xóa
            </a>
        </div>
    </form>
</body>
</html>