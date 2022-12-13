<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['masp']) && isset($_POST['tensp']) && isset($_POST['gia']) && isset($_POST['size']) && isset($_POST['nhomloai'])) {
        $sql = "INSERT INTO `sanpham` VALUES('$masp','$tensp','$gia','$size','$nhomloai')";
        $result = mysqli_query($con, $sql);
    }
?>