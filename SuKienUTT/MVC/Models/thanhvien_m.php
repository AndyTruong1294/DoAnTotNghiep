<?php
    class thanhvien_m extends connectDB{
        function themthanhvien($maSinhVien, $maDonViToChuc, $vaiTro, $trangThai){
            $sql="INSERT INTO thanhviendonvi VALUES ('$maSinhVien', '$maDonViToChuc', '$vaiTro', '$trangThai')";
            return mysqli_query($this->con, $sql); 
        }

        function kiemtrathanhvien($maSinhVien, $maDonViToChuc){
            $sql="SELECT * FROM thanhviendonvi WHERE maSinhVien='$maSinhVien' AND maDonViToChuc='$maDonViToChuc'";
            $dl= mysqli_num_rows(mysqli_query($this->con, $sql));
            return $dl > 0;
        }

        function timthanhvien($maDonVi,$maSinhVien, $hoTen, $vaiTro,$soDienThoai, $email, $trangThai){
            $status="";
            if(!empty($trangThai)){
                $status="AND thanhviendonvi.trangThai = '$trangThai'";
            }
            $sql="SELECT * FROM thanhviendonvi, sinhvien
                WHERE thanhviendonvi.maSinhVien = sinhvien.maSinhVien
                AND thanhviendonvi.maDonViToChuc='$maDonVi'
                AND sinhvien.maSinhVien LIKE '%$maSinhVien%'
                AND sinhvien.hoTen LIKE '%$hoTen%'
                AND thanhviendonvi.vaiTro LIKE '%$vaiTro%'
                AND sinhvien.soDienThoai LIKE '%$soDienThoai%'
                AND sinhvien.email LIKE '%$email%' ".$status;
            return mysqli_query($this->con, $sql);
        }

        function capnhatthanhvien($maSinhVien, $maDonViToChuc, $vaiTro, $trangThai){
            $sql="UPDATE thanhviendonvi SET vaiTro='$vaiTro', trangThai='$trangThai' WHERE maSinhVien='$maSinhVien' AND maDonViToChuc='$maDonViToChuc'";
            return mysqli_query($this->con, $sql);
        }
    }
?>