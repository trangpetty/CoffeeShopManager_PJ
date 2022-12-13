<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['makm_edit'])) {
        $makm = $_GET['makm_edit'];
        $sql = "SELECT * FROM `khuyenmai` WHERE MAKM='$makm'";
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

    if(isset($_POST['khuyenmai_hidden_data'])){
        $makm_update = $_POST['khuyenmai_hidden_data'];
        $tenkm_update = $_POST['tenkm_update'];
        $tgap_update = $_POST['tgap_update'];
        $tgkt_update = $_POST['tgkt_update'];
        $giatri_update = $_POST['giatri_update'];

        $sql = "UPDATE `khuyenmai` SET TENKM='$tenkm_update', TGAPDUNG='$tgap_update', TGKETTHUC = '$tgkt_update', GIATRI='$giatri_update' WHERE MAKM='$makm_update'";
        $result = mysqli_query($con,$sql);
    }
?>