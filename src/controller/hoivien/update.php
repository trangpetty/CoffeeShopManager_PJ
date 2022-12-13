<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['sothe_edit'])) {
        $sothe = $_GET['sothe_edit'];
        $sql = "SELECT * FROM `hoivien` WHERE SOTHE='$sothe'";
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

    if(isset($_POST['hoivien_hidden_data'])){
        $sothe_update = $_POST['hoivien_hidden_data'];
        $tenhv_update = $_POST['tenhv_update'];
        $ngaysinhhv_update = $_POST['ngaysinhhv_update'];
        $diachi_update = $_POST['diachi_update'];
        $sdt_update = $_POST['sdt_update'];
        $scccd_update = $_POST['scccd_update'];
        $diemtl_update = $_POST['diemtl_update'];
        $loaihv_update = $_POST['loaihv_update'];

        $sql = "UPDATE `hoivien` SET TENHV='$tenhv_update',NGAYSINH='$ngaysinhhv_update',DIACHI='$diachi_update',DIENTHOAI='$sdt_update',SOCCCD='$scccd_update',DIEMTL='$diemtl_update',LOAIHV='$loaihv_update' WHERE SOTHE='$sothe_update'";
        $result = mysqli_query($con,$sql);
    }
?>