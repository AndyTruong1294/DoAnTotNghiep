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
    <title>Cập nhật bộ phận</title>
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
    <form action="<?php echo BASE_URL; ?>QuanLySuKien/suabophan/<?php echo $masukien; ?>" method="POST" id="departmentForm">
        <input type="hidden" id="formAction" name="formAction" value="">
        <div class="row">
            <div class="col-2">Bộ phận muốn cập nhật:</div>
            <div class="col-10">
                <select name="txtBoPhanCu" class="form-select" id="departmentSelect">
                    <option value="" disabled selected>---Chọn bộ phận muốn thay đổi---</option>
                    <?php
                        if(isset($data['dulieubophan']) && mysqli_num_rows($data['dulieubophan']) > 0){
                            while($row = mysqli_fetch_assoc($data['dulieubophan'])){
                                echo '<option value="'.$row['maBoPhan'].'">'.$row['tenBoPhan'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <br><br>
            <div class="col-2">Tên bộ phận mới:</div>
            <div class="col-10">
                <input type="text" class="form-control" name="txtTenBoPhanMoi"  placeholder="Nhập tên bộ phận mới" maxlength="50" id="departmentInput">
            </div>
            <br><br>
            <div class="col-6">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="btnSua" id="btnUpdate">Cập nhật bộ phận</button>
                </div>
            </div>
            <div class="col-6">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-danger" type="submit" name="btnXoa" id="btnDelete">
                        Xóa bộ phận
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<script>
    const form = document.getElementById('departmentForm');
    const select = document.getElementById('departmentSelect');
    const input = document.getElementById('departmentInput');
    const formAction = document.getElementById('formAction');

    form.addEventListener('submit', function(e) {
    // Xác định nút nào vừa được nhấn
    const clickedButton = e.submitter.name; 

    if (clickedButton === 'btnSua') {
        // Nút Sửa: Yêu cầu cả 2
        if (!select.value.trim() || !input.value.trim()) {
        e.preventDefault(); // Chặn submit
        alert("Vui lòng chọn bộ phận và nhập tên bộ phận mới!");
        return;
        }
        formAction.value = 'btnSua'; // Đánh dấu gửi về PHP
    } 
    
    else if (clickedButton === 'btnXoa') {
        // Nút Xóa: Chỉ yêu cầu Select
        if (!select.value.trim()) {
        e.preventDefault(); // Chặn submit
        alert("Vui lòng chọn bộ phận cần xóa!");
        return;
        }
        
        if (!confirm("Bạn có chắc chắn muốn xóa không?")) {
        e.preventDefault();
        return;
        }
        formAction.value = 'btnXoa'; // Đánh dấu gửi về PHP
    }
    });
</script>