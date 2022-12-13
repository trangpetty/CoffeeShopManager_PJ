<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['sothe']) && isset($_POST['tenhv']) && isset($_POST['ngaysinh'])) {
        $sql = "INSERT INTO `hoivien` VALUES('$sothe','$tenhv','$ngaysinh','$diachi','$sdt','$scccd','$diemtl','$loaihv')";
        $result = mysqli_query($con, $sql);
    }
?>