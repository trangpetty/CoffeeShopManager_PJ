<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['ban'])){
        $table = '
            <table class="table mx-auto" id="ban-table">
              <thead class="table-dark">
                <tr>
                    <td>Ma ban</td>
                    <td>Khu vuc</td>
                    <td>Phu thu</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `ban`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $maban = $row['MABAN'];
            $table .= '
                <tr>
                    <td>'.$row['MABAN'].'</td>
                    <td>'.$row['KHUVUC'].'</td>
                    <td>'.$row['PHUTHU'].'</td>
                    <td>
                        <button class="btn btn-dark btn-edit" id="'.$row['MABAN'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['MABAN'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }
?>

