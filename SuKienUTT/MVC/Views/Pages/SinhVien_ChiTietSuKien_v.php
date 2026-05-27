<?php
$btc='';$ndd='';$chucVu='';$sdt='';$email='';$tenSuKien='';$ngayToChuc='';$gioBatDau='';$diaDiem='';$noiDung='';$trangThai='';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tenSuKien ?></title>
    <style>
        .sql-content {
            white-space: pre-line; /* Giữ lại dấu xuống dòng, tự động co dãn theo khung */
        }
        .disabled {
            color: #999;               /* Đổi chữ thành màu xám */
            background-color: #ddd;    /* Đổi nền thành màu xám (nếu là nút) */
            pointer-events: none;      /* CHẶN HOÀN TOÀN SỰ KIỆN CLICK */
            cursor: not-allowed;       /* Đổi con trỏ chuột thành hình biển cấm (chỉ hoạt động khi không dùng pointer-events) */
        }
    </style>
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
    <br>

    <hr>
    <h3>Danh sách công việc</h3>
    <br>
    <table class="table table-hover table-striped-columns">
        <thead>
            <tr>
                <th>Công việc</th>
                <th>Mô tả</th>
                <th>Thời hạn</th>
                <th>Ngày xong</th>
                <th>Ghi chú</th>
                <th>Đăng ký</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($data['dulieubophan']) && mysqli_num_rows($data['dulieubophan'])>0){
                mysqli_data_seek($data['dulieubophan'], 0);
                while($row=mysqli_fetch_assoc($data['dulieubophan'])){
                    $maBoPhan=$row['maBoPhan'];
                    $tenBoPhan=$row['tenBoPhan'];
                    echo "<tr class='table-dark' style='text-align: center;'><td colspan='6'><b>$tenBoPhan</b></td></tr>";

                    if(isset($data['dulieucongviec']) && mysqli_num_rows($data['dulieucongviec'])>0){
                        // Đưa con trỏ về vị trí dòng đầu tiên (index 0)
                        mysqli_data_seek($data['dulieucongviec'], 0);
                        while($rowcv=mysqli_fetch_assoc($data['dulieucongviec'])){
                            if($rowcv['maBoPhan']==$maBoPhan){
                                $maCongViec=$rowcv['maCongViec'];
                                $tenCongViec=$rowcv['tenCongViec'];
                                $moTa=$rowcv['moTa'];
                                $thoiHan=$rowcv['thoiHan']; $thoiHanChuan = !empty($thoiHan) ?  date("d/m/Y", strtotime($thoiHan)) : '';
                                $ngayHoanThanh=$rowcv['ngayHoanThanh']; $ngayHoanThanhChuan = !empty($ngayHoanThanh) ? date("d/m/Y", strtotime($ngayHoanThanh)) : '';
                                $trangThai='';
                                if(empty($ngayHoanThanh)){
                                    $trangThai = "Chưa hoàn thành";
                                }
                                $ghiChu=$rowcv['ghiChu']; ?>
                                <tr>
                                    <td><?php echo $tenCongViec; ?></td>
                                    <td class="sql-content"><?php echo $moTa; ?></td>
                                    <td><?php echo $thoiHanChuan; ?></td>
                                    <td>
                                        <span class="badge text-bg-<?php
                                        if($ngayHoanThanh <= $thoiHan){
                                            echo "success";
                                        }
                                        else if($ngayHoanThanh > $thoiHan){
                                            echo "danger";
                                        }?>"
                                            <?php echo "'>$ngayHoanThanhChuan</span>" ?>
                                    </td>       
                                    <td class="sql-content"><?php echo $ghiChu; ?></td>
                                    <?php if($trangThai == "Chưa hoàn thành"){?>
                                        <td>
                                            <a href="<?php echo BASE_URL; ?>SinhVien/dangkycongviec/<?php echo $masukien . '/' . $maCongViec; ?>" class="btn btn-sm btn-outline-dark <?php if($trangThai != "Chưa hoàn thành") echo "disabled"; ?>">Đăng ký</a>
                                        </td>
                                    <?php } ?>
                                    
                                </tr><?php
                            }
                        }
                    }
                }
            }
            ?>
        </tbody>
    </table>    
    <hr>
    <h3>Công việc của bạn</h3>
    

<?php
// Chuyển kết quả truy vấn thành một mảng để dễ tính toán
$rows = [];
if(isset($data['dulieuphancong']) && mysqli_num_rows($data['dulieuphancong']) > 0) {
while ($row = mysqli_fetch_assoc($data['dulieuphancong'])) {
    $rows[] = $row;
}
}

// 1. Tính toán số dòng cần gộp (rowspan) cho Bộ phận và Công việc
$bophan_count = array_count_values(array_column($rows, 'maBoPhan'));
$cv_count = array_count_values(array_column($rows, 'maCongViec'));

// 2. Biến tạm để đánh dấu đã hiển thị hay chưa
$da_hien_thi_bophan = [];
$da_hien_thi_cv = [];
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Bộ phận</th>
                <th>Công việc</th>
                <th>Tiến độ công việc</th>
                <th>Vai trò</th>
                <th>Ghi chú</th>
                <th>Xét duyệt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $item): 
            $maBoPhan = $item['maBoPhan'];
            $maCV = $item['maCongViec'];
        ?>
        <tr>
            <?php if (!isset($da_hien_thi_bophan[$maBoPhan])): ?>
                <td rowspan="<?php echo $bophan_count[$maBoPhan]; ?>">
                    <?php echo $item['tenBoPhan']; ?>
                </td>
                <?php $da_hien_thi_bophan[$maBoPhan] = true; ?>
            <?php endif; ?>

            <?php if (!isset($da_hien_thi_cv[$maCV])): ?>
                <td rowspan="<?php echo $cv_count[$maCV]; ?>">
                    <?php echo $item['tenCongViec']; ?>
                </td>
                <?php $da_hien_thi_cv[$maCV] = true; ?>
            <?php endif; ?>
            <?php
                $thoiHan = $item['thoiHan'];
                $ngayHoanThanh = $item['ngayHoanThanh'];
                $trangThai='';
                if(empty($ngayHoanThanh)){
                    $trangThai = "Đang làm";
                }
                else if($thoiHan >= $ngayHoanThanh && !empty($ngayHoanThanh)){
                    $trangThai = "Đã hoàn thành";
                }
                else if($thoiHan < $ngayHoanThanh){
                    $trangThai = "Hoàn thành muộn";
                }
            ?>

            <td>
                <span class="badge text-bg-<?php 
                    if($trangThai == "Đang làm") {
                        echo "warning";
                    } else if ($trangThai == "Đã hoàn thành") {
                        echo "success";
                    } else if($trangThai == "Hoàn thành muộn") {
                        echo "danger";
                    }
                ?>"><?php echo $trangThai; ?></span>
            </td>
            <td><?php echo $item['vaiTro']; ?></td>
            <td><?php echo $item['ghiChu_phancong']; ?></td>
            <td>
                <span class="badge text-bg-<?php 
                    if($item['trangThaiDuyet'] == "Đã giao") {
                        echo "primary";
                    } else if ($item['trangThaiDuyet'] == "Chờ duyệt") {
                        echo "warning";
                    }
                ?>"><?php echo $item['trangThaiDuyet']; ?></span>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>