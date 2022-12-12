<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['search_input'])){
        $input = $_POST['search_input'];
        $sql = "SELECT * FROM `ban` WHERE KHUVUC LIKE '{$input}%'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '<table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>Ma ban</td>
                        <td>Khu vuc</td>
                        <td>Phu thu</td>
                    </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                echo '<tr>
                        <td>'.$row['MABAN'].'</td>
                        <td>'.$row['KHUVUC'].'</td>
                        <td>'.$row['PHUTHU'].'</td>
                      </tr>';
            }
            echo '</tbody>
                  </table>';
        }  else {
            echo "<h5 class='text-danger text-center'>No data found</h5>";
        }
    }
?>
