<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['sothe_delete'])){
        $unique = $_POST['sothe_delete'];
        echo $unique;
        $sql = "DELETE FROM `hoivien` WHERE SOTHE='$unique'";
        $result = mysqli_query($con,$sql);
    }
?>