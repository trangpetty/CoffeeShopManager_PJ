<?php 
    include '../layout/header.php';
    include 'add.php';
    include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center">SANPHAM</h1>
        <div class="d-flex my-2 justify-content-between">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#sanpham-modal_add">
                <i class="fas fa-circle-plus"></i>
                Add
            </button>
            <div class="d-flex">
                <input type="text" class="form-control" id="sanpham-search_input" autocomplete="off" placeholder="Search">
                <button class="btn btn-dark" id="sanpham-btn_search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="sanpham-search_result">

        </div>
        <div id="sanpham-table_show">

        </div>
    </div>
    <script>
        $(document).ready(function (){
            showData();
            $('#sanpham-btn_search').click(function (){
                var search_input = $('#sanpham-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/sanpham/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#sanpham-search_result').html(data);
                            $('#sanpham-table_show').hide();
                        }
                    })
                } else {
                    $('#sanpham-search_result').css('display','none');
                }
            })
        })
        function showData(){
            $.ajax({
                url: "../../controller/sanpham/show.php",
                type: "get",
                data: {
                    sanpham: "true"
                },
                success: function (data,status) {
                    $('#sanpham-table_show').html(data);
                }
            });
        }
        $('#sanpham-btn_add').on('click', function () {
            let masp = $('#masp_add').val();
            let tensp = $('#tensp_add').val();
            let gia = $('#gia_add').val();
            let size = $('#size_add').val();
            let nhomloai = $('#nhomloai_add').val();

            $.ajax({
                url: "../../controller/sanpham/insert.php",
                type: "post",
                data: {
                    masp: masp,
                    tensp: tensp,
                    gia: gia,
                    size: size,
                    nhomloai: nhomloai
                },
                success: function (data, status){
                    $('#sanpham-modal_add').modal('hide');
                    $('#sanpham-form_add')[0].reset();
                    showData()
                }
            });
        });

        $(document).on('click','.btn-delete',function() {
            let masp_del = $(this).attr('id');
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/sanpham/delete.php',
                    data: { masp_delete: masp_del},
                    success: function (data) {
                        showData()
                    }
                })
            }
        })

        $(document).on('click','.btn-edit',function() {
            let masp_edit = $(this).attr('id');
            $.ajax({
                type: "post",
                url: '../../controller/sanpham/update.php',
                data: { masp_edit: masp_edit},
                success: function (data) {
                    $.get("../../controller/sanpham/update.php", {masp_edit: masp_edit}, function (data,status){
                        var ban = JSON.parse(data);
                        $('#sanpham-hidden-data').val(ban.MASP);
                        $('#masp_edit').val(ban.MASP);
                        $('#tensp_edit').val(ban.TENSP);
                        $('#gia_edit').val(ban.GIA);
                        $('#size_edit').val(ban.SIZE);
                        $('#nhomloai_edit').val(ban.NHOMLOAI);
                    });
                }
            })
            $('#sanpham-modal_edit').modal("show");
        })

        $(document).on('click','#sanpham-btn_edit',function() {
            $.ajax({
                type: "post",
                url: '../../controller/sanpham/update.php',
                data: {
                    masp_update: $('#masp_edit').val(),
                    tensp_update: $('#tensp_edit').val(),
                    gia_update: $('#gia_edit').val(),
                    size_update: $('#size_edit').val(),
                    nhomloai_update: $('#nhomloai_edit').val(),
                    sanpham_hidden_data: $('#masp_edit').val()
                },
                success: function (data) {
                    $('#sanpham-modal_edit').modal('hide');
                    showData();
                }
            })
        })
    </script>
<?php include '../layout/footer.php'; ?>