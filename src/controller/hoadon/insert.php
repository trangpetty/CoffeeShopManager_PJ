<?php
    include '../../configuration/connect.php';
    extract($_POST);

    if(isset($_POST['manv_user_insert'])) {
        $sql = "INSERT INTO `hoadonbanhang` (MANV,SOTHE,GIAMGIA,MAKM,MABAN,CHUTHICH) VALUES('$manv_user_insert','$sothe_user_insert','$giamgia_user_insert','$makm_user_insert','$maban_user_insert','$chuthich_user_insert')";
        $result = mysqli_query($con, $sql);

//        $sql = "UPDATE `hoadonbanhang` SET GIAMGIA='$giamgia_add' WHERE MAHD='$mahd'";
//        $result = mysqli_query($con, $sql);
    }
?>