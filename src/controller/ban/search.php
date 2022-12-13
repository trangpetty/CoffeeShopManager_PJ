<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['search_input'])){
        $input = $_POST['search_input'];
        $sql = "SELECT * FROM `ban` WHERE KHUVUC LIKE '{$input}%' OR MABAN LIKE '{$input}%' OR PHUTHU LIKE '{$input}%'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){

            echo '
            <div id="ban-result_search">
            <table class="table table-bordered table-striped w-50 float-end">
                <thead>
                    <tr>
                        <td>Ma ban</td>
                        <td>Khu vuc</td>
                        <td>
                            Phu thu
                            <div class="btn btn-dark float-end" id="ban-btn_hide"><i class="fa-solid fa-caret-up"></i></div>    
                        </td>
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
            echo "</tbody>
                  </table>
                  </div>
                    <script>
                        $(document).on('click','#ban-btn_hide',function(){
                            $('#ban-search_input').val('');
                            $('#ban-result_search').hide();                            
                            $('#showDataTable').show();
                        })
                    </script>";
        }  else {
            echo "<h5 class='text-danger text-center'>No data found</h5>";
        }
    }
?>
