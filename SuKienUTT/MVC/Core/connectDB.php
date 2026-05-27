<?php 
class connectDB{
    public $con;
    protected $server='localhost';
    protected $user='root';
    protected $pass='';
    protected $db='utt_events';
    function __construct(){
        $this->con=mysqli_connect($this->server,$this->user,$this->pass,$this->db);
        mysqli_query($this->con,"SET NAMES 'utf8'");
        if(!$this->con) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
        // Thêm dòng này ngay sau khi kết nối thành công
        mysqli_query($this->con, "SET time_zone = '+07:00';");
    }
}
?>