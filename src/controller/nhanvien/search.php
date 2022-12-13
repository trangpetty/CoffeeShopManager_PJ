<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['search_input'])){
        $input = $_POST['search_input'];
        $sql = "SELECT * FROM `nhanvien` WHERE MANV LIKE '{$input}%' OR HONV LIKE '{$input}%' OR TENNV LIKE '{$input}%' OR CHUCVU LIKE '{$input}%'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '
            <div id="nhanvien-result_search">
            <table class="table table-bordered table-striped w-75 float-end">
                <thead>
                    <tr>
                        <td>Ma NV</td>
                        <td>Ho ten NV</td>
                        <td>Gioi tinh</td>
                        <td>So DT</td>
                        <td>Chuc vu</td>
                        <td>
                            Luong ca
                            <div class="btn btn-dark float-end" id="nhanvien-btn_hide"><i class="fa-solid fa-caret-up"></i></div>    
                        </td>
                    </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                if($row['GIOITINH']) $sex = 'Nam';
                else $sex = 'Nu';
                echo '<tr>
                        <td>'.$row['MANV'].'</td>
                        <td>'.$row['HONV'].' '.$row['TENNV'].'</td>
                        <td>'.$sex.'</td>
                        <td>'.$row['DIENTHOAI'].'</td>
                        <td>'.$row['CHUCVU'].'</td>
                        <td>'.$row['LUONGCA'].'</td>
                      </tr>';
            }
            echo "</tbody>
                  </table>
                  </div>
                    <script>
                        $(document).on('click','#nhanvien-btn_hide',function(){
                            $('#nhanvien-search_input').val('');
                            $('#nhanvien-result_search').hide();
                            $('#nhanvien-table_show').show();
                        })
                    </script>";
        }  else {
            echo "<h5 class='text-danger text-center'>No data found</h5>";
        }
    }
?>
