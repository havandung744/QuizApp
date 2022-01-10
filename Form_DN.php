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
            margin-top: 200px;
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
    <?php session_start(); ?>
    <form action="Xuly_Form_DN.php" method="post" align="center">
        <h1>Form đăng nhập  </h1>
        <?php  
        if(isset($_SESSION['tb'])) echo $_SESSION['tb']; 
        if(isset($_SESSION['tb1'])) echo $_SESSION['tb1']; 
        unset($_SESSION['tb']);
        unset($_SESSION['tb1']);
        ?>
        <br>
        Tên đăng nhập: <input type="text" name="user" value="<?php echo isset($_SESSION['u']) ?  $_SESSION['u'] : "" ?>">
        <br>
        Mật khẩu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="password" name="pass" value="<?php echo isset($_SESSION['p']) ? $_SESSION['p'] : "" ?>">
        <br>
        <a href="Form_DK.php">Đăng kí</a> 
        <input type="submit" name="submit" value="Đăng nhập">
        <input type="submit" name="reset" value="Nhập lại">
    </form>
</body>

</html>