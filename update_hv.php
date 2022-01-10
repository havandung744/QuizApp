<?php
   session_start();
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
    </style>
</head>

<?php
require 'header1.php';
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
     
    if(trim($user)=="" || trim($pass)==""){
        $_SESSION['tb'] = "không để trống thông tin";
    }else{
        $id = $_GET['id'];
        $row = mysqli_query($conn, "SELECT * FROM users WHERE user_name='$user' AND user_id<>'$id'");
        $count = mysqli_num_rows($row);
        if ($count < 1) {
                mysqli_query($conn, "UPDATE users SET name='$name',user_name='$user',user_pass='$pass' WHERE user_id='$id'"); 
                $_SESSION['tb']="Cập nhật tài khoản thành công";
        }else{
                $_SESSION['tb']="Người đùng đã tồn tại";
        }
    }
}

if(isset($_POST['tro_ve'])){
    header('location: hocvien.php');
}


?>

<body>
    <form action="" method="post" align="center">
        <h1>Cập nhật học viên</h1>
        <?php
        if (isset($_SESSION['tb']))
            echo $_SESSION['tb'];
        unset($_SESSION['tb']);
         ?>
         <?php
         $id=$_GET['id'];
         $result = mysqli_query($conn,"SELECT * FROM `users` WHERE user_id='$id'");
         $row = mysqli_fetch_array($result);
         ?>
         <table>
             <tr>
                 <td>
                 Họ Tên:
                 </td>
                 <td>
                 <input type="text" name="name" value="<?php echo isset($name) ? $name : $row[1] ?>">
                 </td>
             </tr>
             <tr>
                 <td>
                 Tên đăng nhập: 
                 </td>
                 <td>
                 <input type="text" name="user" value="<?php echo isset($user) ? $user : $row[2] ?>">
                 </td>
             </tr>
             <tr>
                 <td>
                 Mật khẩu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 </td>
                 <td>
                 <input type="text" name="pass" value="<?php echo isset($pass) ? $pass : $row[3] ?>">
                 </td>
             </tr>
         </table>
      
        <br> 
        <input type="submit" name="tro_ve" value="Trở về">
        <input type="submit" name="register" value="Cập nhật">
    </form>

</body>
<?php require 'footer.php' ?>
</html>