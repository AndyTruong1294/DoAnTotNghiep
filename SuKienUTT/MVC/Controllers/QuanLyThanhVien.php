<?php
    class QuanLyThanhVien extends controller{
        function Get_data(){
            if(!isset($_SESSION['maDonVi'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('DonVi_MasterLayout',[
                'page'=>'DonVi_QuanLyThanhVien_v',
                'dulieu'=>$this->model("thanhvien_m")->timthanhvien($_SESSION['maDonVi'], '', '', '', '', '', '')
            ]);
        }

        function timkiem(){
            if(isset($_POST['btnTimKiem'])){
                $maSinhVien = $_POST['txtMaSV'];
                $hoTen = $_POST['txtHoTen'];
                $vaiTro = $_POST['txtVaiTro'];
                $soDienThoai = $_POST['txtSDT'];
                $email = $_POST['txtEmail'];
                $trangThai = $_POST['txtTrangThai'];


                $this->view('DonVi_MasterLayout',[
                    'page'=>'DonVi_QuanLyThanhVien_v',
                    'dulieu'=>$this->model("thanhvien_m")->timthanhvien($_SESSION['maDonVi'], $maSinhVien, $hoTen, $vaiTro, $soDienThoai, $email, $trangThai),
                    'maSinhVien'=>$maSinhVien,
                    'hoTen'=>$hoTen,
                    'vaiTro'=>$vaiTro,
                    'soDienThoai'=>$soDienThoai,
                    'email'=>$email,
                    'trangThai'=>$trangThai
               ]);
            }
        }

        function them(){
            if(isset($_POST['btnThem'])){
                $maSinhVien = $_POST['txtMaSV'];
                $maDonViToChuc = $_POST['txtMaDV'];
                $vaiTro = $_POST['txtVaiTro'];
                $trangThai = $_POST['txtTrangThai'];

                $checkSV= $this->model("taikhoan_m")->SVtrungMa($maSinhVien);
                if(!$checkSV){
                    echo "<script>alert('Mã sinh viên không tồn tại!');</script>";
                    $this->view('DonVi_MasterLayout',[
                        'page'=>'DonVi_QuanLyThanhVien_v',
                    ]);
                    return;
                }else{
                    $checkDV = $this->model("thanhvien_m")->kiemtrathanhvien($maSinhVien, $maDonViToChuc);
                    if($checkDV){
                        echo "<script>alert('Thành viên đã tồn tại trong tổ chức!');</script>";
                    } else {
                        $result = $this->model("thanhvien_m")->themthanhvien($maSinhVien, $maDonViToChuc, $vaiTro, $trangThai);
                        if($result){
                            echo "<script>alert('Thêm thành viên thành công!');</script>";
                        } else {
                            echo "<script>alert('Thêm thành viên thất bại!');</script>";
                        }
                    }
                }
                $this->view('DonVi_MasterLayout',[
                    'page'=>'DonVi_QuanLyThanhVien_v',
                    'dulieu'=>$this->model("thanhvien_m")->timthanhvien($_SESSION['maDonVi'], '', '', '', '', '', '')
               ]);
            }
        }

        function capnhat(){
            if(isset($_POST['btnCapNhat'])){
                $maSinhVien = $_POST['txtMaSV'];
                $vaiTro = $_POST['txtVaiTro'];
                $trangThai = $_POST['txtTrangThai'];

                $result = $this->model("thanhvien_m")->capnhatthanhvien($maSinhVien, $_SESSION['maDonVi'], $vaiTro, $trangThai);
                if($result){
                    echo "<script>alert('Cập nhật thành viên thành công!');</script>";
                } else {
                    echo "<script>alert('Cập nhật thành viên thất bại!');</script>";
                }
            }
            $this->view('DonVi_MasterLayout',[
                'page'=>'DonVi_QuanLyThanhVien_v',
                'dulieu'=>$this->model("thanhvien_m")->timthanhvien($_SESSION['maDonVi'], '', '', '', '', '', '')
           ]);
        }
    }
?>