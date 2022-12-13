<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['masp_edit'])) {
        $masp = $_GET['masp_edit'];
        $sql = "SELECT * FROM `sanpham` WHERE MASP='$masp'";
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

    if(isset($_POST['sanpham_hidden_data'])){
        $masp_update = $_POST['sanpham_hidden_data'];
        $tensp_update= $_POST['tensp_update'];
        $gia_update= $_POST['gia_update'];
        $size_update = $_POST['size_update'];
        $nhomloai_update = $_POST['nhomloai_update'];

        $sql = "UPDATE `sanpham` SET TENSP='$tensp_update', GIA='$gia_update', SIZE='$size_update', NHOMLOAI='$nhomloai_update' WHERE MASP='$masp_update'";
        $result = mysqli_query($con,$sql);
    }
?>