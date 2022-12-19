<?php 
    include '../layout/header.php';
    include 'add.php';
    include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center text-brown">Khuyen mai</h1>
        <div class="d-flex my-2 justify-content-between">
            <button type="button" class="btn btn-dark bg-brown" data-bs-toggle="modal" data-bs-target="#khuyenmai-modal_add">
                <i class="fas fa-circle-plus"></i>
                Add
            </button>
            <div class="d-flex">
                <input type="text" class="form-control" id="khuyenmai-search_input" autocomplete="off" placeholder="Search">
                <button class="btn btn-dark bg-brown" id="khuyenmai-btn_search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="khuyenmai-search_result">

        </div>
        <div id="khuyenmai-table_show">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
            showData();
            $('#khuyenmai-btn_search').click(function (){
                var search_input = $('#khuyenmai-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/khuyenmai/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#khuyenmai-search_result').html(data);
                        }
                    })
                } else {
                    $('#khuyenmai-search_result').css('display','none');
                }
            })
        })
        function showData(){
            $.ajax({
                url: "../../controller/khuyenmai/show.php",
                type: "get",
                data: {
                    khuyenmai: "true"
                },
                success: function (data,status) {
                    $('#khuyenmai-table_show').html(data);
                }
            });
        }
        $('#khuyenmai-btn_add').on('click', function () {
            var makm = $('#makm_add').val();
            var tenkm = $('#tenkm_add').val();
            var tgap = $('#tgap_add').val();
            var tgkt = $('#tgkt_add').val();
            var giatri = $('#giatri_add').val();

            $.ajax({
                url: "../../controller/khuyenmai/insert.php",
                type: "post",
                data: {
                    makm: makm,
                    tenkm: tenkm,
                    tgap: tgap,
                    tgkt: tgkt,
                    giatri: giatri
                },
                success: function (data, status){
                    $('#khuyenmai-modal_add').modal('hide');
                    $('#khuyenmai-form_add')[0].reset();
                    showData()
                }
            });
        });

        $(document).on('click','.btn-delete',function() {
            let makm_del = $(this).attr('id');
            let $ele = $(this).parent().parent();
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/khuyenmai/delete.php',
                    data: { makm_delete: makm_del},
                    success: function (data) {
                        showData()
                    }
                })
            }
        })

        $(document).on('click','.btn-edit',function() {
            let makm_edit = $(this).attr('id');
            $.ajax({
                type: "post",
                url: '../../controller/khuyenmai/update.php',
                data: { makm_edit: makm_edit},
                success: function (data) {
                    $.get("../../controller/khuyenmai/update.php", {makm_edit: makm_edit}, function (data,status){
                        let khuyenmai = JSON.parse(data);
                        $('#khuyenmai-hidden-data').val(khuyenmai.MAKM);
                        $('#makm_edit').val(khuyenmai.MAKM);
                        $('#tenkm_edit').val(khuyenmai.TENKM);
                        $('#tgap_edit').val(khuyenmai.TGAPDUNG);
                        $('#tgkt_edit').val(khuyenmai.TGKETTHUC);
                        $('#giatri_edit').val(khuyenmai.GIATRI);
                    });
                }
            })
            $('#khuyenmai-modal_edit').modal("show");
        })

        $(document).on('click','#khuyenmai-btn_edit',function() {
            $.ajax({
                type: "post",
                url: '../../controller/khuyenmai/update.php',
                data: {
                    makm_update: $('#makm_edit').val(),
                    tenkm_update: $('#tenkm_edit').val(),
                    tgap_update: $('#tgap_edit').val(),
                    tgkt_update: $('#tgkt_edit').val(),
                    giatri_update: $('#giatri_edit').val(),
                    khuyenmai_hidden_data: $('#khuyenmai-hidden-data').val()
                },
                success: function (data) {
                    $('#khuyenmai-modal_edit').modal('hide');
                    showData();
                }
            })
        })

    </script>
<?php include '../layout/footer.php'; ?>