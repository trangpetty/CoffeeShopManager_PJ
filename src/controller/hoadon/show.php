<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['hoadon'])){
        $table = '
            <table class="table mx-auto" id="hoadon-table">
              <thead class="bg-brown text-white">
                <tr>
                    <td>Ma HD</td>
                    <td>Ma NV</td>
                    <td>Hoi Vien</td>
                    <td>Ngay lap HD</td>
                    <td>Gio lap HD</td>
                    <td>Giam</td>
                    <td>Ma KM</td>
                    <td>Ma Ban</td>
                    <td>Chu thich</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `hoadonbanhang`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $mahd = $row['MAHD'];
            $table .= '
                <tr>
                    <td>'.$row['MAHD'].'</td>
                    <td>'.$row['MANV'].'</td>
                    <td>'.$row['SOTHE'].'</td>
                    <td>'.$row['NGAYLAPHD'].'</td>
                    <td>'.$row['GIOLAPHD'].'</td>
                    <td>'.$row['GIAMGIA'].'</td>
                    <td>'.$row['MAKM'].'</td>
                    <td>'.$row['MABAN'].'</td>
                    <td>'.$row['chuthich'].'</td>
                    <td>
                        <a href="../../view/chitiethoadon/index.php?id='.$mahd.'" class="btn btn-info btn-detail" id="'.$row['MANV'].'"><i class="fa-solid fa-circle-info text-white"></i></a>
                        <button class="btn btn-dark bg-brown btn-edit" id="'.$row['MAHD'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['MAHD'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }
?>

