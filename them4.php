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

    if (isset($_POST['submit']) && isset($_POST['da'])) {
        $da = $_POST['da'];
    } else {
        $da = "";
    }



    if (isset($_POST['submit'])) {

        $loaikh = (int)$_POST['loaikh'];
        $capdo = (int)$_POST['level'];
        $ch = $_POST['ch'];
        if (trim($ch) == "" || trim($da) == "") {
            $_SESSION['tb'] = "Không để trống dữ liệu";
            // header('location: them1.php');

        } else {
            $sql2 = "SELECT * FROM questions WHERE question='$ch'";
            $dbo2 = mysqli_query($conn, $sql2);
            $count = mysqli_num_rows($dbo2);
            if ($count < 1) {
                $sql = "INSERT INTO questions(question,coures_id,is_active,level,type)
                VALUES('$ch','$loaikh','1','$capdo','true_false')";
                mysqli_query($conn, $sql);
                // header('location: them1.php');


                $sql3 = "SELECT *
                FROM questions
                ORDER BY question_id DESC";
                $dbo3 = mysqli_query($conn, $sql3);
                $row = mysqli_fetch_array($dbo3);
                $id = $row[0];

                if ($da == 'a') {
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','1','true'),
                    ('$id','0','false')";
                }
                if ($da == 'b') {
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','1','false'),
                    ('$id','0','true')";
                }

                if (mysqli_query($conn, $sql1)) {
                    $_SESSION['tb'] = "Thêm câu hỏi thành công ";
                } else {
                    $_SESSION['tb'] = "Thêm câu hỏi thất bại ";
                }
            } else {
                $_SESSION['tb'] = "Câu hỏi đã tồn tại";
            }
        }
    }


    if (isset($_POST['nhap_lai'])) {
        $_POST['loaikh'] = "";
        $_POST['ch'] = "";
        $_POST['da'] = "";
    }

    if (isset($_POST['tro_lai'])) {
        header('location: themcauhoi.php');
    }

    ?>


    <form action="" method="post">
        <h3>True or false</h2>
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
            echo "<select name=\"loaikh\">";
            $dbo = mysqli_query($conn, "SELECT * FROM questions");
            $row1 = mysqli_fetch_array($dbo);
            while ($row = mysqli_fetch_array($result)) { ?>
                <option <?php if (isset($_POST['submit']) && $loaikh == $row[0]) echo "selected"; ?> value=<?php echo $row[0] ?>> <?php echo $row[1] ?> </option>
            <?php }
            echo "</select>"; ?>


            <br>
            <br>
            Cấp độ
            <select name="level">
                <option value="1" <?php if (isset($_POST['submit']) && $capdo == "1") echo "selected"; ?>>Dễ</option>
                <option value="2" <?php if (isset($_POST['submit']) && $capdo == "2") echo "selected"; ?>>Trung bình</option>
                <option value="3" <?php if (isset($_POST['submit']) && $capdo == "3") echo "selected"; ?>>Khó</option>
            </select>
            <br>
            Câu hỏi<input type="text" name="ch" size="50" value="<?php echo (isset($_POST['ch']) && isset($_POST['submit'])) ? $_POST['ch'] : '' ?>">
            <br>
            Đáp án:
            True<input type="radio" name="da" value="a" <?php if (isset($_POST['da']) && $da == "a") echo "checked"; ?>>
            False<input type="radio" name="da" value="b" <?php if (isset($_POST['da']) && $da == "b") echo "checked"; ?>>
            <br>
            <input type="submit" name="tro_lai" value="Chọn loại câu hỏi">
            <input type="submit" name="submit" value="Thêm câu hỏi">
            <input type="submit" name="nhap_lai" value="Nhập lại">
    </form>
</body>
<?php require 'footer.php'; ?>


</html>