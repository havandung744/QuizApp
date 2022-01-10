<?php include 'connect.php';
  session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
       
        form {
            margin: auto;
            margin-top: 100px;
            text-align: center;
            width: 200px;
            height: 200px;
            border: red solid 1px;
            padding-top: 20px;
        }

        input {
            margin: 10px;
        }

  </style>
</head>



<body>
  <?php
  require 'header1.php';
    if(isset($_SESSION['user'])){
        echo "Welcome ". $_SESSION['user'];
    }else{
        header('location: Form_DN.php');
    }
  ?>

  <?php
   if(isset($_POST['submit']) && isset($_POST['themch'])){
    $themch = $_POST['themch'];}
    else{
      $themch="";
    }
  ?>

<?php

if($themch=="motda"){
  header('location: them1.php');
}
if($themch=="nhieuda"){
  header('location: them2.php');
}
if($themch=="dienda"){
  header('location: them3.php');
}
if($themch=="dungsai"){
  header('location: them4.php');
}

?>


<form action="" method="post">
<h2>Chọn loại câu hỏi</h2>
<select name="themch">
            <option value="motda" <?php if($themch=="motda") echo "selected";?>>Multiple Choice</option>
            <option value="nhieuda" <?php if($themch=="nhieuda") echo "selected"; ?>>Checkbox</option>
            <option value="dienda" <?php if($themch=="dienda") echo "selected"; ?>>Fill in the Blank</option>
            <option value="dungsai" <?php if($themch=="dungsai") echo "selected"; ?>>True or false</option>
</select>
        <br>
        <input type="submit" name="submit" value="Xác nhận">
        </div>
</form>


</body>
<?php   require 'footer.php'; ?>
</html>