<?php
    include '../../configuration/connect.php';
    session_start();
    session_unset();
    session_destroy();
?>
