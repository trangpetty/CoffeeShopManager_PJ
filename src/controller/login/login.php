<?php
    include '../../configuration/connect.php';
    session_start();
    extract($_POST);
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM account WHERE username='$username' AND password='$password' LIMIT 1";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $SESSION['username'] = $row['username'];
            $SESSION['role'] = $row['role'];
            $response = 'success';
            echo json_encode($response);
            echo 'success';
        }
        else {
            echo "False";
        }
    }

    extract($_GET);
    if(isset($_GET['username'])) {
        $sql = "SELECT * FROM `account` WHERE username='$username'";
        $result = mysqli_query($con,$sql);
        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
        echo json_encode($response);
        } else {
            $response['status'] = 200;
            $response['message'] = 'Invalidd or data not found';
        }
?>