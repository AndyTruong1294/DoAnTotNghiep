<?php 
    class DangNhap extends controller{
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
            $this->view('DangNhap_v');
        }
        function xuly(){
            if(isset($_POST['btnDangnhap']))
            {
                // Process login logic here
                $vaiTro = $_POST['radVaitro'];
                $tenDangNhap = $_POST['txtTendangnhap'];
                $matKhau = $_POST['txtMatkhau'];

                if($vaiTro == 'Sinh viên'){
                    $check = $this->model('taikhoan_m')->dangnhapSV($tenDangNhap, $matKhau);
                    if(!$check){
                        echo '<script>alert("Vui lòng kiểm tra lại thông tin đăng nhập!")</script>';
                        $this->view('DangNhap_v');
                    }
                    else{
                        $_SESSION['maSinhVien'] = $check;
                        $this->view('SinhVien_MasterLayout',[
                            'page'=>'SinhVien_TrangChu_v'
                        ]);
                        exit();
                    }
                } else if($vaiTro == 'Đơn vị'){
                    $check = $this->model('taikhoan_m')->dangnhapDV($tenDangNhap, $matKhau);
                    if(!$check){
                        echo '<script>alert("Vui lòng kiểm tra lại thông tin đăng nhập!")</script>';
                        $this->view('DangNhap_v');
                    }
                    else{
                        $_SESSION['maDonVi'] = $check;
                        $this->view('DonVi_MasterLayout',[
                            'page'=>'DonVi_TrangChu_v'
                        ]);
                        exit();
                    }
                }
            }
        }
    }
?>