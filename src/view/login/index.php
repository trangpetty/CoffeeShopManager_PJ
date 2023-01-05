<?php
    include 'insert.php';
    include '../../controller/login/login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../../../assets/style.css">
    <script src="../../../assets/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/jquery-3.6.1.min.js"></script>
    <title>AJAX LESSON</title>
</head>
<body>
<section class="" style="background-color: #eee;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center mb-5">
                                    <h4 class="mt-1 pb-1 text-brown">COFFEE SHOP MANAGER</h4>
                                    <span><i class="fa-solid fa-store h1" style="color: #724e2c;"></i></span>
                                </div>

                                <form id="login-form">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" class="form-control">
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="d-flex align-items-center">
                                            <input type="password" id="password" class="form-control">
                                            <div id="btn-showhide_pwd" class="btn"><i class="fa-solid fa-eye" style="color: #724e2c!important;"></i></div>
                                        </div>
                                        <span id="error-pwd" class="text-danger"></span>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <input class="btn btn-success w-50 border-0 bg-gradient mb-3" type="submit" style="background-color: #724e2c;" id="btn-login" value="Log in">
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#account-modal_add">
                                            Create new
                                        </button>
                                   </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center bg-gradient rounded-end" style="background-color: #724e2c;">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h2 class="mb-4">Nhom 10 64PM1</h2>
                                <ul class="list-group">
                                    <li>Mac Van Hieu - 76464</li>
                                    <li>Le Thi Thuy Trang - 200164</li>
                                    <li>Dinh Truong Luan - 129064</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#login-form').submit(function (e) {
                e.preventDefault();
                let username = $('#username').val();
                let password = $('#password').val();
                if (username != '' && password != '') {
                    $.ajax({
                        url: "../../controller/login/login.php",
                        type: "POST",
                        data: {
                            username: username,
                            password: password
                        },
                        cache: false,
                        success: function (data) {
                                 var n = data.search("Unknown database");
                                 if (n > 0){
                                     alert("Unknown database");
                                 } else {
                                     var result = JSON.parse(data);
                                     if(result['message'] == 1) {
                                         alert("Login successfully!!!");
                                         window.location.href = result['success'];
                                     } else if(result['message'] == 0) {
                                         alert("Username & password error")
                                         window.location.reload();
                                     } else ("Invalid")
                                 }
                            }
                    })
                } else {
                    alert('Both Feilds are required!!!')
                }
            })
            $('#account-btn_add').click(function () {
                let username = $('#username_add').val();
                let password = $('#password_add').val();
                if (username != '' && password != '') {
                    $.ajax({
                        url: "../../controller/user/insert.php",
                        type: "post",
                        data: {
                            username_add: username,
                            password_add: password
                        },
                        success: function (data, status){
                            $("#account-modal_add").modal("hide");
                            $("#account-form_add").reset();
                            alert("Created new account!");
                        }
                    });
                } else $('.error').html('<i class="fa-solid fa-circle-exclamation"></i> Both Feilds are reqquired!!');
            })
        })
        $('#btn-showhide_pwd').click(function () {
            let password = $('#password');
            let passwordField = password.attr('type');
            if (passwordField == 'password') {
                password.attr('type', 'text');
                $(this).html('<i class="fa-sharp fa-solid fa-eye-slash" style="color: #724e2c!important;"></i>');
            } else {
                password.attr('type', 'password');
                $(this).html('<i class="fa-solid fa-eye" style="color: #724e2c!important;"></i>');
            }
        })
    </script>
</section>
</body>
</html>