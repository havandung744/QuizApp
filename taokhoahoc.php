<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .active {
            background-color: #ff7700;
        }

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
    </style>
</head>



<body>
    <?php
    require 'header1.php';
    session_start();
    if (isset($_SESSION['user'])) {
        echo "Welcome " . $_SESSION['user'];
    } else {
        header('location: Form_DN.php');
    }

    if (isset($_POST['submit']) && isset($_POST['da'])) {
        $da = $_POST['da'];
    } else {
        $da = "";
    }



    if (isset($_POST['submit'])) {

        $ten_khoa_hoc = $_POST['tkh'];

        if (trim($ten_khoa_hoc) == "") {
            $_SESSION['tb'] = "Không để trống tên khóa học";
        } else {
            $dbo2 = mysqli_query($conn, "SELECT * FROM course WHERE name='$ten_khoa_hoc'");
            $count = mysqli_num_rows($dbo2);
            if ($count < 1) {
                $sql = "INSERT INTO course(name) VALUES('$ten_khoa_hoc')";
                if(mysqli_query($conn,$sql)){
                    $_SESSION['tb'] = "Thêm khóa học thành công";
                }

            } else {
                $_SESSION['tb'] = "Khóa học đã tồn tại";
            }
        }
    }


    if (isset($_POST['nhap_lai'])) {
        $_POST['tkh'] = "";
    }

    if (isset($_POST['tro_lai'])) {
        header('location: khoahoc.php');
    }

    ?>


    <form action="" method="post">
        <h3>Thêm khóa học</h2>
            <?php
            if (isset($_SESSION['tb']))
                echo $_SESSION['tb'];
            unset($_SESSION['tb']);
            ?>
            <br>

            <br>
            Tên khóa học<input type="text" name="tkh" size="50" value="<?php echo (isset($_POST['tkh']) && isset($_POST['submit'])) ? $_POST['tkh'] : '' ?>">
            <br>

            <input type="submit" name="tro_lai" value="Trở lại">
            <input type="submit" name="submit" value="Thêm khóa học">
            <input type="submit" name="nhap_lai" value="Nhập lại">
    </form>
</body>
<?php require 'footer.php'; ?>


</html>