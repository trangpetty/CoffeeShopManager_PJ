<?php 
    include '../layout/header.php';
    include 'add.php';
    include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center">BAN</h1>
        <div class="d-flex my-2 justify-content-between">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ban-modal_add">
                <i class="fas fa-circle-plus"></i>
                Add
            </button>
            <div class="d-flex">
                <input type="text" class="form-control" id="ban-search_input" autocomplete="off" placeholder="Search">
                <button class="btn btn-dark" id="btn-search_input"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="ban-search_result">

        </div>
        <div id="showDataTable">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
            showData();
            $('#btn-search_input').click(function (){
                var search_input = $('#ban-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/ban/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#ban-search_result').html(data);
                        }
                    })
                } else {
                    $('#ban-search_result').css('display','none');
                }
            })
        })
        function showData(){
            $.ajax({
                url: "../../controller/ban/show.php",
                type: "get",
                data: {
                    ban: "true"
                },
                success: function (data,status) {
                    $('#showDataTable').html(data);
                }
            });
        }
        $('#ban-btn_add').on('click', function () {
            var maban = $('#maban_add').val();
            var khuvuc = $('#khuvuc_add').val();
            var phuthu = $('#phuthu_add').val();

            $.ajax({
                url: "../../controller/ban/insert.php",
                type: "post",
                data: {
                    maban: maban,
                    khuvuc: khuvuc,
                    phuthu: phuthu
                },
                success: function (data, status){
                    $('#ban-modal_add').modal('hide');
                    $('#ban-form_add')[0].reset();
                    showData()
                }
            });
        });

        $(document).on('click','.btn-delete',function() {
            let maban_del = $(this).attr('id');
            let $ele = $(this).parent().parent();
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/ban/delete.php',
                    data: { maban_delete: maban_del},
                    success: function (data) {
                        showData()
                    }
                })
            }
        })

        $(document).on('click','.btn-edit',function() {
            let maban_edit = $(this).attr('id');
            $.ajax({
                type: "post",
                url: '../../controller/ban/update.php',
                data: { maban_edit: maban_edit},
                success: function (data) {
                    $.get("../../controller/ban/update.php", {maban_edit: maban_edit}, function (data,status){
                        var ban = JSON.parse(data);
                        $('#ban-hidden-data').val(ban.MABAN);
                        $('#maban_edit').val(ban.MABAN);
                        $('#khuvuc_edit').val(ban.KHUVUC);
                        $('#phuthu_edit').val(ban.PHUTHU);
                    });
                }
            })
            $('#ban-modal_edit').modal("show");
        })

        $(document).on('click','#ban-btn_edit',function() {
            $.ajax({
                type: "post",
                url: '../../controller/ban/update.php',
                data: {
                    maban_update: $('#maban_edit').val(),
                    khuvuc_update: $('#khuvuc_edit').val(),
                    phuthu_update: $('#phuthu_edit').val(),
                    ban_hidden_data: $('#ban-hidden-data').val()
                },
                success: function (data) {
                    $('#ban-modal_edit').modal('hide');
                    showData();
                }
            })
            // $.post("./../controller/ban/update.php", {
            //     maban_update: $('#maban_edit').val(),
            //     khuvuc_update: $('#khuvuc_edit').val(),
            //     phuthu_update: $('#phuthu_edit').val(),
            //     ban_hidden_data: $('#ban-hidden-data').val()
            // },function (data, status){
            //     $('#ban-modal_edit').modal('hide');
            //     showData();
            // })
        })

    </script>
<?php include '../layout/footer.php'; ?>