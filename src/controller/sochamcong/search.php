<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['search_input'])){
        $input = $_POST['search_input'];
        $sql = "SELECT * FROM `sochamcong` WHERE MANV LIKE '{$input}%' OR CALAM LIKE '{$input}%' OR NGAYDILAM LIKE '{$input}%'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '<table class="table table-bordered table-striped float-end w-50">
                <thead>
                    <tr>
                        <td>Ma NV</td>
                        <td>Ngay di lam</td>
                        <td>Ca lam</td>
                    </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                echo '<tr>
                        <td>'.$row['MANV'].'</td>
                        <td>'.$row['NGAYDILAM'].'</td>
                        <td>'.$row['CALAM'].'</td>
                      </tr>';
            }
            echo '</tbody>
                  </table>';
        }  else {
            echo "<h5 class='text-danger text-center'>No data found</h5>";
        }
    }
?>
