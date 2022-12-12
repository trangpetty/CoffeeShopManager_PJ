<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['maban_delete'])){
        $unique = $_POST['maban_delete'];
        echo $unique;
        $sql = "DELETE FROM `ban` WHERE MABAN='$unique'";
        $result = mysqli_query($con,$sql);
    }
?>