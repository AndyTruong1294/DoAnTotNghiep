<?php
class sukien_m extends connectDB{
    function themsukien($maDonViToChuc, $tenSuKien, $ngay, $gio, $diaDiem, $noiDung, $soDienThoai, $email){
        $sql = "INSERT INTO `sukien`(`maSuKien`, `maDonViToChuc`, `tenSuKien`, `ngay`, `gio`, `diaDiem`, `noiDung`, `soDienThoai`, `email`) 
        VALUES (NULL, '$maDonViToChuc', '$tenSuKien', '$ngay', '$gio', '$diaDiem', '$noiDung', '$soDienThoai', '$email')";
        return mysqli_query($this->con, $sql);
    }

    function laysukientheoma($maSuKien){
        $sql = "SELECT * FROM sukien, donvitochuc 
            WHERE donvitochuc.maDonViToChuc = sukien.maDonViToChuc 
            AND sukien.maSuKien='$maSuKien'";
        return mysqli_query($this->con, $sql);
    }

    function timsukien($maDonViToChuc, $tenSuKien, $ngay){
        $truyvanngay='';
        if(!empty($ngay)){
            $truyvanngay="AND sukien.ngay = '$ngay'";
        }
        $sql="SELECT sukien.*, donvitochuc.tenDonViToChuc FROM donvitochuc, sukien
            WHERE donvitochuc.maDonViToChuc = sukien.maDonViToChuc
            AND donvitochuc.maDonViToChuc = '$maDonViToChuc'
            AND sukien.tenSuKien LIKE '%$tenSuKien%'".$truyvanngay."ORDER BY ngay DESC, gio DESC";
        return mysqli_query($this->con, $sql);
    }

    function suasukien($maSuKien, $tenSuKien, $ngay, $gio, $diaDiem, $noiDung, $soDienThoai, $email){
        $sql = "UPDATE `sukien` SET `tenSuKien`='$tenSuKien',`ngay`='$ngay',`gio`='$gio',`diaDiem`='$diaDiem',`noiDung`='$noiDung',`soDienThoai`='$soDienThoai',`email`='$email' 
        WHERE maSuKien='$maSuKien'";
        return mysqli_query($this->con, $sql);
    }

    function sinhviensukien($tenDonViToChuc, $tenSuKien, $ngay){
        $truyvanngay='';
        if(!empty($ngay)){
            $truyvanngay=" AND sukien.ngay = '$ngay'";
        }
        $sql="SELECT * FROM sukien, donvitochuc 
            WHERE donvitochuc.maDonViToChuc = sukien.maDonViToChuc
            AND donvitochuc.tenDonViToChuc LIKE '%$tenDonViToChuc%'
            AND sukien.tenSuKien LIKE '%$tenSuKien%'".$truyvanngay." ORDER BY ngay DESC, gio DESC";
        return mysqli_query($this->con, $sql);
    }

    function xoasukien($maSuKien){
        $sql="DELETE FROM sukien WHERE maSuKien='$maSuKien'";
        return mysqli_query($this->con, $sql);
    }
}
?>