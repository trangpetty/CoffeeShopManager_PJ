<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['sanpham'])){
        $table = '
            <table class="table mx-auto" id="sanpham-table">
              <thead class="text-white bg-brown">
                <tr>
                    <td>Ma san pham</td>
                    <td>Ten san pham</td>
                    <td>Gia</td>
                    <td>Size</td>
                    <td>Nhom loai</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `sanpham`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $masp = $row['MASP'];
            $table .= '
                <tr>
                    <td>'.$row['MASP'].'</td>
                    <td>'.$row['TENSP'].'</td>
                    <td>'.$row['GIA'].'</td>
                    <td>'.$row['SIZE'].'</td>
                    <td>'.$row['NHOMLOAI'].'</td>
                    <td>
                        <button class="btn btn-dark bg-brown btn-edit" id="'.$row['MASP'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['MASP'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }
?>

