<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['manv']) && isset($_POST['honv']) && isset($_POST['tennv']) && isset($_POST['gioitinh']) && isset($_POST['ngaysinh']) && isset($_POST['diachi']) && isset($_POST['chucvu']) && isset($_POST['luongca']) && isset($_POST['dienthoai']) && isset($_POST['scccd'])) {
        $sql = "INSERT INTO `nhanvien` VALUES('$manv','$honv','$tennv','gioitinh','$ngaysinh','$noisinh','$diachi','$dienthoai','$nbddl','$scccd','$chucvu','$luongca')";
        $result = mysqli_query($con, $sql);
    }
?>