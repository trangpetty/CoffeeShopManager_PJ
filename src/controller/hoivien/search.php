<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['search_input'])){
        $input = $_POST['search_input'];
        $sql = "SELECT * FROM `hoivien` WHERE SOTHE LIKE '{$input}%' OR TENHV LIKE '{$input}%' OR LOAIHV LIKE '{$input}%' OR DIENTHOAI LIKE '{$input}%'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '
            <div id="hoivien-result_search">
            <table class="table table-bordered table-striped w-75 float-end">
                <thead>
                    <tr>
                        <td>So the</td>
                        <td>Ten hoi vien</td>
                        <td>So dien thoai</td>
                        <td>Diem TL</td>
                        <td>
                            Loai HV
                            <div class="btn btn-dark float-end" id="hoivien-btn_hide"><i class="fa-solid fa-caret-up"></i></div>    
                        </td>
                    </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                echo '<tr>
                        <td>'.$row['SOTHE'].'</td>
                        <td>'.$row['TENHV'].'</td>
                        <td>'.$row['DIENTHOAI'].'</td>
                        <td>'.$row['DIEMTL'].'</td>
                        <td>'.$row['LOAIHV'].'</td>
                      </tr>';
            }
            echo "</tbody>
                  </table>
                    </div>
                    <script>
                        $(document).on('click','#hoivien-btn_hide',function(){
                            $('#hoivien-search_input').val('');
                            $('#hoivien-result_search').hide();
                            $('#hoivien-table_show').show();
                        })
                </script>";
        }  else {
            echo "<h5 class='text-danger text-center'>No data found</h5>";
        }
    }
?>
