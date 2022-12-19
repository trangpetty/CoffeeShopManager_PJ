<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['mahdcthd_del']) && isset($_POST['maspcthd_del'])){
        $sql = "DELETE FROM `chitiethoadon_banhang` WHERE MAHD='$mahdcthd_del' AND MASP='$maspcthd_del'";
        $result = mysqli_query($con,$sql);
    }
?>