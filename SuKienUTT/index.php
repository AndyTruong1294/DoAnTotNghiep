<?php 
    session_start();
    include_once './MVC/bridge.php';
    $myapp=new app();
    // Thiết lập múi giờ Việt Nam cho PHP
    date_default_timezone_set('Asia/Ho_Chi_Minh');
?>