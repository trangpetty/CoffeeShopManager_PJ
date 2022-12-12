<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['maban']) && isset($_POST['khuvuc']) && isset($_POST['phuthu'])) {
        $sql = "INSERT INTO `ban` (MABAN,KHUVUC,PHUTHU) VALUES('$maban','$khuvuc','$phuthu')";
        $result = mysqli_query($con, $sql);
    }
?>