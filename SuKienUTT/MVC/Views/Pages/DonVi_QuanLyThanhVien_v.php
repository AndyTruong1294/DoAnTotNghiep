<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thành viên</title>
    <style>
        .ev_name{
            max-width: 400px;         /* Bắt buộc: Giới hạn chiều rộng tối đa */
            overflow: hidden;        /* Ẩn phần văn bản thừa */
            text-overflow: ellipsis; /* Thêm dấu ba chấm */
            white-space: nowrap;     /* Không cho văn bản xuống dòng */
        }
    </style>
</head>
<body>
    <input type="hidden" name="txtMaDV" value="<?php echo isset($_SESSION['maDonVi']) ? $_SESSION['maDonVi'] : ''; ?>" form="formThem">
    <input type="hidden" name="txtMaDV" value="<?php echo isset($_SESSION['maDonVi']) ? $_SESSION['maDonVi'] : ''; ?>" form="formTimkiem">
    <input type="hidden" name="txtMaDV" value="<?php echo isset($_SESSION['maDonVi']) ? $_SESSION['maDonVi'] : ''; ?>" form="formCapNhat">

    <div>
        <div class="container">
            <div class="row row-cols-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="" name="txtMaSV" form="formTimkiem" value="<?php echo isset($data['maSinhVien']) ? $data['maSinhVien'] : ''; ?>">
                        <label for="floatingInput">Mã sinh viên</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtHoTen" id="floatingInput1" placeholder="" form="formTimkiem" value="<?php echo isset($data['hoTen']) ? $data['hoTen'] : ''; ?>">
                        <label for="floatingInput1">Họ tên</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtVaiTro" id="floatingInput1" placeholder="" form="formTimkiem" value="<?php echo isset($data['vaiTro']) ? $data['vaiTro'] : ''; ?>">
                        <label for="floatingInput1">Vai trò</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="txtSDT" id="floatingInput2" placeholder="" form="formTimkiem" value="<?php echo isset($data['soDienThoai']) ? $data['soDienThoai'] : ''; ?>">
                        <label for="floatingInput2">Số điện thoại</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="txtEmail" id="floatingInput3" placeholder="" form="formTimkiem" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                        <label for="floatingInput3">Email</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="txtTrangThai" form="formTimkiem">
                        <option selected value="">------</option>
                        <option value="Hoạt động" <?php echo (isset($data['trangThai']) && $data['trangThai'] === 'Hoạt động') ? 'selected' : ''; ?>>Hoạt động</option>
                        <option value="Ngừng hoạt động" <?php echo (isset($data['trangThai']) && $data['trangThai'] === 'Ngừng hoạt động') ? 'selected' : ''; ?>>Ngừng hoạt động</option>
                    </select>
                    <label for="floatingSelect">Trạng thái hoạt động</label>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2">
                <form action="<?php echo BASE_URL ?>QuanLyThanhVien/timkiem" method="POST" id="formTimkiem" name="formTimkiem">
                    <div class="col">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="btnTimKiem">Tìm kiếm thành viên</button>
                        </div>
                    </div>
                </form>
                <form action="<?php echo BASE_URL ?>QuanLyThanhVien/them" method="POST" id="formThem">
                    <div class="col">
                        <div class="d-grid gap-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Thêm thành viên mới
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm thành viên</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4">Mã sinh viên</div>
                                        <div class="col-8">
                                        <input type="text" name="txtMaSV" class="form-control" required maxlength="20">
                                        </div>
                                        <br><br>
                                        <div class="col-4">Vai trò</div>
                                        <div class="col-8">
                                            <input type="text" name="txtVaiTro" class="form-control" required maxlength="50">
                                        </div>
                                        <br><br>
                                        <div class="col-4">Trạng thái</div>
                                        <div class="col-8">
                                            <select name="txtTrangThai" class="form-select" required>
                                                <option value="Hoạt động">Hoạt động</option>
                                                <option value="Ngừng hoạt động">Ngừng hoạt động</option>
                                            </select>
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
            </div> 
        </div>
    </div>
    <hr>
    <div class="table-box">
        <table class="table table-hover">
            <thead >
                <tr>
                    <th>MSV</th>
                    <th>Họ tên</th>
                    <th>Vai trò</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                    while($row=mysqli_fetch_assoc($data['dulieu'])){
                ?>
                <tr>
                    <td class="ev_name"><?php echo $row['maSinhVien'] ?></td>
                    <td class="ev_name"><?php echo $row['hoTen'] ?></td>
                    <td><?php echo $row['vaiTro'] ?></td>
                    <td><?php echo $row['soDienThoai'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                        <span class="badge text-bg-<?php 
                            if($row['trangThai'] == "Hoạt động"){
                                echo "success";
                            }
                            else if($row['trangThai'] == "Ngừng hoạt động"){
                                echo "danger";
                            }
                        ?>">
                            <?php echo $row['trangThai'] ?>
                        </span>         
                    </td>
                    <td>
                        <form action="<?php echo BASE_URL ?>QuanLyThanhVien/capnhat" method="POST" id="formCapNhat" name="formCapNhat">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo 'staticBackdrop'.$row['maSinhVien']; ?>">
                                Cập nhật
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo 'staticBackdrop'.$row['maSinhVien']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Chỉnh sửa thông tin thành viên</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-4">Mã sinh viên</div>
                                                <div class="col-8">
                                                    <input type="text" name="txtMaSV" class="form-control" required value="<?php echo $row['maSinhVien'] ?>" readonly maxlength="20">
                                                </div>
                                                <br><br>
                                                <div class="col-4">Vai trò</div>
                                                <div class="col-8">
                                                    <input type="text" name="txtVaiTro" class="form-control" required value="<?php echo $row['vaiTro'] ?>" maxlength="50">
                                                </div>
                                                <br><br>
                                                <div class="col-4">Trạng thái</div>
                                                <div class="col-8">
                                                    <select name="txtTrangThai" class="form-select" required>
                                                        <option value="Hoạt động" <?php if($row['trangThai'] == 'Hoạt động') echo 'selected'; ?>>Hoạt động</option>
                                                        <option value="Ngừng hoạt động" <?php if($row['trangThai'] == 'Ngừng hoạt động') echo 'selected'; ?>>Ngừng hoạt động</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary" name="btnCapNhat">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>