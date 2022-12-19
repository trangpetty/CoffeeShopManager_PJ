<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['maban_edit'])) {
        $maban = $_GET['maban_edit'];
        $sql = "SELECT * FROM `ban` WHERE MABAN='$maban'";
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

    if(isset($_POST['ban_hidden_data'])){
        $maban_update = $_POST['ban_hidden_data'];
        $khuvuc_update= $_POST['khuvuc_update'];
        $phuthu_update= $_POST['phuthu_update'];

        $sql = "UPDATE `ban` SET KHUVUC='$khuvuc_update', PHUTHU='$phuthu_update', TRANGTHAI='$trangthai' WHERE MABAN='$maban_update'";
        $result = mysqli_query($con,$sql);
    }
?>