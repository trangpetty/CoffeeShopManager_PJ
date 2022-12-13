<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['search_input'])){
        $input = $_POST['search_input'];
        $sql = "SELECT * FROM `sanpham` WHERE MASP LIKE '{$input}%' OR TENSP LIKE '{$input}%' OR GIA LIKE '{$input}%' OR SIZE LIKE '{$input}%' OR NHOMLOAI LIKE '{$input}%'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '
            <div id="sanpham-result_search">
                <table class="table table-bordered table-striped w-75 float-end">
                    <thead>
                        <tr>
                            <td>Ma san pham</td>
                            <td>Ten san pham</td>
                            <td>Gia</td>
                            <td>Size</td>
                            <td>
                                Nhom loai
                                <div class="btn btn-dark float-end" id="sanpham-btn_hide"><i class="fa-solid fa-caret-up"></i></div>    
                            </td>
                        </tr>
                    </thead>
                    <tbody>
            ';
            while($row = mysqli_fetch_assoc($result)){
                echo '<tr>
                        <td>'.$row['MASP'].'</td>
                        <td>'.$row['TENSP'].'</td>
                        <td>'.$row['GIA'].'</td>
                        <td>'.$row['SIZE'].'</td>
                        <td>'.$row['NHOMLOAI'].'</td>
                      </tr>';
            }
            echo "</tbody>
                  </table>
                    </div>
                    <script>
                        $(document).on('click','#sanpham-btn_hide',function(){
                            $('#sanpham-search_input').val('');
                            $('#sanpham-result_search').hide();
                            $('#sanpham-table_show').show();
                        })
                </script>";
        }  else {
            echo "<h5 class='text-danger text-center'>No data found</h5>";
        }
    }
?>
