<?php
$btc='';$ndd='';$chucVu='';$sdt='';$email='';$tenSuKien='';$ngayToChuc='';$gioBatDau='';$diaDiem='';$noiDung='';
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
    <div class="row row-cols-2">
        <div class="col">
            <div class="d-grid gap-2">
                <a href="<?php echo BASE_URL ?>QuanLySuKien/chinhsua/<?php echo $masukien ?>" class="btn btn-outline-primary">                
                    Cập nhật sự kiện
                </a>
            </div>
        </div>
        <div class="col">
            <div class="d-grid gap-2">
                <a href="<?php echo BASE_URL ?>QuanLySuKien/xoasukien/<?php echo $masukien ?>" class="btn btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sự kiện này không?');">
                    Xóa sự kiện
                </a>
            </div>
        </div>    
    </div>

    <hr>
    <h3>Quản lý công việc</h3>
    <div class="row">
        <div class="col-4">
            <!-- Button trigger modal -->
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themBoPhan">
                    Thêm mới bộ phận
                </button>
            </div>

            <form action="<?php echo BASE_URL; ?>/QuanLySuKien/thembophan/<?php echo $masukien; ?>" method="POST">
                <!-- Modal -->
                <div class="modal fade" id="themBoPhan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm mới bộ phận</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-4">Tên bộ phận</div>
                                    <div class="col-8">
                                    <input type="text" name="txtTenBoPhan" class="form-control" required maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary" name="btnThemBoPhan">Thêm mới</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4">
            <a href="<?php echo BASE_URL; ?>/QuanLySuKien/capnhatbophan/<?php echo $masukien; ?>">
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary">
                        Cập nhật bộ phận
                    </button>
                </div>
            </a>
        </div>
        <div class="col-4">
            <!-- Button trigger modal -->
             <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themViec">
                    Thêm mới công việc
                </button>
            </div>

            <form action="<?php echo BASE_URL; ?>/QuanLySuKien/themcongviec/<?php echo $masukien; ?>" method="post">
                <!-- Modal -->
                <div class="modal fade" id="themViec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm mới công việc</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">Bộ phận</div>
                                <div class="col-8">
                                    <select class="form-select" name="txtMaBoPhan" required>
                                        <?php
                                            if(isset($data['dulieubophan']) && mysqli_num_rows($data['dulieubophan'])>0){
                                                mysqli_data_seek($data['dulieubophan'], 0);
                                                while($row=mysqli_fetch_assoc($data['dulieubophan'])){
                                        ?>
                                                    <option value="<?php echo $row['maBoPhan']; ?>"><?php echo $row['tenBoPhan']; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                    <hr>
                                </div>

                                <div class="col-4"><label class="form-label">Tên công việc</label></div>
                                <div class="col-8"><input type="text" class="form-control"  placeholder="Nhập tên công việc" name="txtTencv" required maxlength="50"><hr></div>
                                
                                <div class="col-4"><label class="form-label">Mô tả công việc</label></div>
                                <div class="col-8"><textarea name="txtMota" class="form-control" placeholder="Hãy nhập mô tả cho công việc" ></textarea><hr></div>
                                
                                <div class="col-4"><label class="form-label" name="txtTrangThai">Thời hạn</label></div>
                                <div class="col-4">
                                    <input type="date" class="form-control" name="txtThoiHan">
                                    <hr>
                                </div>

                                <div class="col-4"><label class="form-label" name="txtTrangThai">Ngày xong</label></div>
                                <div class="col-4">
                                    <input type="date" class="form-control" name="txtNgayHoanThanh">
                                    <hr>
                                </div>
                                
                                <div class="col-4"><label class="form-label">Ghi chú</label></div>
                                <div class="col-8"><textarea name="txtGhiChu" class="form-control" placeholder="Hãy nhập ghi chú cho công việc" ></textarea></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" name="btnThemCongViec">Thêm mới</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <table class="table table-hover table-striped-columns">
        <thead>
            <tr>
                <th>Công việc</th>
                <th>Mô tả</th>
                <th>Thời hạn</th>
                <th>Ngày xong</th>
                <th>Ghi chú</th>
                <th></th>
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
                                $ghiChu=$rowcv['ghiChu'];
                                echo "<tr>
                                    <td>$tenCongViec</td>
                                    <td class='sql-content'>$moTa</td>
                                    <td>$thoiHanChuan</td>
                                    <td>
                                        <span class='badge text-bg-";
                                        if($ngayHoanThanh <= $thoiHan){
                                            echo "success";
                                        }
                                        else if($ngayHoanThanh > $thoiHan){
                                            echo "danger";
                                        }
                                        echo "'>$ngayHoanThanhChuan</span>
                                    </td>       
                                    <td class='sql-content'>$ghiChu</td>
                                    <td>
                                        <a href='" . BASE_URL . "/QuanLySuKien/capnhatcongviec/$masukien/$maCongViec' class='btn btn-sm btn-primary'>Cập nhật</a>
                                    </td>
                                </tr>";
                            }
                        }
                    }
                }
            }
            ?>
        </tbody>
    </table>    
    <hr>
    <h3>Chi tiết phân công công việc</h3>
    <div class="row row-cols-2">
        <div class="col">
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="txtMacongviec" form="formTimkiem">
                    <option value="">--- Chọn công việc ---</option>
                    <?php
                    if(isset($data['dulieucongviec']) && mysqli_num_rows($data['dulieucongviec'])>0){
                        mysqli_data_seek($data['dulieucongviec'], 0);
                        while($rowtkcv=mysqli_fetch_assoc($data['dulieucongviec'])){
                            $macv=$rowtkcv['maCongViec'];
                            $tencv=$rowtkcv['tenCongViec'];
                            ?>
                            <option value="<?php echo $macv?>" <?php if(isset($data['congviec']) && $macv == $data['congviec']) echo "selected" ?> ><?php echo $tencv ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <label for="floatingSelect">Công việc</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Nhập họ tên hoặc mã sinh viên" list="danh-sach-sv" name="txtMasinhvien" form="formTimkiem" value="<?php if(isset($data['sinhvien'])) echo $data['sinhvien']; ?>">
                <datalist id="danh-sach-sv">
                    <?php
                    if(isset($data['allthanhvien']) && mysqli_num_rows($data['allthanhvien'])>0){
                        mysqli_data_seek($data['allthanhvien'], 0);
                        while($rowtkcv=mysqli_fetch_assoc($data['allthanhvien'])){
                            $masv=$rowtkcv['maSinhVien'];
                            $tensv=$rowtkcv['hoTen'];
                            ?>
                            <option value="<?php echo $masv?>" ><?php echo $masv." - ".$tensv ?></option>
                            <?php
                        }
                    }
                    ?>
                </datalist>
                <label for="floatingInput">Sinh viên</label>
            </div>
            <!-- <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="txtMasinhvien" form="formTimkiem">
                    <option value="">--- Chọn sinh viên ---</option>
                    <?php
                    if(isset($data['allthanhvien']) && mysqli_num_rows($data['allthanhvien'])>0){
                        mysqli_data_seek($data['allthanhvien'], 0);
                        while($rowtkcv=mysqli_fetch_assoc($data['allthanhvien'])){
                            $masv=$rowtkcv['maSinhVien'];
                            $tensv=$rowtkcv['hoTen'];
                            ?>
                            <option value="<?php echo $masv?>" <?php if( isset($data['sinhvien']) && $masv == $data['sinhvien']) echo "selected" ?> label="<?php echo $masv." - ".$tensv ?>">
                            <?php
                        }
                    }
                    ?>
                </select>
                <label for="floatingSelect">Sinh viên</label>
            </div> -->
        </div>
    </div>
    <br>
    <div class="row row-cols-3">
        <form action="<?php echo BASE_URL ?>QuanLySuKien/timkiemphancong/<?php echo $masukien?>" method="POST" id="formTimkiem" name="formTimkiem">
            <div class="col">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="btnTimKiem">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <form action="<?php echo BASE_URL ?>QuanLySuKien/phanviec/<?php echo $masukien ?>" method="POST" id="formPhanCong">
            <div class="col">
                <div class="d-grid gap-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Phân công công việc
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Phân công công việc</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">Công việc: </div>
                                <div class="col-8">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="txtCV">
                                        <option value="">--- Chọn công việc ---</option>
                                        <?php
                                        if(isset($data['dulieucongviec']) && mysqli_num_rows($data['dulieucongviec'])>0){
                                            mysqli_data_seek($data['dulieucongviec'], 0);
                                            while($rowtkcv=mysqli_fetch_assoc($data['dulieucongviec'])){
                                                $macv=$rowtkcv['maCongViec'];
                                                $tencv=$rowtkcv['tenCongViec'];
                                                ?>
                                                <option value="<?php echo $macv?>" ><?php echo $tencv ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <hr>
                                </div>

                                <div class="col-4">Sinh viên: </div>
                                <div class="col-8">
                                    <select required class="form-select" id="floatingSelect" aria-label="Floating label select example" name="txtSV" ">
                                        <option value="">--- Chọn sinh viên ---</option>
                                        <?php
                                        if(isset($data['dulieuthanhvien']) && mysqli_num_rows($data['dulieuthanhvien'])>0){
                                            mysqli_data_seek($data['dulieuthanhvien'], 0);
                                            while($rowtkcv=mysqli_fetch_assoc($data['dulieuthanhvien'])){
                                                $masv=$rowtkcv['maSinhVien'];
                                                $vaitro=$rowtkcv['vaiTro'];
                                                $tensv=$rowtkcv['hoTen'];
                                                ?>
                                                <option value="<?php echo $masv?>" ><?php echo $masv." - ".$vaitro." - ".$tensv ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <hr>
                                </div>
                                
                                <div class="col-4">Vai trò: </div>
                                <div class="col-8">
                                    <input type="text" name="txtVT" class="form-control" required maxlength="20">
                                    <hr>
                                </div>

                                <div class="col-4">Ghi chú: </div>
                                <div class="col-8">
                                    <textarea name="txtGC" id="" class="form-control" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" name="btnThem">Thêm thành viên</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
        <div class="col">
            <div class="d-grid gap-2">
                <a href="<?php echo BASE_URL ?>/QuanLySuKien/danhsachdangky/<?php echo $masukien ?>" class="btn btn-primary position-relative">
                    Danh sách đăng ký
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo isset($data['soluongcho']) ? $data['soluongcho'] : 0; ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </div>
        </div>
    </div> 
    <br>

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
                <th>Thành viên</th>
                <th>Vai trò</th>
                <th>Ghi chú</th>
                <th></th>
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

            <td><?php echo $item['maSinhVien'] . ' - ' . $item['hoTen']; ?></td>
            <td><?php echo $item['vaiTro']; ?></td>
            <td><?php echo $item['ghiChu_phancong']; ?></td>
            <td>
                <form action="<?php echo BASE_URL; ?>/QuanLySuKien/capnhatphancong/<?php echo $item['maSuKien'] . '/' . $item['maPhanCong']; ?>" method="POST">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $item['maPhanCong']; ?>">
                        Cập nhật
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo $item['maPhanCong']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật công việc của sinh viên</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4">Công việc: </div>
                                        <div class="col-8">
                                            <input type="text" name="txtCV" class="form-control" value="<?php echo $item['tenCongViec']; ?>" readonly>
                                            <hr>
                                        </div>

                                        <div class="col-4">Sinh viên: </div>
                                        <div class="col-8">
                                            <input type="text" name="txtSV" class="form-control" value="<?php echo $item['maSinhVien']; ?>" readonly>
                                            <hr>
                                        </div>
                                        
                                        <div class="col-4">Vai trò: </div>
                                        <div class="col-8">
                                            <input type="text" name="txtVT" class="form-control" value="<?php echo $item['vaiTro']; ?>" required maxlength="20">
                                            <hr>
                                        </div>

                                        <div class="col-4">Ghi chú: </div>
                                        <div class="col-8">
                                            <textarea name="txtGC" id="" class="form-control"><?php echo $item['ghiChu_phancong']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btnSua">Cập nhật</button>
                                    <a href="<?php echo BASE_URL; ?>/QuanLySuKien/xoaphancong/<?php echo $item['maSuKien'] . '/' . $item['maPhanCong']; ?>" class="btn btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phân công này không?');">Xóa</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
            <!-- <td>
                <a href="<?php echo BASE_URL; ?>/QuanLySuKien/xoaphancong/<?php echo $item['maSuKien'] . '/' . $item['maPhanCong']; ?>" class="btn btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phân công này không?');">Xóa</a>
            </td> -->
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<!-- <td>
    <a href='" . BASE_URL . "/QuanLySuKien/capnhatcongviec/$masukien/' class='btn btn-sm btn-primary'>Cập nhật</a>
</td> -->