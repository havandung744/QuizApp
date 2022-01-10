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
        form {
            margin: auto;
            text-align: center;
            width: 500px;
            height: 450px;
            border: red solid 1px;
            padding-top: 20px;
        }

        input {
            margin: 10px;
        }
        .active7 {
            background-color: #ff7700;
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


    if (isset($_POST['submit'])) {
        $capdo = $_POST['level'];
        $daa = $_POST['daa'];
        if (trim($daa) == "") {
            $_SESSION['tb'] = "Không để trống dữ liệu";
            // header('location: them1.php');

        } else {
            $_SESSION['daa']=$daa;
            if($capdo==1){
                header('location: timkiem_ch.php');
            }
            if($capdo==2){
                header('location: timkiem_kh.php');
            }
            if($capdo==3){
                header('location: timkiem_dt.php');
            }
            if($capdo==4){
                header('location: timkiem_hv.php');
            }

        }
    }


    ?>


    <form action="" method="post">
        <h3>Tìm kiếm</h2>
            <?php
            if (isset($_SESSION['tb']))
                echo $_SESSION['tb'];
            unset($_SESSION['tb']);
            ?>
            <br>
            <br>
            Bảng cần tìm
            <select name="level">
                <option value="1" <?php if (isset($_POST['submit']) && $capdo == "1") echo "selected"; ?>>Câu hỏi</option>
                <option value="2" <?php if (isset($_POST['submit']) && $capdo == "2") echo "selected"; ?>>Khóa học</option>
                <option value="3" <?php if (isset($_POST['submit']) && $capdo == "3") echo "selected"; ?>>Đề thi</option>
                <option value="4" <?php if (isset($_POST['submit']) && $capdo == "4") echo "selected"; ?>>Học viên</option>
            </select>
            <br>
            tên <input type="text" name="daa" value="<?php echo isset($_POST['daa']) ? $_POST['daa'] : '' ?>">
            <br>
            <input type="submit" name="submit" value="Tìm kiếm">
    </form>

</body>
<?php require 'footer.php'; ?>

</html>