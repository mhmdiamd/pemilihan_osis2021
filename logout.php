<?php
    session_start();
    session_destroy();
    header("location:bilik_login.php");
?>