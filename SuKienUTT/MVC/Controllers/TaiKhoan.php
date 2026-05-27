<?php
    class TaiKhoan extends controller{
        function Get_data(){
            if(!isset($_SESSION['maSinhVien'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_TaiKhoan_v',
                'dulieu'=>$this->model('taikhoan_m')->thongtinsinhvien($_SESSION['maSinhVien'])
            ]);
        }
    }
?>