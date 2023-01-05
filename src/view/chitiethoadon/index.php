<?php
    include '../../configuration/connect.php';
    extract($_GET);
    include '../layout/header.php';
    include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center text-brown">CHI TIET HOA DON <?php echo $_GET['id']?></h1>
        <div class="d-flex my-2 align-items-center">
            <a href="../hoadon/index.php" class="me-3 link text-brown btn">
                <i class="fa-solid fa-chevron-left"></i>
                Back
            </a>
        </div>
        <div id="cthd-table_show">

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
            showData()

            $.ajax({
                url: "../../controller/chitiethoadon/show.php",
                type: "get",
                data: {
                    get_masp: "true"
                },
                success: function (data,status) {
                    $('#maspcthd_add').html(data);
                }
            });
        })

        function showData(){
            $.ajax({
                url: "../../controller/chitiethoadon/show.php",
                type: "get",
                data: {
                    cthd: <?php echo $_GET['id'] ?>
                },
                success: function (data,status) {
                    $('#cthd-table_show').html(data);
                }
            });
        }

        $(document).on('click','.btn-delete',function() {
            let maspcthd_del = $(this).attr('id');
            console.log(maspcthd_del)
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/chitiethoadon/delete.php',
                    data: {
                        mahdcthd_del: <?php echo $_GET['id']?>,
                        maspcthd_del: maspcthd_del
                    },
                    success: function (data) {
                        showData();
                    }
                })
            }
        })

        $(document).on('click','.btn-edit',function() {
            let maspcthd_edit = $(this).attr('id');
            $.ajax({
                type: "get",
                url: '../../controller/chitiethoadon/update.php',
                data: {
                    mahdcthd_edit: <?php echo $_GET['id']?>,
                    maspcthd_edit: maspcthd_edit
                },
                success: function (data) {
                    let cthd = JSON.parse(data);
                    $('#cthd-hidden-data').val(cthd.MASP);
                    $('#maspcthd_edit').val(cthd.MASP);
                    $('#soluong_edit').val(cthd.SOLUONG);
                    $('#dongia_edit').val(cthd.DONGIA);
                    $('#cthd-modal_edit').modal('show')
                }
            })
        })
        $(document).on('click','#cthd-btn_edit', function (){
            console.log(<?php echo $_GET['id']?> + ' ' + $('#maspcthd_edit').val() + ' ' + $('#soluong_edit').val() + ' '+ $('#dongia_edit').val())
            $.ajax({
                type: "post",
                url: '../../controller/chitiethoadon/update.php',
                data: {
                    mahdcthd_update: <?php echo $_GET['id']?>,
                    maspcthd_update: $('#maspcthd_edit').val(),
                    soluong_update: $('#soluong_edit').val(),
                    dongia_update: $('#dongia_edit').val(),
                },
                success: function () {
                    $('#cthd-modal_edit').modal('hide');
                    showData();
                }
            })
        })

    </script>
<?php include '../layout/footer.php'; ?>