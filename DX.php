<?php
    session_start();
    unset($_SESSION['user']);
    header('location: Form_DN.php');
    ?>