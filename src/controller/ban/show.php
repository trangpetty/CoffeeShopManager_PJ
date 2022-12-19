<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['ban'])){
        $table = '
            <table class="table mx-auto" id="ban-table">
              <thead class="bg-brown text-white">
                <tr>
                    <td>Ma ban</td>
                    <td>Khu vuc</td>
                    <td>Phu thu</td>
                    <td>Trang Thai</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `ban`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $maban = $row['MABAN'];
            $trangthai = '';
            if($row['TRANGTHAI'] == 1){
                $trangthai = '<span class="text-success fw-bold">ON</span>';
            }   else $trangthai = '<span class="text-danger fw-bold">OFF</span>';
            $table .= '
                <tr>
                    <td>'.$row['MABAN'].'</td>
                    <td>'.$row['KHUVUC'].'</td>
                    <td>'.$row['PHUTHU'].'</td>
                    <td>'.$trangthai.'</td>
                    <td>
                        <button class="btn btn-dark btn-edit bg-brown" id="'.$row['MABAN'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['MABAN'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }
?>

