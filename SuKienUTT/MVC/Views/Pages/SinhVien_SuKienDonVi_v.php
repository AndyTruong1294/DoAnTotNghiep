<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sự kiện</title>
    <style>
        .ev_name{
            max-width: 200px;         /* Bắt buộc: Giới hạn chiều rộng tối đa */
            overflow: hidden;        /* Ẩn phần văn bản thừa */
            text-overflow: ellipsis; /* Thêm dấu ba chấm */
            white-space: nowrap;     /* Không cho văn bản xuống dòng */
        }
    </style>
</head>
<body>
    <h3>Các sự kiện của đơn vị</h3>
    <form action="<?php echo BASE_URL ?>SinhVien/timkiemsukien/<?php if(isset($data['maDonViToChuc'])) echo $data['maDonViToChuc'] ?>" method="POST">
        <div>
            <div class="container">
                <div class="row row-cols-3">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="txtTenSuKien" id="floatingInput" placeholder="" value="<?php if(isset($data['tensukien'])) echo $data['tensukien'] ?>">
                            <label for="floatingInput">Tên sự kiện</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="txtNgay" id="floatingInput1" value="<?php if(isset($data['ngay'])) echo $data['ngay'] ?>" pl>
                            <label for="floatingInput1">Ngày tổ chức</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="btnTimKiem">Tìm kiếm sự kiện</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-box">
            <table class="table table-hover">
                <thead >
                    <tr>
                        <th>Sự kiện</th>
                        <th>Địa điểm</th>
                        <th>Ngày diễn ra</th>
                        <th>Thời gian</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                        while($row=mysqli_fetch_assoc($data['dulieu'])){
                            $orgDate = $row['ngay'];
                            $newDate = date("d/m/Y", strtotime($orgDate));
                            $orgTime = $row['gio'];
                            $newTime = date("H:i", strtotime($orgTime));
                    ?>
                    <tr>
                        <td class="ev_name"><?php echo $row['tenSuKien'] ?></td>
                        <td class="ev_name"><?php echo $row['diaDiem'] ?></td>
                        <td><?php echo $newDate ?></td>
                        <td><?php echo $newTime ?></td>
                        <td>
                            <a href="<?php echo BASE_URL ?>SinhVien/chitietsukien/<?php echo $row['maSuKien'] ?>">Xem chi tiết</a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</body>
</html>