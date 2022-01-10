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

        $loaich = (int)$_POST['loaich'];
        $capdo =
            $_POST['level'];
        $ch = $_POST['ch'];
        $daa = $_POST['daa'];
        if (trim($ch) == "" || trim($daa) == "") {
            $_SESSION['tb'] = "Không để trống dữ liệu";
            // header('location: them1.php');

        } else {
            $sql2 = "SELECT * FROM questions WHERE question='$ch' AND question_id <>$_SESSION[id]";
            $dbo2 = mysqli_query($conn, $sql2);
            $count = mysqli_num_rows($dbo2);
            if ($count<1) {
                $sql = "UPDATE questions SET coures_id='$loaich',level='$capdo',question='$ch' WHERE question_id =$_SESSION[id]";
                $sql1 = "UPDATE questions_choices SET question_id =$_SESSION[id], choice='$daa' WHERE question_id =$_SESSION[id]";
              
                mysqli_query($conn, $sql);
                mysqli_query($conn, $sql1);
                $sql = "UPDATE questions SET update_day=now() WHERE question_id =$_SESSION[id]";
                mysqli_query($conn, $sql);
                $_SESSION['tb'] = 'Update câu hỏi thành công';


               
            } else {
                $_SESSION['tb'] = "Câu hỏi đã tồn tại";
            }
        }
    }

    ?>


    <form action="" method="post">
        <h3>Update </h2>
            <?php
            if (isset($_SESSION['tb']))
                echo $_SESSION['tb'];
            unset($_SESSION['tb']);
            ?>
            <br>


            <?php
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn, $sql);
            echo "Khóa học ";
            echo "<select name=\"loaich\">";
            $dbo = mysqli_query($conn, "SELECT * FROM questions WHERE question_id = $_SESSION[id]");
            $row1 = mysqli_fetch_array($dbo);
            $loaich = $row1[5];
            while ($row = mysqli_fetch_array($result)) { ?>
                <option <?php if ($loaich == $row[0]) echo "selected"; ?> value=<?php echo $row[0] ?>> <?php echo $row[1] ?> </option>
            <?php }
            echo "</select>"; ?>
            <br>
            <?php $capdo = $row1[4]; ?>
            <br>
            Cấp độ
            <select name="level">
                <option value="1" <?php if ($capdo == "1") echo "selected"; ?>>Dễ</option>
                <option value="2" <?php if ($capdo == "2") echo "selected"; ?>>Trung bình</option>  
                <option value="3" <?php if ($capdo == "3") echo "selected"; ?>>Khó</option>
            </select>
            <br>
            Câu hỏi<input type="text" name="ch" size="50" value="<?php echo (isset($_POST['ch']) && isset($_POST['submit'])) ? $_POST['ch'] : htmlspecialchars($row1[2]) ?>">
            <br>

            <?php
            $arr=array();
            $dbo1 = mysqli_query($conn, "SELECT * FROM question_choices WHERE question_id = $_SESSION[id]");
            while ($row2 = mysqli_fetch_array($dbo1)) {
                $arr[] = $row2[3];
            }
            ?>


            Đáp án <input type="text" name="daa" value="<?php echo isset($_POST['daa']) ? $_POST['daa'] : htmlspecialchars($arr[0]) ?>">
            <br>
            <a href="suacauhoi.php"> Về trang sửa câu hỏi </a>
            <input type="submit" name="submit" value="Update">

    </form>
</body>
<?php require 'footer.php'; ?>


</html>