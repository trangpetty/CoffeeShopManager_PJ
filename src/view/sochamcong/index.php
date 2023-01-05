<?php 
    include '../layout/header.php';
    include 'add.php';
    include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center text-brown">sochamcong</h1>
        <div class="d-flex my-2 justify-content-between">
            <button id="sochamcong-btn_modaladd" type="button" class=" bg-brown btn btn-dark" data-bs-toggle="modal" data-bs-target="#sochamcong-modal_add">
                <i class="fas fa-circle-plus"></i>
                Add
            </button>
            <div class="d-flex">
                <input type="text" class="form-control" id="sochamcong-search_input" autocomplete="off" placeholder="Search">
                <button class="bg-brown btn btn-dark" id="sochamcong-btn_search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="sochamcong-search_result">

        </div>
        <div id="sochamcong-table_show">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        var manvcc_edit = '';
        var ngaydilam_edit = '';
        var calam_edit = '';
        $(document).ready(function (){
            showData();
            // var manvcc_edit, ngaydilam_edit, calam_edit;

            $('#sochamcong-btn_search').click(function (){
                let search_input = $('#sochamcong-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/sochamcong/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#sochamcong-search_result').html(data);
                        }
                    })
                } else {
                    $('#sochamcong-search_result').css('display','none');
                }
            })

            $(document).on('click','.btn-edit',function() {
                let sochamcong_edit = $(this).attr('id');
                let group_edit = sochamcong_edit.split(':');
                manvcc_edit = group_edit[0];
                ngaydilam_edit = group_edit[1];
                calam_edit = group_edit[2];
                $.ajax({
                    type: "get",
                    url: '../../controller/sochamcong/update.php',
                    data: {
                        manvcc_edit: manvcc_edit,
                        ngaydilam_edit: ngaydilam_edit,
                        calam_edit: calam_edit
                    },
                    success: function (data) {
                            let sochamcong = JSON.parse(data);
                            $('#sochamcong-hidden-data').val(sochamcong.MANV);
                            $('#manvcc_edit').val(sochamcong.MANV);
                            $('#ngaydilam_edit').val(sochamcong.NGAYDILAM);
                            $('#calam_edit').val(sochamcong.CALAM);
                            $('#sochamcong-modal_edit').modal('show')
                    }
                })
            })
            $(document).on('click','#sochamcong-btn_edit', function (){
                console.log(manvcc_edit + ngaydilam_edit + calam_edit)
                console.log($('#manvcc_edit').val())
                $.ajax({
                    type: "post",
                    url: '../../controller/sochamcong/update.php',
                    data: {
                        get_manvcc: manvcc_edit,
                        get_ngaydilam: ngaydilam_edit,
                        get_calam: calam_edit,
                        manvcc_update: $('#manvcc_edit').val(),
                        ngaydilam_update: $('#ngaydilam_edit').val(),
                        calam_update: $('#calam_edit').val(),
                        sochamcong_hidden_data: $('#sochamcong-hidden-data').val()
                    },
                    success: function () {
                        $('#sochamcong-modal_edit').modal('hide');
                        showData();
                    }
                })
            })
        })
        function showData(){
            $.ajax({
                url: "../../controller/sochamcong/show.php",
                type: "get",
                data: {
                    sochamcong: "true"
                },
                success: function (data,status) {
                    $('#sochamcong-table_show').html(data);
                }
            });
        }

        $('#sochamcong-btn_modaladd').on('click',function (){
            $.ajax({
                url: "../../controller/sochamcong/show.php",
                type: "get",
                data: {
                    get_manv: "true"
                },
                success: function (data,status) {
                    $('#manvcc_add').html(data);
                }
            });
        })

        $('#sochamcong-btn_add').on('click', function () {
            let manvcc = $('#manvcc_add').val();
            let ngaydilam = $('#ngaydilam_add').val();
            let calam = $('#calam_add').val();

            $.ajax({
                url: "../../controller/sochamcong/insert.php",
                type: "post",
                data: {
                    manvcc: manvcc,
                    ngaydilam: ngaydilam,
                    calam: calam
                },
                success: function (data, status){
                    $('#sochamcong-modal_add').modal('hide');
                    $('#sochamcong-form_add')[0].reset();
                    showData()
                }
            });
        });

        $(document).on('click','.btn-delete',function() {
            let sochamcong_del = $(this).attr('id');
            let group_del = sochamcong_del.split(':');
            let manvcc_del = group_del[0];
            let ngaydilam_del = group_del[1];
            let calam_del = group_del[2];
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/sochamcong/delete.php',
                    data: {
                        manvcc_del: manvcc_del,
                        ngaydilam_del: ngaydilam_del,
                        calam_del: calam_del
                    },
                    success: function (data) {
                        showData();
                    }
                })
            }
        })


    </script>
<?php include '../layout/footer.php'; ?>