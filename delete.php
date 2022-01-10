<?php
include 'connect.php';
session_start();
$id = $_GET['id'];

if(mysqli_query($conn,"DELETE FROM questions WHERE question_id=$id") &&  mysqli_query($conn,"DELETE FROM question_choices WHERE question_id=$id")){
    $_SESSION['tb'] = "Xóa thành công";
    header('location: xoacauhoi.php');
}else{
    $_SESSION['tb'] = "Xóa không thành công";
    header('location: xoacauhoi.php');
}
?>