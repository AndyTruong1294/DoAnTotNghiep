<?php 
    class DangKy extends controller{
        function Get_data(){
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['maSinhVien'])){
                unset($_SESSION['maSinhVien']);
            }
            if(isset($_SESSION['maDonVi'])){
                unset($_SESSION['maDonVi']);
            }
            $this->view('DangKy_v');
        }


// Đơn vị tổ chức sự kiện
        function donvi_dangky(){
            $this->view('Donvi_DangKy_v');
        }
        function donvi_taotaikhoan(){
            if(isset($_POST['btnDangkyDV'])){
                $tenDonViToChuc = $_POST['txtTendonvi'];
                $moTa = $_POST['txtMota'];
                $tenDangNhap = $_POST['txtTendangnhapDV'];
                $matKhau = $_POST['txtMatkhauDV'];

                $trungten=$this->model("taikhoan_m")->DVtrungTen($tenDonViToChuc);
                $trungtdn=$this->model("taikhoan_m")->DVtrungTDN($tenDangNhap);
                if($trungten){
                    echo "<script>alert('Tên đơn vị tổ chức đã tồn tại!');</script>";
                    $this->view('DonVi_DangKy_v');
                }
                else if($trungtdn){
                    echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
                    $this->view('DonVi_DangKy_v');
                }
                else{
                    $taikhoanModel = $this->model("taikhoan_m");
                    $result = $taikhoanModel->dangkyDV($tenDonViToChuc, $moTa, $tenDangNhap, $matKhau);
                    if($result){
                        $maDVTC = $result; // Lấy ID của đơn vị tổ chức vừa được tạo
                        echo "<script>alert('Đăng ký thành công, ID của đơn vị là: $maDVTC.');</script>";
                        $_SESSION['maDonVi'] = $maDVTC; // Lưu ID vào session
                        $this->view('MasterLayout',[
                            'page'=>'DonVi_TrangChu_v'
                        ]);
                    } else {
                        echo "<script>alert('Đăng ký thất bại! Vui lòng thử lại.');</script>";
                        $this->view('DonVi_DangKy_v');
                    }
                }
            }
        }

//Sinh viên
        function sinhvien_dangky(){
            $this->view('SinhVien_DangKy_v');
        }
        function sinhvien_taotaikhoan(){
            if(isset($_POST['btnDangkySV'])){
                $maSinhVien = $_POST['txtMasv'];
                $hoTen = $_POST['txtHoten'];
                $ngaySinh = $_POST['txtNgaysinh'];
                $gioiTinh = $_POST['txtGioitinh'];
                $soDienThoai = $_POST['txtSodienthoai'];
                $email = $_POST['txtEmail'];
                $tenDangNhap = $_POST['txtTendangnhap'];
                $matKhau = $_POST['txtMatkhau'];
                
                $trungma=$this->model("taikhoan_m")->SVtrungMa($maSinhVien);
                $trungsdt=$this->model("taikhoan_m")->SVtrungSDT($soDienThoai);
                $trungemail=$this->model("taikhoan_m")->SVtrungEmail($email);
                $trungtdn=$this->model("taikhoan_m")->SVtrungTDN($tenDangNhap);
                if($trungma){
                    echo "<script>alert('Mã sinh viên đã tồn tại!');</script>";
                    $this->view('SinhVien_DangKy_v');
                }
                else if($trungsdt>0){
                    echo "<script>alert('Số điện thoại đã tồn tại!');</script>";
                    $this->view('SinhVien_DangKy_v');
                }
                else if($trungemail>0){
                    echo "<script>alert('Email đã tồn tại!');</script>";
                    $this->view('SinhVien_DangKy_v');
                }
                else if($trungtdn>0){
                    echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
                    $this->view('SinhVien_DangKy_v');
                }
                else{
                    $taikhoanModel = $this->model("taikhoan_m");
                    if($taikhoanModel->dangkySV($maSinhVien, $hoTen, $ngaySinh, $gioiTinh, $soDienThoai, $email, $tenDangNhap, $matKhau)){
                        echo "<script>alert('Đăng ký thành công!');</script>";
                        $_SESSION['maSinhVien'] = $maSinhVien; // Lưu mã sinh viên vào session
                        $this->view('MasterLayout',[
                            'page'=>'SinhVien_TrangChu_v'
                        ]);
                    } else {
                        echo "<script>alert('Đăng ký thất bại! Vui lòng thử lại.');</script>";
                        $this->view('SinhVien_DangKy_v');
                    }
                }
            }
        }
    }
?>