<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['manvcc_del']) && isset($_POST['ngaydilam_del']) && isset($_POST['calam_del'])){
        $sql = "DELETE FROM `sochamcong` WHERE MANV='$manvcc_del' AND NGAYDILAM='$ngaydilam_del' AND CALAM='$calam_del'";
        $result = mysqli_query($con,$sql);
    }
?>