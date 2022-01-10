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

<body>
    <?php
     session_start();
     if(isset($_SESSION['ltk'])){
        $ltk = $_SESSION['ltk'];
    }else{
        $ltk = "";
    }
    ?>
    <form action="Xyly_Form_DK.php" method="post" align="center">
        <h1>Form đăng kí </h1>
        <?php
        if (isset($_SESSION['tb']))
            echo $_SESSION['tb'];
        unset($_SESSION['tb']);
         ?>
         <table>
             <tr>
                 <td>
                     chọn loại tài khoản:
                 </td>
                 <td>
                 <select name="loai_tai_khoan">
                     <option value="admin" <?php if($ltk=="admin") echo "selected";?>>Admin</option>
                     <option value="user" <?php if($ltk=="user") echo "selected"; ?>>User</option>
                 </td>
        </select>
             </tr>
             <tr>
                 <td>
                 Họ Tên:
                 </td>
                 <td>
                 <input type="text" name="name" value="<?php echo isset($_SESSION['n']) ? $_SESSION['n'] : "" ?>">
                 </td>
             </tr>
             <tr>
                 <td>
                 Tên đăng nhập: 
                 </td>
                 <td>
                 <input type="text" name="user" value="<?php echo isset($_SESSION['du']) ? $_SESSION['du'] : "" ?>">
                 </td>
             </tr>
             <tr>
                 <td>
                 Mật khẩu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 </td>
                 <td>
                 <input type="password" name="pass" value="<?php echo isset($_SESSION['dp']) ? $_SESSION['dp'] : "" ?>">
                 </td>
             </tr>
             <tr>
                 <td>
                 Nhập lại mật khẩu:
                 </td>
                 <td>
                 <input type="password" name="pass1" value="<?php echo isset( $_SESSION['dp1']) ?  $_SESSION['dp1'] : "" ?>">
                 </td>
             </tr>
         </table>
      
        <br>
        <a href="Form_DN.php">Đăng nhập</a>
        <input type="submit" name="register" value="Đăng kí">
        <input type="submit" name="reset" value="Nhập lại">
    </form>

</body>

</html>