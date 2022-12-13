<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['manv_delete'])){
        $unique = $_POST['manv_delete'];
        echo $unique;
        $sql = "DELETE FROM `nhanvien` WHERE MANV='$unique'";
        $result = mysqli_query($con,$sql);
    }
?>