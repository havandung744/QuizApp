<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
        .active {
            background-color: #ff7700;
        }
  </style>
</head>
<body>
  <?php
  require 'header1.php';
  session_start();
    if(isset($_SESSION['user'])){
        echo "Welcome ". $_SESSION['user'];
    }else{
        header('location: Form_DN.php');
    }
  ?>
</body>
<?php  require 'footer.php'; ?>
</html>