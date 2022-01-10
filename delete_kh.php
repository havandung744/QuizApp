<?php
include 'connect.php';
session_start();
$id = $_GET['id'];

if(mysqli_query($conn,"DELETE FROM course WHERE course_id=$id")){
    $_SESSION['tb'] = "Xóa thành công";
    header('location: khoahoc.php');
}else{
    $_SESSION['tb'] = "Không thể xóa khóa học vì các ràng buộc về khóa ngại với câu hỏi và đề thi";
    header('location: khoahoc.php');
}
?>