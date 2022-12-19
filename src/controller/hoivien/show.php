<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['hoivien'])){
        $table = '
            <table class="table mx-auto" id="hoivien-table">
              <thead class="text-white bg-brown">
                <tr>
                    <td>So the</td>
                    <td>Ten hoi vien</td>
                    <td>Ngay sinh</td>
                    <td>Dia chi</td>
                    <td>So dien thoai</td>
                    <td>So CCCD</td>
                    <td>Diem TL</td>
                    <td>Loai HV</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `hoivien`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $table .= '
                <tr>
                    <td>'.$row['SOTHE'].'</td>
                    <td>'.$row['TENHV'].'</td>
                    <td>'.$row['NGAYSINH'].'</td>
                    <td>'.$row['DIACHI'].'</td>
                    <td>'.$row['DIENTHOAI'].'</td>
                    <td>'.$row['SOCCCD'].'</td>
                    <td>'.$row['DIEMTL'].'</td>
                    <td>'.$row['LOAIHV'].'</td>
                    <td>
                        <button class="btn btn-dark btn-edit bg-brown" id="'.$row['SOTHE'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['SOTHE'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }
?>

