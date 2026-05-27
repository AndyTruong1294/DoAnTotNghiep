<?php
    class congviec_m extends connectDB{
        function laybophancuask($maSuKien){
            $sql="SELECT * FROM bophan WHERE maSuKien='$maSuKien'";
            return mysqli_query($this->con, $sql);
        }
        function laycongvieccuask($maSuKien, $maBoPhan){
            $bophan="";
            if(!empty($maBoPhan)){
                $bophan="AND maBoPhan='$maBoPhan'";
            }
            $sql="SELECT * FROM congviec, bophan WHERE congviec.maBoPhan = bophan.maBoPhan AND maSuKien='$maSuKien' $bophan";
            return mysqli_query($this->con, $sql);
        }
        function laychitietcongviec($maCongViec){
            $sql="SELECT * FROM congviec WHERE maCongViec='$maCongViec'";
            return mysqli_query($this->con, $sql);
        }

        function thembophan($maSuKien, $tenBoPhan){
            $sql="INSERT INTO bophan VALUES (NULL, '$maSuKien', '$tenBoPhan')";
            return mysqli_query($this->con, $sql);
        }

        function suabophan($maBoPhan, $tenBoPhanMoi){
            $sql="UPDATE bophan SET tenBoPhan='$tenBoPhanMoi' WHERE maBoPhan='$maBoPhan'";
            return mysqli_query($this->con, $sql);
        }

        function themcongviec($maBoPhan, $tenCongViec, $moTa, $thoiHan, $ngayHoanThanh, $ghiChu){
            $sql="INSERT INTO congviec VALUES (NULL, '$maBoPhan', '$tenCongViec', '$moTa', '$thoiHan', '$ngayHoanThanh', '$ghiChu')";
            return mysqli_query($this->con, $sql);
        }

        function suacongviec($maCongViec, $maBoPhan, $tenCongViec, $moTa, $thoiHan, $ngayHoanThanh, $ghiChu){
            $sql="UPDATE congviec SET maBoPhan='$maBoPhan', tenCongViec='$tenCongViec', moTa='$moTa', thoiHan='$thoiHan', ngayHoanThanh='$ngayHoanThanh', ghiChu='$ghiChu' WHERE maCongViec='$maCongViec'";
            return mysqli_query($this->con, $sql);
        }

        function layphanviec($maSuKien, $maBoPhan, $maCongViec, $maSinhVien, $trangThaiDuyet){
            $sk="";
            $bophan="";
            $cv="";
            $sv="";
            if(!empty($maSuKien)){
                $sk="AND bophan.maSuKien='$maSuKien'";
            }
            if(!empty($maBoPhan)){
                $bophan="AND bophan.maBoPhan='$maBoPhan'";
            }
            if(!empty($maCongViec)){
                $cv="AND congviec.maCongViec='$maCongViec'";
            }
            if(!empty($maSinhVien)){
                $sv="AND sinhvien.maSinhVien='$maSinhVien'";
            }
            $sql="SELECT *, phancong.ghiChu AS ghiChu_phancong FROM sinhvien, phancong, congviec, bophan 
                WHERE sinhvien.maSinhVien = phancong.maSinhVien
                AND phancong.maCongViec = congviec.maCongViec
                AND congviec.maBoPhan = bophan.maBoPhan
                AND phancong.trangThaiDuyet LIKE '%$trangThaiDuyet%'
                $sk $bophan $cv $sv
                ORDER BY bophan.maBoPhan ASC, congviec.maCongViec ASC";
            return mysqli_query($this->con, $sql);
        }

        function demchoduyet($maSuKien){
            $sql="SELECT * FROM phancong, congviec, bophan 
                WHERE phancong.maCongViec = congviec.maCongViec
                AND congviec.maBoPhan = bophan.maBoPhan
                AND bophan.maSuKien='$maSuKien'
                AND phancong.trangThaiDuyet='Chờ duyệt'";
            $dl= mysqli_query($this->con, $sql);
            return mysqli_num_rows($dl);
        }

        function phanviec($maCongViec,$maSinhVien,$vaiTro,$ghiChu, $trangThaiDuyet){
            $sql="INSERT INTO `phancong`(`maPhanCong`, `maCongViec`, `maSinhVien`, `vaiTro`, `ghiChu`, `trangThaiDuyet`) 
                VALUES (NULL,'$maCongViec','$maSinhVien','$vaiTro','$ghiChu', '$trangThaiDuyet')";
            return mysqli_query($this->con,$sql);
        }

        function congviecduocgiao($maSinhVien){
            $sql="SELECT * FROM phancong, congviec, bophan, sukien
                WHERE phancong.maCongViec = congviec.maCongViec
                AND congviec.maBoPhan = bophan.maBoPhan
                AND bophan.maSuKien = sukien.maSuKien
                AND phancong.maSinhVien = '$maSinhVien'
                ORDER BY sukien.ngay DESC, sukien.gio DESC, bophan.maBoPhan ASC, congviec.maCongViec ASC";
            return mysqli_query($this->con, $sql);
        }

        function capnhatphancong($maPhanCong, $vaiTro, $ghiChu, $trangThaiDuyet){
            $sql = "UPDATE phancong SET 
                vaiTro = CASE WHEN '$vaiTro' <> '' THEN '$vaiTro' ELSE vaiTro END,
                ghiChu = CASE WHEN '$ghiChu' <> '' THEN '$ghiChu' ELSE ghiChu END,
                trangThaiDuyet = CASE WHEN '$trangThaiDuyet' <> '' THEN '$trangThaiDuyet' ELSE trangThaiDuyet END
            WHERE maPhanCong = '$maPhanCong'";
            
    return mysqli_query($this->con, $sql);
        }

        function xoaphancong($maPhanCong){
            $sql="DELETE FROM phancong WHERE maPhanCong='$maPhanCong'";
            return mysqli_query($this->con, $sql);
        }

        function xoacongviec($maCongViec){
            $sql="DELETE FROM congviec WHERE maCongViec='$maCongViec'";
            return mysqli_query($this->con, $sql);
        }

        function xoabophan($maBoPhan){
            $sql="DELETE FROM bophan WHERE maBoPhan='$maBoPhan'";
            return mysqli_query($this->con, $sql);
        }

        function danhanviec($maCongViec, $maSinhVien){
            $sql="SELECT trangThaiDuyet FROM phancong WHERE maCongViec='$maCongViec' AND maSinhVien='$maSinhVien'";
            return mysqli_query($this->con, $sql);
        }
    }
?>