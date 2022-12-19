<?php
    include '../../configuration/connect.php';
    extract($_POST);

    if(isset($_POST['maspcthd']) && isset($_POST['soluong']) && isset($_POST['dongia'])) {
        $sql = "INSERT INTO `chitiethoadon_banhang` VALUES('$mahd','$maspcthd','$soluong','$dongia')";
        $result = mysqli_query($con, $sql);
    }
?>