<?php
include 'connect.php';
session_start();
$id = $_GET['id'];

if(mysqli_query($conn,"DELETE FROM users WHERE user_id=$id")){
    $_SESSION['tb'] = "Xóa học viên thành công";
    header('location: hocvien.php');
}else{
    $_SESSION['tb'] = "Xóa học viên thất bại";
    header('location: hocvien.php');
}
?>