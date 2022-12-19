<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['sochamcong'])){
        $table = '
            <table class="table mx-auto" id="sochamcong-table">
              <thead class="text-white bg-brown">
                <tr>
                    <td>Ma NV</td>
                    <td>Ngay di lam</td>
                    <td>Ca lam</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `sochamcong`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $manv = $row['MANV'];
            $table .= '
                <tr>
                    <td>'.$row['MANV'].'</td>
                    <td>'.$row['NGAYDILAM'].'</td>
                    <td>'.$row['CALAM'].'</td>
                    <td>
                        <button class="btn btn-dark bg-brown btn-edit" id="'.$row['MANV'].':'.$row['NGAYDILAM'].':'.$row['CALAM'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['MANV'].':'.$row['NGAYDILAM'].':'.$row['CALAM'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }

    if(isset($_GET['get_manv'])){
        $select = '<option selected>Chon nhan vien</option>';
        $sql = "SELECT MANV FROM `nhanvien`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $manv = $row['MANV'];
            $select .= '<option value="'.$manv.'">'.$manv.'</option>';
        }
        echo $select;
    }
?>

