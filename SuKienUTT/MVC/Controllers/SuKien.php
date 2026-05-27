<?php
    class SuKien extends controller{
        function Get_data(){
            if(!isset($_SESSION['maSinhVien'])){
                header("Location: " . BASE_URL . "DangNhap");
                exit();
            }
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_SuKien_v',
                'danhsachsukien'=>$this->model('sukien_m')->timsukien('', '', '')
            ]);
        }

        function thongtinsukien($maSuKien){
            $this->view('SinhVien_MasterLayout',[
                'page'=>'SinhVien_SuKien_v',
                'thongtinsukien'=>$this->model('sukien_m')->laysukientheoma($maSuKien)
            ]);
        }

        function dangkytruoc(){
            
        }
    }
?>