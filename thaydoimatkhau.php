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
        .active4 {
            background-color: #ff7700;
        }

        form {
            margin: auto;
            text-align: center;
            width: 500px;
            height: auto;
            border: red solid 1px;
        }

        input {
            margin: 10px;
        }
    </style>
</head>

<body>
    <?php
    require 'header1.php';
    if (isset($_SESSION['user'])) {
        echo "Welcome " . $_SESSION['user'];
    } else {
        header('location: Form_DN.php');
    }
    ?>

    <?php
    if (isset($_POST['submit1'])) {
        if(trim($_POST['pass_cu'])=="" || trim($_POST['pass'])=="" || trim($_POST['pass1'])==""){
            $_SESSION['tb'] = "Không để trống thông tin";
        }else{
            if ($_SESSION['pass'] != $_POST['pass_cu']) {
                $_SESSION['tb'] = "mật khẩu cũ không khớp";
            } else {
                    if ($_POST['pass'] != $_POST['pass1']) {
                        $_SESSION['tb'] = "nhập lại mật khẩu mới không khớp";
                    }elseif($_POST['pass_cu']==$_POST['pass']){
                $_SESSION['tb'] = "mật khẩu cũ và mật khẩu thay đổi bị trùng nhau";
                    } 
                    else {
                        $pass = $_POST['pass'];
                        $user_name =$_SESSION['u'];
                        $result = mysqli_query($conn, "UPDATE users SET user_pass='$pass' where level='1' and user_name='$user_name'");
                        $_SESSION['tb1'] = "Cập nhật mật khẩu thành công vui lòng đăng nhập lại bằng mật khẩu mới";
                        header('location: Form_DN.php');
                    }
                
            }
        }
    }


    ?>


    <form action="" method="post" align="center">
        <h1>Thay đổi mật khẩu</h1>
        <?php if (isset($_SESSION['tb'])) echo $_SESSION['tb'];
        unset($_SESSION['tb']);
        ?>
        <br>
        Nhập mật khẩu cũ <input type="password" name="pass_cu" >
        <br>
        Nhập Mật khẩu mới <input type="password" name="pass">
        <br>
        Nhập lại mật khẩu mới <input type="password" name="pass1">
        <br>
        <input type="submit" name="submit1" value="Xác nhận">
    </form>
    <?php require 'footer.php'; ?>
</body>

</html>