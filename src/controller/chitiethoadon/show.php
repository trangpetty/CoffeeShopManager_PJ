<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['cthd'])) {
        $mahd = trim($_GET['cthd']);
        $sql = "SELECT * FROM chitiethoadon_banhang WHERE MAHD='$mahd'";
        $result = mysqli_query($con,$sql);
        $showdata = '                  
            <table class="table mx-auto" id="cthd-table">
              <thead class="bg-brown text-white">
                <tr>
                    <td>Ma SP</td>
                    <td>So Luong</td>
                    <td>Gia</td>
                    <td>Actions</td>
                </tr>
              </thead>
            ';
        while ($row = mysqli_fetch_assoc($result)) {
            $showdata .= '
                    <tr>
                        <td>'.$row['MASP'].'</td>
                        <td>'.$row['SOLUONG'].'</td>
                        <td>'.$row['DONGIA'].'</td>
                        <td>
                            <button class="btn btn-dark bg-brown btn-edit" id="'.$row['MASP'].'""><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="btn btn-danger btn-delete" id="'.$row['MASP'].'""><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                ';
        }
        $showdata .= '</table>';
        echo $showdata;
    }

    if(isset($_GET['get_masp'])){
        $select = '<option selected>Chon san pham</option>';
        $sql = "SELECT MASP FROM `sanpham`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $masp = $row['MASP'];
            $select .= '<option value="'.$masp.'">'.$masp.'</option>';
        }
        echo $select;
    }

//    if(isset($_GET['get_masp'])){
//        $select = '<option selected>Chon san pham</option>';
//        $sql = "SELECT MASP FROM `sanpham`";
//        $result = mysqli_query($con,$sql);
//        while ($row = mysqli_fetch_assoc($result)) {
//            $masp = $row['MASP'];
//            $select .= '<option value="'.$masp.'">'.$masp.'</option>';
//        }
//        echo $select;
//    }
?>

