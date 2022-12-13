<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['makm_delete'])){
        $unique = $_POST['makm_delete'];
        echo $unique;
        $sql = "DELETE FROM `khuyenmai` WHERE MAKM='$unique'";
        $result = mysqli_query($con,$sql);
    }
?>