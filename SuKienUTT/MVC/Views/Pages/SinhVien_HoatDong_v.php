<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn vị của bạn</title>
</head>
<body>
    <h3>Đơn vị mà bạn tham gia</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên đơn vị</th>
                <th>Giới thiệu</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($data['danhsachdonvi'])&&mysqli_num_rows($data['danhsachdonvi'])>0){
                $i=1;
                while($row=mysqli_fetch_assoc($data['danhsachdonvi'])){
                                    
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><b><?php echo $row['tenDonViToChuc'] ?></b></td>
                <td><?php echo $row['moTa'] ?></td>
                <td>
                    <a href="<?php echo BASE_URL?>SinhVien/danhsach/<?php echo $row['maDonViToChuc'] ?>">
                        Các sự kiện của đơn vị
                    </a>
                </td>
            </tr>
            <?php
                }
            }else{
                echo "<tr><td colspan='4'>Bạn chưa tham gia đơn vị nào!</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- <hr>
    <h3>Danh sách công việc đã được giao</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Công việc</th>
                <th>Mô tả</th>
                <th>Sự kiện</th>
                <th>Thời gian sự kiện</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($data['danhsachcongviec'])&&mysqli_num_rows($data['danhsachcongviec'])>0){
                $i=1;
                while($row=mysqli_fetch_assoc($data['danhsachcongviec'])){
                    $orgDate = $row['ngay'];
                    $newDate = date("d/m/Y", strtotime($orgDate));
                    $orgTime = $row['gio'];
                    $newTime = date("H:i", strtotime($orgTime));
                    $tt="";
                    if($row['trangThai'] == "Đã hoàn thành"){
                        $tt="success";
                    }
                    else if($row['trangThai'] == "Chưa hoàn thành"){
                        $tt="danger";
                    }
                    else if($row['trangThai'] == "Hoàn thành muộn"){
                        $tt="warning";
                    }
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><b><?php echo $row['tenCongViec'] ?></b></td>
                <td><?php echo $row['moTa'] ?></td>
                <td><?php echo $row['tenSuKien'] ?></td>
                <td><?php echo $newDate . '<br>' . $newTime ?></td>
                <td><?php echo $row['ghiChu'] ?></td>
                <td>
                    <span class="badge text-bg-<?php echo $tt ?>">
                        <?php echo $row['trangThai'] ?>
                    </span>
                </td>  
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table> -->
</body>
</html>