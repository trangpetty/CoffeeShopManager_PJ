<?php
include '../layout/header.php';
include 'add.php';
include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center text-brown">HOA DON</h1>
        <div class="d-flex my-2 justify-content-between">
            <button type="button" class="btn btn-dark bg-brown" data-bs-toggle="modal" data-bs-target="#hoadon-modal_add">
                <i class="fas fa-circle-plus"></i>
                Add
            </button>
            <div class="d-flex">
                <input type="text" class="form-control" id="hoadon-search_input" autocomplete="off" placeholder="Search">
                <button class="btn btn-dark bg-brown" id="hoadon-btn_search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="hoadon-search_result">

        </div>
        <div id="hoadon-table_show">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
            showData();
            $.ajax({
                url: "../../controller/hoadon/show.php",
                type: "get",
                data: {
                    manvhd: "true"
                },
                success: function (data) {
                    $('#manvhd_add').html(data);
                }
            });
            $.ajax({
                url: "../../controller/hoadon/show.php",
                type: "get",
                data: {
                    hv: "true"
                },
                success: function (data) {
                    $('#hv_add').html(data);
                }
            });
            $.ajax({
                url: "../../controller/hoadon/show.php",
                type: "get",
                data: {
                    makmhd: "true"
                },
                success: function (data) {
                    $('#makmhd_add').html(data);
                }
            });
            $.ajax({
                url: "../../controller/hoadon/show.php",
                type: "get",
                data: {
                    mabanhd: "true"
                },
                success: function (data) {
                    $('#mabanhd_add').html(data);
                }
            });
            $('#hoadon-btn_search').click(function (){
                let search_input = $('#hoadon-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/hoadon/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#hoadon-search_result').html(data);
                            $('#hoadon-table_show').hide();
                        }
                    })
                } else {
                    $('#hoadon-search_result').css('display','none');
                }
            })
        })
        function showData(){
            $.ajax({
                url: "../../controller/hoadon/show.php",
                type: "get",
                data: {
                    hoadon: "true"
                },
                success: function (data,status) {
                    $('#hoadon-table_show').html(data);
                }
            });
        }
        $('#hoadon-btn_add').on('click', function () {
            let manv = $('#manvhd_add').val();
            let sothe = $('#hv_add').val();
            let makm = $('#makmhd_add').val();
            let maban = $('#mabanhd_add').val();
            let chuthich = $('#chuthich_add').val();
            if(manv != ""){
                $.ajax({
                    url: "../../controller/hoadon/insert.php",
                    type: "post",
                    data: {
                        manv: manv,
                        sothe: sothe,
                        makm: makm,
                        maban:maban,
                        chuthich: chuthich
                    },
                    success: function (data, status){
                        $('#hoadon-modal_add').modal('hide');
                        $('#hoadon-form_add')[0].reset();
                        showData()
                    }
                });
            } else $('.error').html('<i class="fa-solid fa-circle-exclamation"></i> Nhap ma nhan vien')
        });

        $(document).on('click','.btn-delete',function() {
            let mahd_del = $(this).attr('id');
            console.log(mahd_del)
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/hoadon/delete.php',
                    data: { mahd_delete: mahd_del},
                    success: function (data) {
                        showData()
                    }
                })
            }
        })

        $(document).on('click','.btn-edit',function() {
            let manv_edit = $(this).attr('id');
            $.ajax({
                type: "post",
                url: '../../controller/hoadon/update.php',
                data: { manv_edit: manv_edit},
                success: function (data) {
                    $.get("../../controller/hoadon/update.php", {manv_edit: manv_edit}, function (data,status){
                        let hoadon = JSON.parse(data);
                        $('#hoadon-hidden-data').val(hoadon.MANV);
                        $('#manv_edit').val(hoadon.MANV);
                        $('#honv_edit').val(hoadon.HONV);
                        $('#tennv_edit').val(hoadon.TENNV);
                        $("#hoadon-form_edit input[type='radio']:checked").val(hoadon.GIOITINH);
                        $('#ngaysinhnv_edit').val(hoadon.NGAYSINH);
                        $('#noisinh_edit').val(hoadon.NOISINH);
                        $('#diachinv_edit').val(hoadon.DIACHI);
                        $('#sdtnv_edit').val(hoadon.DIENTHOAI);
                        $('#nbdl_edit').val(hoadon.NGAYBDDILAM);
                        $('#scccdnv_edit').val(hoadon.SOCCCD);
                        $('#chucvu_edit').val(hoadon.CHUCVU);
                        $('#luongca_edit').val(hoadon.LUONGCA);
                    });
                }
            })
            $('#hoadon-modal_edit').modal("show");
        })

        $(document).on('click','#hoadon-btn_edit',function() {
            $.ajax({
                type: "post",
                url: '../../controller/hoadon/update.php',
                data: {
                    honv_update: $('#honv_edit').val(),
                    tennv_update: $('#tennv_edit').val(),
                    gioitinh_update: $("#hoadon-form_edit input[type='radio']:checked").val(),
                    ngaysinh_update: $('#ngaysinhnv_edit').val(),
                    noisinh_update: $('#noisinh_edit').val(),
                    diachi_update: $('#diachinv_edit').val(),
                    dienthoai_update: $('#sdtnv_edit').val(),
                    nbddl_update: $('#nbdl_edit').val(),
                    scccd_update: $('#scccdnv_edit').val(),
                    chucvu_update: $('#chucvu_edit').val(),
                    luongca_update: $('#luongca_edit').val(),
                    hoadon_hidden_data: $('#hoadon-hidden-data').val()
                },
                success: function (data) {
                    $('#hoadon-modal_edit').modal('hide');
                    showData();
                }
            })

        })

        $(document).on('click','.btn-detail',function() {
            let manv_detail = $(this).attr('id');
            $.ajax({
                type: "post",
                url: '../../controller/hoadon/show.php',
                data: { manv_detail: manv_detail},
                success: function (data) {
                    $.get("../../controller/hoadon/show.php", {manv_detail: manv_detail}, function (data,status){
                        let hoadon = JSON.parse(data);
                        $('#manv_detail').val(hoadon.MANV);
                        $('#honv_detail').val(hoadon.HONV);
                        $('#tennv_detail').val(hoadon.TENNV);
                        $("#hoadon-form_detail input[type='radio']:checked").val(hoadon.GIOITINH);
                        $('#ngaysinhnv_detail').val(hoadon.NGAYSINH);
                        $('#noisinh_detail').val(hoadon.NOISINH);
                        $('#diachinv_detail').val(hoadon.DIACHI);
                        $('#sdtnv_detail').val(hoadon.DIENTHOAI);
                        $('#nbdl_detail').val(hoadon.NGAYBDDILAM);
                        $('#scccdnv_detail').val(hoadon.SOCCCD);
                        $('#chucvu_detail').val(hoadon.CHUCVU);
                        $('#luongca_detail').val(hoadon.LUONGCA);
                    });
                }
            })
            $('#hoadon-modal_detail').modal("show");
        })

    </script>
<?php include '../layout/footer.php'; ?>