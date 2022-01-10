<?php    session_start();
include 'connect.php';
?>
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
            width: 500px;
            height: auto;
            border: red solid 1px;
        }

        input {
            margin: 10px;
        }
        table{
            padding-left: 100px;
        }
        .active8 {
            background-color: #ff7700;
        }
    </style>
</head>

<?php 
 require 'header1.php';
 if(isset($_POST['tro_ve'])){
     header('location: hocvien.php');
 }
 if(isset($_POST['reset'])){
    $name = "";
    $user = "";
    $pass = "";
    $pass1 = "";
 }
 if(isset($_POST['register'])){
    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass1 = $_POST['pass1'];

    if(trim($user)=="" || trim($pass)=="" || trim($pass1)==""){
        $_SESSION['tb'] = "không để trống tên đăng nhập, mật khẩu và nhập lại mật khẩu";
    }else{
        $row = mysqli_query($conn, "SELECT * FROM users WHERE user_name='$user' ");
        $count = mysqli_num_rows($row);
        if ($pass == $pass1 && $count < 1 && trim($user)!="") {
                mysqli_query($conn, "INSERT INTO users(name,user_name,user_pass,level)
                VALUES('$name','$user','$pass','0')"); 
                $_SESSION['tb']="Tạo tài khoản thành công";
        }else{
            if ($pass != $pass1) {
                $_SESSION['tb']="mật khẩu nhập lại không trùng khớp";
            }
            elseif($count>=1){
                $_SESSION['tb']="Người đùng đã tồn tại";
            }
        }
    }
 }
?>


<body>
    <form action="" method="post" align="center">
        <h1>Thêm học viên</h1>
        <?php
        if (isset($_SESSION['tb']))
            echo $_SESSION['tb'];
        unset($_SESSION['tb']);
         ?>
         <table>
             <tr>
                 <td>
                 Họ Tên:
                 </td>
                 <td>
                 <input type="text" name="name" value="<?php echo isset($name) ? $name : "" ?>">
                 </td>
             </tr>
             <tr>
                 <td>
                 Tên đăng nhập: 
                 </td>
                 <td>
                 <input type="text" name="user" value="<?php echo isset($user) ? $user : "" ?>">
                 </td>
             </tr>
             <tr>
                 <td>
                 Mật khẩu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 </td>
                 <td>
                 <input type="password" name="pass" value="<?php echo isset($pass) ? $pass : "" ?>">
                 </td>
             </tr>
             <tr>
                 <td>
                 Nhập lại mật khẩu:
                 </td>
                 <td>
                 <input type="password" name="pass1" value="<?php echo isset($pass1) ? $pass1 : "" ?>">
                 </td>
             </tr>
         </table>
      
        <br>
        <input type="submit" name="tro_ve" value="Trở về">
        <input type="submit" name="register" value="Thêm học viên">
        <input type="submit" name="reset" value="Nhập lại">
    </form>

</body>

</html>