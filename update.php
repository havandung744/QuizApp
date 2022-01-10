<?php
include 'connect.php';
session_start();
$id = $_GET['id'];

$sql = "SELECT * FROM questions WHERE question_id=$id";
$dbo = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($dbo);
echo $row[8];
 
if($row[8]=='mutiple choice'){
    $_SESSION['id']=$id;
    header('location: sua1.php');
}
if($row[8]=='checkbox'){
    $_SESSION['id']=$id;
    header('location: sua2.php');
}
if($row[8]=='fill'){
    $_SESSION['id']=$id;
    header('location: sua3.php');
}
if($row[8]=='true_false'){
    $_SESSION['id']=$id;
    header('location: sua4.php');
}


?>