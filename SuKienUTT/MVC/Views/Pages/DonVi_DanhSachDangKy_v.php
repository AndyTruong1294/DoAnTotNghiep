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
    <title>Điểm danh sự kiện</title>
    <style>
        .rowstyle{
            overflow: hidden;        /* Ẩn phần văn bản thừa */
            text-overflow: ellipsis; /* Thêm dấu ba chấm */
            white-space: nowrap;     /* Không cho văn bản xuống dòng */
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
    <h3>Danh sách Check-in</h3>
    <table class="table table-hover">
        <thead >
            <tr>
                <th>Mã sinh viên</th>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Công việc</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($data['dulieuphancong'])&&mysqli_num_rows($data['dulieuphancong'])>0){
                while($row=mysqli_fetch_assoc($data['dulieuphancong'])){                    
            ?>
            <tr class="">
                <td><?php echo $row['maSinhVien'] ?></td>
                <td><b><?php echo $row['hoTen'] ?></b></td>
                <td><?php echo $row['soDienThoai'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['tenCongViec'] ?></td>
                <td>
                    <form action="<?php echo BASE_URL ?>/QuanLySuKien/duyetphancong/<?php echo $masukien ?>/<?php echo $row['maPhanCong'] ?>" method="POST">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['maPhanCong'] ?>">
                            Duyệt
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row['maPhanCong'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row['maPhanCong'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $row['maPhanCong'] ?>">Vai trò của thành viên trong công việc</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-4">Vai trò:</div>
                                    <div class="col-8">
                                        <input type="text" name="txtVaiTro" class="form-control" required maxlength="20">
                                        <hr>
                                    </div>
                                    <div class="col-4">Ghi chú:</div>
                                    <div class="col-8">
                                        <input type="text" name="txtGhiChu" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary" name="btnDuyet">Xác nhận</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </td>
                <td><a href="<?php echo BASE_URL ?>/QuanLySuKien/xoaphancong/<?php echo $masukien ?>/<?php echo $row['maPhanCong'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa đăng ký công việc này?')">Xóa</a></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>
