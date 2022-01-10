<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .active2 {
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
        $id=$_GET['id'];
        $ten_khoa_hoc = $_POST['tkh'];

        if (trim($ten_khoa_hoc) == "") {
            $_SESSION['tb'] = "Không để trống tên khóa học";
        } else {
            $dbo2 = mysqli_query($conn, "SELECT * FROM course WHERE name='$ten_khoa_hoc' AND course_id<>'$id' ");
            $count = mysqli_num_rows($dbo2);
            if ($count < 1) {
                $sql = "UPDATE course SET name='$ten_khoa_hoc' WHERE course_id='$id'";
                if(mysqli_query($conn,$sql)){
                    $_SESSION['tb'] = "Cập nhật khóa học thành công";
                }

            } else {
                $_SESSION['tb'] = "Tên cập nhật bị trùng lặp với khóa học khác";
            }
        }
    }

    if (isset($_POST['tro_lai'])) {
        header('location: khoahoc.php');
    }

    ?>


    <form action="" method="post">
        <h3>Cập nhật khóa học</h2>
            <?php
            if (isset($_SESSION['tb']))
                echo $_SESSION['tb'];
            unset($_SESSION['tb']);
            ?>
            <?php
            $id=$_GET['id'];
            $khoa_hoc = mysqli_query($conn,"SELECT * FROM `course` WHERE course_id='$id'");
            $ten_khoa_hoc = mysqli_fetch_array($khoa_hoc);

            ?>
            <br>

            <br>
            Tên khóa học<input type="text" name="tkh" size="50" value="<?php echo (isset($_POST['tkh']) && isset($_POST['submit'])) ? $_POST['tkh'] : $ten_khoa_hoc[1] ?>">
            <br>

            <input type="submit" name="tro_lai" value="Trở lại">
            <input type="submit" name="submit" value="Cập nhật khóa học">
    </form>
</body>
<?php require 'footer.php'; ?>


</html>