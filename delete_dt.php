<?php
include 'connect.php';
session_start();
$id = $_GET['id'];

if(mysqli_query($conn,"DELETE FROM exams WHERE exam_id=$id")){
    $_SESSION['tb'] = "Xóa đề thi thành công";
    header('location: dethi.php');
}else{
    $_SESSION['tb'] = "Xóa đề thi thất bại";
    header('location: dethi.php');
}
?>