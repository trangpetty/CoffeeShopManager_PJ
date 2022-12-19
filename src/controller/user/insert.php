<?php
    include '../../configuration/connect.php';
    extract($_POST);

    if(isset($_POST['manv_user_insert'])) {
        $giamgia_add = 0;
        $sql = "SELECT GIATRI FROM `khuyenmai` WHERE MAKM='$makm_user_insert'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $giamgia_add += $row['GIATRI'];
        }
        $sql = "SELECT LOAIHV FROM `hoivien` WHERE SOTHE='$sothe_user_insert'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $loaihv = $row['LOAIHV'];
        }
        if($loaihv == 'VIP1')   $giamgia_add += 5;
        elseif ($loaihv == 'VIP2') $giamgia_add += 10;
        elseif ($loaihv == 'VIP3') $giamgia_add += 15;
        else $giamgia_add = $giamgia_add;
        $sql = "INSERT INTO `hoadonbanhang` (MANV,SOTHE,GIAMGIA,MAKM,MABAN,CHUTHICH) VALUES('$manv_user_insert','$sothe_user_insert','$giamgia_add','$makm_user_insert','$maban_user_insert','$chuthich_user_insert')";
        $result = mysqli_query($con, $sql);

    //        $sql = "UPDATE `hoadonbanhang` SET GIAMGIA='$giamgia_add' WHERE MAHD='$mahd'";
    //        $result = mysqli_query($con, $sql);
    }
?>