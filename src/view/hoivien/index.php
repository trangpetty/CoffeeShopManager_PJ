<?php 
    include '../layout/header.php';
    include 'add.php';
    include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center text-brown">HOI VIEN</h1>
        <div class="d-flex my-2 justify-content-between">
            <button type="button" class="btn btn-dark bg-brown" data-bs-toggle="modal" data-bs-target="#hoivien-modal_add">
                <i class="fas fa-circle-plus"></i>
                Add
            </button>
            <div class="d-flex">
                <input type="text" class="form-control" id="hoivien-search_input" autocomplete="off" placeholder="Search">
                <button class="btn btn-dark bg-brown" id="hoivien-btn_search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="hoivien-search_result">

        </div>
        <div id="hoivien-table_show">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
            showData();
            $('#hoivien-btn_search').click(function (){
                let search_input = $('#hoivien-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/hoivien/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#hoivien-search_result').html(data);
                            $('#hoivien-table_show').hide();
                        }
                    })
                } else {
                    $('#hoivien-search_result').css('display','none');
                }
            })
        })
        function showData(){
            $.ajax({
                url: "../../controller/hoivien/show.php",
                type: "get",
                data: {
                    hoivien: "true"
                },
                success: function (data,status) {
                    $('#hoivien-table_show').html(data);
                }
            });
        }
        $('#hoivien-btn_add').on('click', function () {
            let sothe = $('#sothe_add').val();
            let tenhv = $('#tenhv_add').val();
            let ngaysinh = $('#ngaysinhhv_add').val();
            let diachi = $('#diachihv_add').val();
            let sdt = $('#sdthv_add').val();
            let scccd = $('#scccdhv_add').val();
            let diemtl = $('#diemtl_add').val();
            // let loaihv = $('#loaihv_add').val();

            $.ajax({
                url: "../../controller/hoivien/insert.php",
                type: "post",
                data: {
                    sothe :sothe,
                    tenhv: tenhv,
                    ngaysinh: ngaysinh,
                    diachi: diachi,
                    sdt: sdt,
                    scccd: scccd,
                    diemtl: diemtl,
                    // loaihv: loaihv
                },
                success: function (data, status){
                    $('#hoivien-modal_add').modal('hide');
                    $('#hoivien-form_add')[0].reset();
                    showData()
                    console.log(sothe + tenhv + ngaysinh + diachi + sdt )
                }
            });
        });

        $(document).on('click','.btn-delete',function() {
            let sothe_del = $(this).attr('id');
            let $ele = $(this).parent().parent();
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/hoivien/delete.php',
                    data: { sothe_delete: sothe_del},
                    success: function (data) {
                        showData()
                    }
                })
            }
        })

        $(document).on('click','.btn-edit',function() {
            let sothe_edit = $(this).attr('id');
            $.ajax({
                type: "post",
                url: '../../controller/hoivien/update.php',
                data: { sothe_edit: sothe_edit},
                success: function (data) {
                    $.get("../../controller/hoivien/update.php", {sothe_edit: sothe_edit}, function (data,status){
                        let hoivien = JSON.parse(data);
                        $('#hoivien-hidden-data').val(hoivien.SOTHE);
                        $('#sothe_edit').val(hoivien.SOTHE);
                        $('#tenhv_edit').val(hoivien.TENHV);
                        $('#ngaysinhhv_edit').val(hoivien.NGAYSINH);
                        $('#diachihv_edit').val(hoivien.DIACHI);
                        $('#sdthv_edit').val(hoivien.DIENTHOAI);
                        $('#scccdhv_edit').val(hoivien.SOCCCD);
                        $('#diemtl_edit').val(hoivien.DIEMTL);
                        // $('#loaihv_edit').val(hoivien.LOAIHV);
                    });
                }
            })
            $('#hoivien-modal_edit').modal("show");
        })

        $(document).on('click','#hoivien-btn_edit',function() {
            console.log(2)
            $.ajax({
                type: "post",
                url: '../../controller/hoivien/update.php',
                data: {
                    tenhv_update: $('#tenhv_edit').val(),
                    ngaysinhhv_update: $('#ngaysinhhv_edit').val(),
                    diachi_update: $('#diachihv_edit').val(),
                    sdt_update: $('#sdthv_edit').val(),
                    scccd_update: $('#scccdhv_edit').val(),
                    diemtl_update: $('#diemtl_edit').val(),
                    // loaihv_update: $('#loaihv_edit').val(),
                    hoivien_hidden_data: $('#hoivien-hidden-data').val()
                },
                success: function (data) {
                    $('#hoivien-modal_edit').modal('hide');
                    showData();
                }
            })
        })

    </script>
<?php include '../layout/footer.php'; ?>