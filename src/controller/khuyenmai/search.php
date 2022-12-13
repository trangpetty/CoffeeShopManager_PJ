<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['search_input'])){
        $input = $_POST['search_input'];
        $sql = "SELECT * FROM `khuyenmai` WHERE MAKM LIKE '{$input}%'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '<table class="table table-bordered table-striped w-75 float-end">
                <thead>
                    <tr>
                        <td>Ma KM</td>
                        <td>Ten KM</td>
                        <td>Thoi gian ap dung</td>
                        <td>Thoi gian ket thuc</td>
                        <td>Gia tri</td>
                    </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                echo '<tr>
                        <td>'.$row['MAKM'].'</td>
                        <td>'.$row['TENKM'].'</td>
                        <td>'.$row['TGAPDUNG'].'</td>
                        <td>'.$row['TGKETTHUC'].'</td>
                        <td>'.$row['GIATRI'].'</td>
                      </tr>';
            }
            echo '</tbody>
                  </table>';
        }  else {
            echo "<h5 class='text-danger text-center'>No data found</h5>";
        }
    }
?>
