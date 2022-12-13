<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['manvcc']) && isset($_POST['ngaydilam']) && isset($_POST['calam'])) {
        $sql = "INSERT INTO `sochamcong` VALUES('$manvcc','$ngaydilam','$calam')";
        $result = mysqli_query($con, $sql);
    }
?>