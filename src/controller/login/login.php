<?php
    include '../../configuration/connect.php';
    session_start();
    extract($_POST);
    $array_message = array();
    /*
     message : 1 //Đăng nhập thành công
     message : 0 //Email & Password không đúng
     message : -1 // không tồn tại email & password
    */
    $array_message['message'] = -1;
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM account WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            $array_message['message'] = 1;
            if($row['role'] == 1){
                $array_message['success'] = '../../view/hoadon/index.php';
            } else
                $array_message['success'] = '../../view/user/index.php';
        }
        else {
            $array_message['message'] = 0;
        }
        echo json_encode($array_message);
    }

?>