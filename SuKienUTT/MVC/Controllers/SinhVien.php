<?php
    class SinhVien extends controller{
        function Get_data(){
            if(!isset($_SESSION['maSinhVien'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_TrangChu_v'
            ]);
        }

        function taikhoan(){
            if(!isset($_SESSION['maSinhVien'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_TaiKhoan_v',
                'dulieu'=>$this->model('taikhoan_m')->thongtinsinhvien($_SESSION['maSinhVien'])
            ]);
        }

        function thongtinsukien($maSuKien){
            if(!isset($_SESSION['maSinhVien'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_ThongTinSuKien_v',
                'thongtinsukien'=>$this->model('sukien_m')->laysukientheoma($maSuKien)
            ]);
        }

        function timkiem(){
            if(isset($_POST['btnTimKiem'])){
                $tensukien = $_POST['txtTenSuKien'];
                $ngay = $_POST['txtNgay'];
                $tenDonVi = $_POST['txtTenDonVi'];

                $this->view('SinhVien_MasterLayout',[
                    'page'=>'SinhVien_SuKien_v',
                    'danhsachsukien'=>$this->model('sukien_m')->sinhviensukien($tenDonVi, $tensukien, $ngay),
                    'tensukien'=>$tensukien,
                    'ngay'=>$ngay,
                    'tendonvi'=>$tenDonVi
                ]);
            }
        }

        function dangky($maSuKien){
            if(isset($_POST['btnDangKy'])){
                $maSinhVien = $_SESSION['maSinhVien'];

                $check = $this->model('checkin_m')->checkdangky($maSuKien, $maSinhVien);
                if($check){
                    echo "<script>alert('Bạn đã đăng ký tham gia sự kiện này rồi!');</script>";
                }else{
                   if($this->model('checkin_m')->dangkycheckin($maSuKien, $maSinhVien, 'Đăng ký trước', '')){
                        echo "<script>alert('Đăng ký tham gia sự kiện thành công!');</script>";
                    } else {
                        echo "<script>alert('Đăng ký tham gia sự kiện thất bại!');</script>";
                    } 
                }
                $this->thongtinsukien($maSuKien);
            }
        }

        function hoatdong(){
            if(!isset($_SESSION['maSinhVien'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_HoatDong_v',
                'danhsachdonvi'=>$this->model('taikhoan_m')->donvithamgia($_SESSION['maSinhVien'])
            ]);
        }
        
        function capnhat(){
            if(isset($_POST['btnCapNhat'])){
                $maSinhVien = $_POST['txtMaSV'];
                $hoTen = $_POST['txtHoTen'];
                $ngaySinh = $_POST['txtNgaySinh'];
                $gioiTinh = $_POST['txtGioitinh'];
                $soDienThoai = $_POST['txtSoDienThoai'];
                $email = $_POST['txtEmail'];
                $tenDangNhap = $_POST['txtTenDangNhap'];
                $matKhau = $_POST['txtMatKhau'];

                $checkTDN = $this->model('taikhoan_m')->SVtrungTDN($tenDangNhap);
                $checkSDT = $this->model('taikhoan_m')->SVtrungSDT($soDienThoai);
                $checkEmail = $this->model('taikhoan_m')->SVtrungEmail($email);

                if($checkTDN>1){
                    echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
                }
                else if($checkSDT>1){
                    echo "<script>alert('Số điện thoại đã tồn tại!');</script>";
                }
                else if($checkEmail>1){
                    echo "<script>alert('Email đã tồn tại!');</script>";
                }else{
                    if($this->model('taikhoan_m')->capnhatsinhvien($maSinhVien, $hoTen, $ngaySinh, $gioiTinh, $soDienThoai, $email, $tenDangNhap, $matKhau)){
                        echo "<script>alert('Cập nhật thông tin thành công!');</script>";
                    } else {
                        echo "<script>alert('Cập nhật thông tin thất bại!');</script>";
                    }
                }               

                $this->taikhoan();
            }
        }

        function danhsach($maDonViToChuc){
            if(!isset($_SESSION['maSinhVien'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_SuKienDonVi_v',
                'dulieu'=>$this->model('sukien_m')->timsukien($maDonViToChuc, '', ''),
                'maDonViToChuc'=>$maDonViToChuc
            ]);
        }

        function timkiemsukien($maDonViToChuc){
            if(isset($_POST['btnTimKiem'])){
                $tenSuKien = $_POST['txtTenSuKien'];
                $ngay = $_POST['txtNgay'];

                $this->view('SinhVien_MasterLayout',[
                    'page'=>'SinhVien_SuKienDonVi_v',
                    'dulieu'=>$this->model('sukien_m')->timsukien($maDonViToChuc, $tenSuKien, $ngay),
                    'maDonViToChuc'=>$maDonViToChuc,
                    'tensukien'=>$tenSuKien,
                    'ngay'=>$ngay
                ]);
            }
        }

        function chitietsukien($maSuKien){
            if(!isset($_SESSION['maSinhVien'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_ChiTietSuKien_v',
                'dulieu'=>$this->model('sukien_m')->laysukientheoma($maSuKien),
                'dulieubophan'=>$this->model('congviec_m')->laybophancuask($maSuKien),
                'dulieucongviec'=>$this->model('congviec_m')->laycongvieccuask($maSuKien, ''),
                'dulieuphancong'=>$this->model('congviec_m')->layphanviec($maSuKien, '', '', $_SESSION['maSinhVien'], '')
            ]);
        }

        function dangkycongviec($maSuKien, $maCongViec){
            $maSinhVien = $_SESSION['maSinhVien'];

            $check = $this->model('congviec_m')->danhanviec($maCongViec, $maSinhVien);
            if($check && mysqli_num_rows($check) > 0){
                echo "<script>alert('Bạn đã đăng ký công việc này rồi!');</script>";
            }else{
                $dangky = $this->model('congviec_m')->phanviec($maCongViec,$maSinhVien,'','', 'Chờ duyệt');

                if($dangky){
                    echo "<script>alert('Đăng ký công việc thành công!');</script>";
                } else {
                    echo "<script>alert('Đăng ký công việc thất bại!');</script>";
                }
            }
            $this->chitietsukien($maSuKien);        
        }
    }
?>