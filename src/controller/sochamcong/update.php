<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['manvcc_edit']) && isset($_GET['ngaydilam_edit']) && isset($_GET['calam_edit'])) {
        $sql = "SELECT * FROM `sochamcong` WHERE MANV='$manvcc_edit' AND NGAYDILAM='$ngaydilam_edit' AND CALAM='$calam_edit'";
        $result = mysqli_query($con,$sql);
        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
        echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = 'Invalidd or data not found';
    }
    extract($_POST);
    if(isset($_POST['sochamcong_hidden_data'])){
        $sql = "UPDATE `sochamcong` SET MANV='$manvcc_update', NGAYDILAM='$ngaydilam_update',CALAM='$calam_update' WHERE MANV='$get_manvcc' AND NGAYDILAM='$get_ngaydilam' AND CALAM='$get_calam'";
        $result = mysqli_query($con,$sql);
    }
?>