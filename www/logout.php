<?php

    session_start();
    if ($_SESSION['status'] != "start"){
        header("Location: login.php");
    }
    session_unset();
    session_destroy();
    header("Location: login.php");

?>