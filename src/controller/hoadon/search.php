<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['search_input'])){
        $input = $_POST['search_input'];
        $sql = "SELECT * FROM `hoadonbanhang` WHERE MAHD LIKE '{$input}%' OR MANV LIKE '{$input}%' OR SOTHE LIKE '{$input}%' OR NGAYLAPHD LIKE '{$input}%' OR MAKM LIKE '{$input}%' OR MABAN LIKE '{$input}%'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '
                <div id="hoadon-result_search">
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>Ma HD</td>
                        <td>Ma NV</td>
                        <td>Hoi Vien</td>
                        <td>Ngay lap HD</td>
                        <td>Gio lap HD</td>
                        <td>Giam</td>
                        <td>Ma KM</td>
                        <td>Ma Ban</td>
                        <td>
                            Chu thich
                            <div class="btn btn-dark bg-brown float-end" id="hoadon-btn_hide"><i class="fa-solid fa-caret-up"></i></div>    
                        </td>
                    </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                echo '<tr>
                        <td>'.$row['MAHD'].'</td>
                        <td>'.$row['MANV'].'</td>
                        <td>'.$row['SOTHE'].'</td>
                        <td>'.$row['NGAYLAPHD'].'</td>
                        <td>'.$row['GIOLAPHD'].'</td>
                        <td>'.$row['GIAMGIA'].'</td>
                        <td>'.$row['MAKM'].'</td>
                        <td>'.$row['MABAN'].'</td>
                        <td>'.$row['chuthich'].'</td>
                      </tr>';
            }
            echo "</tbody>
                  </table>
                  </div>
                    <script>
                        $(document).on('click','#hoadon-btn_hide',function(){
                            $('#hoadon-search_input').val('');
                            $('#hoadon-result_search').hide();
                            $('#hoadon-table_show').show();
                        })
                    </script>";
        }  else {
            echo "<h5 class='text-danger text-center'>No data found</h5>";
        }
    }
?>
