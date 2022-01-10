<?php
include 'connect.php';
session_start();
if (isset($_POST['register'])) {
    $loai_tai_khoan = $_POST['loai_tai_khoan'];
    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass1 = $_POST['pass1'];
    $_SESSION['n'] =$name; 
    $_SESSION['du'] =$user; 
    $_SESSION['dp'] =$pass; 
    $_SESSION['dp1'] =$pass1; 
    $_SESSION['ltk'] =$loai_tai_khoan;
     
    if(trim($user)=="" || trim($pass)=="" || trim($pass1)==""){
        $_SESSION['tb'] = "không để trống thông tin";
        header('location: Form_DK.php');
    }else{
        $row = mysqli_query($conn, "SELECT * FROM users WHERE user_name='$user' ");
        $count = mysqli_num_rows($row);
        if ($pass == $pass1 && $count < 1) {
            if($loai_tai_khoan=='admin'){
                $sql = "INSERT INTO users (name,user_name,user_pass,level) VALUES(\"$name\",\"$user\",\"$pass\",\"1\")";
            }
           else{
                $sql = "INSERT INTO users (name,user_name,user_pass,level) VALUES(\"$name\",\"$user\",\"$pass\",\"0\")";
            }
                mysqli_query($conn, $sql); 
                $_SESSION['tb']="Tạo tài khoản thành công";
                $_SESSION['u']="";
                $_SESSION['p']="";
                header('location: Form_DN.php');  
        }else{
            if ($pass != $pass1) {
                $_SESSION['tb']="mật khẩu nhập lại không trùng khớp";
                header('location: Form_DK.php');
            }
            elseif($count>=1){
                $_SESSION['tb']="Người đùng đã tồn tại";
                header('location: Form_DK.php');
            }
        }
    }
}


if (isset($_POST['reset'])) {
   unset($_SESSION['n']);
   unset($_SESSION['du']);
   unset($_SESSION['dp']);
   unset($_SESSION['dp1']);
   unset($_SESSION['ltk']);
   unset($_SESSION['tb']);
    header('location: Form_DK.php');
}
