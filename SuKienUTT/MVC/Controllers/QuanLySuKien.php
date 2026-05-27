<?php
    class QuanLySuKien extends controller{
        function Get_data(){
            if(!isset($_SESSION['maDonVi'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('DonVi_MasterLayout',[
                'page'=>'DonVi_QuanLySuKien_v',
                'dulieu'=>$this->model('sukien_m')->timsukien($_SESSION['maDonVi'], '', '')
            ]);
        }

        function taomoi(){
            $this->view('DonVi_MasterLayout',[
                'page'=>'DonVi_TaoMoiSuKien_v',
                'thongtinbtc'=>$this->model('taikhoan_m')->laythongtindv($_SESSION['maDonVi'])
            ]);
        }

        function them(){
            if(isset($_POST['btnDangKy'])){
                $maDonViToChuc = $_POST['txtMaDV'];
                $tenSuKien = $_POST['txtTenSK'];
                $ngay = $_POST['txtNgay'];
                $gio = $_POST['txtGio'];
                $diaDiem = $_POST['txtDiaDiem'];
                $noiDung = $_POST['txtNoiDung'];
                $soDienThoai = $_POST['txtSDT'];
                $email = $_POST['txtEmail'];

                if($this->model('sukien_m')->themsukien($maDonViToChuc, $tenSuKien, $ngay, $gio, $diaDiem, $noiDung, $soDienThoai, $email)){
                    echo "<script>alert('Đăng ký sự kiện thành công.');</script>";
                    $this->view('DonVi_MasterLayout',[
                        'page'=>'DonVi_QuanLySuKien_v',
                        'dulieu'=>$this->model('sukien_m')->timsukien($_SESSION['maDonVi'], '', '')
                    ]);
                }else {
                    echo "<script>alert('Đăng ký sự kiện thất bại. Vui lòng thử lại.');</script>";
                    $this->view('DonVi_MasterLayout',[
                        'page'=>'DonVi_TaoMoiSuKien_v',
                        'thongtinbtc'=>$this->model('taikhoan_m')->timsukien($_SESSION['maDonVi'], '', '')
                    ]);
                }
            }
        }
        
        function timkiem(){
            if(isset($_POST['btnTim'])){
                $maDonViToChuc = $_SESSION['maDonVi'];
                $tenSuKien = $_POST['txtTenSuKien'];
                $ngay = $_POST['txtNgay'];

                $this->view('DonVi_MasterLayout',[
                    'page'=>'DonVi_QuanLySuKien_v',
                    'dulieu'=>$this->model('sukien_m')->timsukien($maDonViToChuc, $tenSuKien, $ngay),
                    'tensukien'=>$tenSuKien,
                    'ngay'=>$ngay
                ]);
            }
        }

        function chitiet($maSuKien){
            $this->view('DonVi_MasterLayout',[
                'page'=>'DonVi_ChiTietSuKien_v',
                'dulieu'=>$this->model('sukien_m')->laysukientheoma($maSuKien),
                'dulieubophan'=>$this->model('congviec_m')->laybophancuask($maSuKien),
                'dulieucongviec'=>$this->model('congviec_m')->laycongvieccuask($maSuKien, ''),
                'dulieuphancong'=>$this->model('congviec_m')->layphanviec($maSuKien, '', '', '','Đã giao'),
                'dulieuthanhvien'=>$this->model('thanhvien_m')->timthanhvien($_SESSION['maDonVi'],'', '', '','', '', 'Hoạt động'),
                'allthanhvien'=>$this->model('thanhvien_m')->timthanhvien($_SESSION['maDonVi'],'', '', '','', '', ''),
                'soluongcho'=>$this->model('congviec_m')->demchoduyet($maSuKien)
            ]);
        }

        function chinhsua($maSuKien){
            $this->view('DonVi_MasterLayout',[
                'page'=>'DonVi_CapNhatSuKien_v',
                'dulieu'=>$this->model('sukien_m')->laysukientheoma($maSuKien),
            ]);
        }
        function sua(){
            if(isset($_POST['btnSua'])){
                $maSuKien = $_POST['txtMaSuKien'];
                $tenSuKien = $_POST['txtTenSK'];
                $ngay = $_POST['txtNgay'];
                $gio = $_POST['txtGio'];
                $diaDiem = $_POST['txtDiaDiem'];
                $noiDung = $_POST['txtNoiDung'];
                $soDienThoai = $_POST['txtSDT'];
                $email = $_POST['txtEmail'];

                if($this->model('sukien_m')->suasukien($maSuKien, $tenSuKien, $ngay, $gio, $diaDiem, $noiDung, $soDienThoai, $email)){
                    echo "<script>alert('Cập nhật sự kiện thành công.');</script>";
                    
                }else {
                    echo "<script>alert('Cập nhật sự kiện thất bại. Vui lòng thử lại.');</script>";
                }
                $this->chitiet($maSuKien);
            }
        }

// Công việc
        function thembophan($maSuKien){
            if(isset($_POST['btnThemBoPhan'])){
                $tenBoPhan = $_POST['txtTenBoPhan'];

                if($this->model('congviec_m')->thembophan($maSuKien, $tenBoPhan)){
                    echo "<script>alert('Thêm bộ phận thành công.');</script>";
                    
                }else {
                    echo "<script>alert('Thêm bộ phận thất bại. Vui lòng thử lại.');</script>";
                }
                $this->chitiet($maSuKien);
            }
        }

        function capnhatbophan($maSuKien){
            $this->view('DonVi_MasterLayout',[
                'page'=>'DonVi_CapNhatBoPhan_v',
                'dulieu'=>$this->model('sukien_m')->laysukientheoma($maSuKien),
                'dulieubophan'=>$this->model('congviec_m')->laybophancuask($maSuKien)
            ]);
        }

        // function suabophan($maSuKien){
        //     if(isset($_POST['btnSua'])){
        //         $maBoPhan = $_POST['txtBoPhanCu'];
        //         $tenBoPhanMoi = $_POST['txtTenBoPhanMoi'];

        //         if($this->model('congviec_m')->suabophan($maBoPhan, $tenBoPhanMoi)){
        //             echo "<script>alert('Cập nhật bộ phận thành công.');</script>";
                    
        //         }else {
        //             echo "<script>alert('Cập nhật bộ phận thất bại. Vui lòng thử lại.');</script>";
        //         }
        //         $this->chitiet($maSuKien);
        //     }

        //     if(isset($_POST['btnXoa'])){
        //         $maBoPhan = $_POST['txtBoPhanCu'];

        //         if($this->model('congviec_m')->xoabophan($maBoPhan)){
        //             echo "<script>alert('Xóa bộ phận thành công.');</script>";
                    
        //         }else {
        //             echo "<script>alert('Xóa bộ phận thất bại. Vui lòng thử lại.');</script>";
        //         }
        //         $this->chitiet($maSuKien);
        //     }
        // }

        function suabophan($maSuKien){
        // Kiểm tra thông qua ô ẩn hành động
        if(isset($_POST['formAction'])){
            $action = $_POST['formAction'];

            // Trường hợp SỬA
            if($action === 'btnSua'){
                $maBoPhan = $_POST['txtBoPhanCu'];
                $tenBoPhanMoi = $_POST['txtTenBoPhanMoi'];

                if($this->model('congviec_m')->suabophan($maBoPhan, $tenBoPhanMoi)){
                    echo "<script>alert('Cập nhật bộ phận thành công.');</script>";
                } else {
                    echo "<script>alert('Cập nhật bộ phận thất bại. Vui lòng thử lại.');</script>";
                }
                $this->chitiet($maSuKien);
            }

            // Trường hợp XÓA
            if($action === 'btnXoa'){
                $maBoPhan = $_POST['txtBoPhanCu'];

                if($this->model('congviec_m')->xoabophan($maBoPhan)){
                    echo "<script>alert('Xóa bộ phận thành công.');</script>";
                } else {
                    echo "<script>alert('Xóa bộ phận thất bại. Vui lòng thử lại.');</script>";
                }
                $this->chitiet($maSuKien);
            }
        }
    }

        function themcongviec($maSuKien){
            if(isset($_POST['btnThemCongViec'])){
                $maBoPhan = $_POST['txtMaBoPhan'];
                $tenCongViec = $_POST['txtTencv'];
                $moTa = $_POST['txtMota'];
                $thoiHan = $_POST['txtThoiHan'];
                $ngayHoanThanh = $_POST['txtNgayHoanThanh'];
                $ghiChu = $_POST['txtGhiChu'];

                if($this->model('congviec_m')->themcongviec($maBoPhan, $tenCongViec, $moTa, $thoiHan, $ngayHoanThanh, $ghiChu)){
                    echo "<script>alert('Thêm công việc thành công.');</script>";
                    
                }else {
                    echo "<script>alert('Thêm công việc thất bại. Vui lòng thử lại.');</script>";
                }
                $this->chitiet($maSuKien);
            }
        }
        function capnhatcongviec($maSuKien, $maCongViec){
            $this->view('DonVi_MasterLayout',[
                'page'=>'DonVi_CapNhatCongViec_v',
                'dulieu'=>$this->model('sukien_m')->laysukientheoma($maSuKien),
                'dulieubophan'=>$this->model('congviec_m')->laybophancuask($maSuKien),
                'chitietcongviec'=>$this->model('congviec_m')->laychitietcongviec($maCongViec)
            ]);
        }
        function suacongviec($maSuKien, $maCongViec){
            if(isset($_POST['btnSuaCongViec'])){
                $maBoPhan = $_POST['txtMaBoPhan'];
                $tenCongViec = $_POST['txtTencv'];
                $moTa = $_POST['txtMota'];
                $thoiHan = $_POST['txtThoiHan'];
                $ngayHoanThanh = $_POST['txtNgayHoanThanh'];
                $ghiChu = $_POST['txtGhiChu'];

                if($this->model('congviec_m')->suacongviec($maCongViec, $maBoPhan, $tenCongViec, $moTa, $thoiHan, $ngayHoanThanh, $ghiChu)){
                    echo "<script>alert('Cập nhật công việc thành công.');</script>";
                    
                }else {
                    echo "<script>alert('Cập nhật công việc thất bại. Vui lòng thử lại.');</script>";
                }
                $this->chitiet($maSuKien);
            }
        }

        function phanviec($maSuKien){
            if(isset($_POST['btnThem'])){
                $maCongViec = $_POST['txtCV'];
                $maSinhVien = $_POST['txtSV'];
                $vaiTro = $_POST['txtVT'];
                $ghiChu = $_POST['txtGC'];

                $check = $this->model('congviec_m')->danhanviec($maCongViec, $maSinhVien);
                if($check && mysqli_num_rows($check) > 0){
                    echo "<script>alert('Sinh viên đã được giao công việc này. Vui lòng kiểm tra lại!');</script>";
                }else{
                    $result = $this->model('congviec_m')->phanviec($maCongViec,$maSinhVien,$vaiTro,$ghiChu, 'Đã giao');
                    if($result){
                        echo "<script>alert('Phân công công việc thành công.');</script>";
                    }else{
                        echo "<script>alert('Phân công công việc thất bại.');</script>";
                    }
                }
                $this->chitiet($maSuKien);
            }
        }

        function timkiemphancong($maSuKien){
            if(isset($_POST['btnTimKiem'])){
                $maCongViec = $_POST['txtMacongviec'];
                $maSinhVien = $_POST['txtMasinhvien'];

                $this->view('DonVi_MasterLayout',[
                    'page'=>'DonVi_ChiTietSuKien_v',
                    'dulieu'=>$this->model('sukien_m')->laysukientheoma($maSuKien),
                    'dulieubophan'=>$this->model('congviec_m')->laybophancuask($maSuKien),
                    'dulieucongviec'=>$this->model('congviec_m')->laycongvieccuask($maSuKien, ''),
                    'dulieuphancong'=>$this->model('congviec_m')->layphanviec($maSuKien, '', $maCongViec, $maSinhVien, 'Đã giao'),
                    'dulieuthanhvien'=>$this->model('thanhvien_m')->timthanhvien($_SESSION['maDonVi'],'', '', '','', '', 'Hoạt động'),
                    'allthanhvien'=>$this->model('thanhvien_m')->timthanhvien($_SESSION['maDonVi'],'', '', '','', '', ''),
                    'congviec'=>$maCongViec,
                    'sinhvien'=>$maSinhVien
                ]);
            }
        }

        function danhsachdangky($maSuKien){
            $this->view('DonVi_MasterLayout',[
                    'page'=>'DonVi_DanhSachDangKy_v',
                    'dulieu'=>$this->model('sukien_m')->laysukientheoma($maSuKien),
                    'dulieubophan'=>$this->model('congviec_m')->laybophancuask($maSuKien),
                    'dulieucongviec'=>$this->model('congviec_m')->laycongvieccuask($maSuKien, ''),
                    'dulieuphancong'=>$this->model('congviec_m')->layphanviec($maSuKien, '', '', '', 'Chờ duyệt')
                ]);
        }

        function duyetphancong($maSuKien, $maPhanCong){
            if(isset($_POST['btnDuyet'])){
                $vaiTro = $_POST['txtVaiTro'];
                $ghiChu = $_POST['txtGhiChu'];
                
                $result = $this->model('congviec_m')->capnhatphancong($maPhanCong, $vaiTro, $ghiChu, 'Đã giao');
                if($result){
                    echo "<script>alert('Duyệt phân công công việc thành công.');</script>";
                }else{
                    echo "<script>alert('Duyệt phân công công việc thất bại.');</script>";
                }
                $this->danhsachdangky($maSuKien);
            }
        }

        function capnhatphancong($maSuKien, $maPhanCong){
            if(isset($_POST['btnSua'])){

                $vaiTro = $_POST['txtVT'];
                $ghiChu = $_POST['txtGC'];
                
                $result = $this->model('congviec_m')->capnhatphancong($maPhanCong, $vaiTro, $ghiChu, 'Đã giao');
                if($result){
                    echo "<script>alert('Cập nhật phân công công việc thành công.');</script>";
                }else{
                    echo "<script>alert('Cập nhật phân công công việc thất bại.');</script>";
                }
                $this->chitiet($maSuKien);
            }
        }

        function xoaphancong($maSuKien, $maPhanCong){
            $result = $this->model('congviec_m')->xoaphancong($maPhanCong);
            if($result){
                echo "<script>alert('Xóa phân công công việc thành công.');</script>";
            }else{
                echo "<script>alert('Xóa phân công công việc thất bại.');</script>";
            }
            $this->chitiet($maSuKien);
        }

        function xoacongviec($maSuKien, $maCongViec){
            $result = $this->model('congviec_m')->xoacongviec($maCongViec);
            if($result){
                echo "<script>alert('Xóa công việc thành công.');</script>";
            }else{
                echo "<script>alert('Xóa công việc thất bại.');</script>";
            }
            $this->chitiet($maSuKien);
        }

        function xoasukien($maSuKien){
            $result = $this->model('sukien_m')->xoasukien($maSuKien);
            if($result){
                echo "<script>alert('Xóa sự kiện thành công.');</script>";
            }else{
                echo "<script>alert('Xóa sự kiện thất bại.');</script>";
            }
            $this->Get_data();
        }

    }
?>