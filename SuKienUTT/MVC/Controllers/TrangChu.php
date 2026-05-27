<?php 
    class TrangChu extends controller{
        function Get_data(){
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if(!isset($_SESSION['maSinhVien']) && !isset($_SESSION['maDonVi'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            if(isset($_SESSION['maDonVi'])){
                $this->view('DonVi_MasterLayout',[
                    'page'=>'DonVi_TrangChu_v'
                ]);
            }
            else if (isset($_SESSION['maSinhVien'])){
                $this->view('SinhVien_MasterLayout',[
                    'page'=>'SinhVien_TrangChu_v'
                ]);
            }
        }

    }
?>