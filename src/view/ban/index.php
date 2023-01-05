<?php 
    include '../layout/header.php';
    include 'add.php';
    include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center text-brown">BAN</h1>
        <div class="d-flex my-2 justify-content-between">
            <button type="button" class="btn btn-dark bg-brown" data-bs-toggle="modal" data-bs-target="#ban-modal_add">
                <i class="fas fa-circle-plus"></i>
                Add
            </button>
            <div class="d-flex">
                <input type="text" class="form-control" id="ban-search_input" autocomplete="off" placeholder="Search">
                <button class="btn btn-dark bg-brown" id="btn-search_input"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="ban-search_result">

        </div>
        <div id="showDataTable">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        var trangthai;
        $(document).ready(function (){
            showData();
            $('[id="trangthai"]').change(function()
            {
                if ($(this).is(':checked'))
                    trangthai = 1;
                else
                    trangthai = 0;
            });
            $('#btn-search_input').click(function (){
                let search_input = $('#ban-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/ban/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#ban-search_result').html(data);
                            $('#showDataTable').hide();
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
            let maban = $('#maban_add').val();
            let khuvuc = $('#khuvuc_add').val();
            let phuthu = $('#phuthu_add').val();
            console.log(trangthai)
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
                        let ban = JSON.parse(data);
                        $('#ban-hidden-data').val(ban.MABAN);
                        $('#maban_edit').val(ban.MABAN);
                        $('#khuvuc_edit').val(ban.KHUVUC);
                        $('#phuthu_edit').val(ban.PHUTHU);
                        if(ban.TRANGTHAI == 1) {$('#trangthai').prop('checked',true)}
                        else $('#trangthai').prop('checked',false)
                    });
                }
            })
            $('#ban-modal_edit').modal("show");
        })

        $(document).on('click','#ban-btn_edit',function() {
            // var trangthai_update = 0;
            // if($('#trangthai').is(":checked") == true) {
            //     trangthai_update = 1;
            // }
            // else {
            //     trangthai_update = 0;
            // }
            $.ajax({
                type: "post",
                url: '../../controller/ban/update.php',
                data: {
                    maban_update: $('#maban_edit').val(),
                    khuvuc_update: $('#khuvuc_edit').val(),
                    phuthu_update: $('#phuthu_edit').val(),
                    trangthai_update: trangthai,
                    ban_hidden_data: $('#ban-hidden-data').val()
                },
                success: function (data) {
                    $('#ban-modal_edit').modal('hide');
                    showData();
                }
            })
        })

    </script>
<?php include '../layout/footer.php'; ?>