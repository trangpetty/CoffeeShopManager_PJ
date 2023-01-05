<?php
    include '../../configuration/connect.php';
    extract($_POST);

    $message = '';
    if(isset($_POST['username_add']) && isset($_POST['password_add'])) {
        $sql = "SELECT * FROM `account` WHERE username='$username_add'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $message = 'Username is valid!';
        } else {
            $sql = "INSERT INTO `account` (username, password) VALUES('$username_add','$password_add')";
            $result = mysqli_query($con, $sql);
            $message = 'Created new account!';
        }
        echo $message;
    }
?>