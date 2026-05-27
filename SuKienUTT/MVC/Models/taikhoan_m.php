<?php
class taikhoan_m extends connectDB{
//Đăng ký tài khoản
    function dangkySV($maSinhVien, $hoTen,$ngaySinh, $gioiTinh, $soDienThoai, $email, $tenDangNhap, $matKhau){
        $sql = "INSERT INTO `sinhvien`(`maSinhVien`, `hoTen`, `ngaySinh`, `gioiTinh`, `soDienThoai`, `email`, `tenDangNhap`, `matKhau`) VALUES ('$maSinhVien', '$hoTen', '$ngaySinh', '$gioiTinh', '$soDienThoai', '$email', '$tenDangNhap', '$matKhau')";
        return mysqli_query($this->con, $sql);
    }

    function dangkyDV($tenDonViToChuc, $moTa, $tenDangNhap, $matKhau){
        $sql = "INSERT INTO `donvitochuc`(`maDonViToChuc`, `tenDonViToChuc`, `moTa`, `tenDangNhap`, `matKhau`) VALUES (NULL, '$tenDonViToChuc', '$moTa', '$tenDangNhap', '$matKhau')";
        if(mysqli_query($this->con, $sql)){
            return mysqli_insert_id($this->con); // Trả về ID của đơn vị tổ chức vừa được tạo
        } else {
            return false;
        }
    }

//Kiểm tra trùng sinh viên
    function SVtrungMa($maSinhVien){
        $sql="SELECT * FROM sinhvien WHERE maSinhVien='$maSinhVien'";
        $dl=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($dl)>0)
            $kq= true;
        return $kq;
    }
    function SVtrungSDT($soDienThoai){
        $sql="SELECT * FROM sinhvien WHERE soDienThoai='$soDienThoai'";
        $dl=mysqli_query($this->con,$sql);
        return mysqli_num_rows($dl);
    }
    function SVtrungEmail($email){
        $sql="SELECT * FROM sinhvien WHERE email='$email'";
        $dl=mysqli_query($this->con,$sql);
        return mysqli_num_rows($dl);
    }
    function SVtrungTDN($tenDangNhap){
        $sql="SELECT * FROM sinhvien WHERE tenDangNhap='$tenDangNhap'";
        $dl=mysqli_query($this->con,$sql);
        return mysqli_num_rows($dl);
    }
    function thongtinsinhvien($maSinhVien){
        $sql="SELECT * FROM sinhvien WHERE maSinhVien='$maSinhVien'";
        return mysqli_query($this->con,$sql);
    }
    function capnhatsinhvien($maSinhVien, $hoTen, $ngaySinh, $gioiTinh, $soDienThoai, $email, $tenDangNhap, $matKhau){
        $sql="UPDATE sinhvien SET hoTen='$hoTen',
            ngaySinh='$ngaySinh',
            gioiTinh='$gioiTinh',
            soDienThoai='$soDienThoai',
            email='$email',
            tenDangNhap='$tenDangNhap',
            matKhau='$matKhau'
            WHERE maSinhVien='$maSinhVien'";
        return mysqli_query($this->con, $sql);
    }

//Kiểm tra trùng đơn vị tổ chức
    function DVtrungTen($tenDonViToChuc){
        $sql="SELECT * FROM donvitochuc WHERE tenDonViToChuc='$tenDonViToChuc'";
        $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
    }
    function DVtrungTDN($tenDangNhap){
        $sql="SELECT * FROM donvitochuc WHERE tenDangNhap='$tenDangNhap'";
        $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
    }

    function donvithamgia($maSinhVien){
        $sql="SELECT donvitochuc.* FROM donvitochuc, thanhviendonvi
            WHERE donvitochuc.maDonViToChuc = thanhviendonvi.maDonViToChuc
            AND thanhviendonvi.maSinhVien = '$maSinhVien'";
        return mysqli_query($this->con, $sql);
    }

//Đăng nhập
    function dangnhapSV($tenDangNhap, $matKhau){
        $sql="SELECT maSinhVien FROM sinhvien WHERE tenDangNhap='$tenDangNhap' AND matKhau='$matKhau'";
        $dl=mysqli_query($this->con,$sql);
        if($dl && mysqli_num_rows($dl) > 0){
            $row = mysqli_fetch_assoc($dl);
            return $row['maSinhVien']; // Trả về mã sinh viên nếu đăng nhập thành công
        } else {
            return false; // Đăng nhập thất bại
        }
    }
    function dangnhapDV($tenDangNhap, $matKhau){
        $sql="SELECT maDonViToChuc FROM donvitochuc WHERE tenDangNhap='$tenDangNhap' AND matKhau='$matKhau'";
        $dl=mysqli_query($this->con,$sql);
        if($dl && mysqli_num_rows($dl) > 0){
            $row = mysqli_fetch_assoc($dl);
            return $row['maDonViToChuc']; // Trả về mã đơn vị tổ chức nếu đăng nhập thành công
        } else {
            return false; // Đăng nhập thất bại
        }
    }

//Lấy thông tin đơn vị
    function laythongtindv($maDonViToChuc){
        $sql = "SELECT * FROM donvitochuc WHERE maDonViToChuc='$maDonViToChuc'";
        return mysqli_query($this->con, $sql);
    }
}
?>