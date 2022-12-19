<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['khuyenmai'])){
        $table = '
            <table class="table mx-auto" id="khuyenmai-table">
              <thead class="text-white bg-brown">
                <tr>
                    <td>Ma KM</td>
                    <td>Ten KM</td>
                    <td>Thoi gian ap dung</td>
                    <td>Thoi gian ket thuc</td>
                    <td>Gia tri</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `khuyenmai`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $table .= '
                <tr>
                    <td>'.$row['MAKM'].'</td>
                    <td>'.$row['TENKM'].'</td>
                    <td>'.$row['TGAPDUNG'].'</td>
                    <td>'.$row['TGKETTHUC'].'</td>
                    <td>'.$row['GIATRI'].'</td>
                    <td>
                        <button class="btn btn-dark bg-brown btn-edit" id="'.$row['MAKM'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['MAKM'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }
?>

