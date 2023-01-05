<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['mahdcthd_edit']) && isset($_GET['maspcthd_edit'])) {
        $sql = "SELECT * FROM `chitiethoadon_banhang` WHERE MAHD='$mahdcthd_edit' AND MASP='$maspcthd_edit'";
        $result = mysqli_query($con,$sql);
        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
        echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = 'Invalid or data not found';
    }
    extract($_POST);
    if(isset($_POST['mahdcthd_update']) && isset($_POST['maspcthd_update'])){
        $soluong_update = $_POST['soluong_update'];
        $dongia_update = $_POST['dongia_update'];
        echo $soluong_update;
        $sql = "UPDATE `chitiethoadon_banhang` SET SOLUONG='$soluong_update', DONGIA='$dongia_update' WHERE MAHD='$mahdcthd_update' AND MASP='$maspcthd_update'";
        $result = mysqli_query($con,$sql);
    }
?>