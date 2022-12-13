<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['masp_delete'])){
        $unique = $_POST['masp_delete'];
        echo $unique;
        $sql = "DELETE FROM `sanpham` WHERE MASP='$unique'";
        $result = mysqli_query($con,$sql);
    }
?>