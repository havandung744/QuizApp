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
        $da = array();
    }

    if (isset($_POST['submit'])) {

        $loaich = (int)$_POST['loaich'];
        $capdo =
            $_POST['level'];
        $ch = $_POST['ch'];
        $daa = $_POST['daa'];
        $dab = $_POST['dab'];
        $dac = $_POST['dac'];
        $dad = $_POST['dad'];
        if (trim($ch) == "" || trim($daa) == "" || trim($dab) == "" || trim($dac) == "" || trim($dad) == "" || count($da) ==0) {
            $_SESSION['tb'] = "Không để trống dữ liệu";
            // header('location: them1.php');

        } else {
            $sql2 = "SELECT * FROM questions WHERE question='$ch' AND question_id <>$_SESSION[id]";
            $dbo2 = mysqli_query($conn, $sql2);
            $count = mysqli_num_rows($dbo2);
            if ($count<1) {
                $sql = "UPDATE questions SET coures_id='$loaich',level='$capdo',question='$ch' WHERE question_id =$_SESSION[id]";
                mysqli_query($conn, $sql);
                $_SESSION['tb'] = 'Update câu hỏi thành công';


                $sql3 = "SELECT *
                FROM questions
                ORDER BY question_id DESC";
                $dbo3 = mysqli_query($conn, $sql3);
                $row = mysqli_fetch_array($dbo3);
                $id = $row[0];

                mysqli_query($conn,"DELETE FROM question_choices WHERE question_id=$_SESSION[id]");

               
                if (in_array('a',$da)) {
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','1','$daa')";
                }else{
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','0','$daa')";
                }
                mysqli_query($conn, $sql1);


                if (in_array('b',$da)) {
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','1','$dab')";
                }else{
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','0','$dab')";
                }
                mysqli_query($conn, $sql1);

                if (in_array('c',$da)) {
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','1','$dac')";
                }else{
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','0','$dac')";
                }
                mysqli_query($conn, $sql1);

                if (in_array('d',$da)) {
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','1','$dad')";
                }else{
                    $sql1 = "INSERT INTO question_choices(question_id,is_right_choice,choice)
                    VALUES('$id','0','$dad')";
                }
                mysqli_query($conn, $sql1);
                $sql = "UPDATE questions SET update_day=now() WHERE question_id =$_SESSION[id]";
                mysqli_query($conn, $sql);
                $_SESSION['tb'] = "Update câu hỏi thành công";


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
            Câu hỏi<input type="text" name="ch" size="50" value="<?php echo (isset($_POST['ch']) && isset($_POST['submit'])) ? $_POST['ch'] : htmlspecialchars( $row1[2]) ?>">
            <br>
            <?php
            $arr = array();
            $da = array();
            $count1=0;
            $dbo1 = mysqli_query($conn, "SELECT * FROM question_choices WHERE question_id = $_SESSION[id]");
            while ($row2 = mysqli_fetch_array($dbo1)) {
                $arr[] = $row2[3];
                $count1++;
                if($row2[2]==1){
                    if($count1==1){
                        $da[] ="a";
                    }
                    if($count1==2){
                        $da[] ="b";
                    }
                    if($count1==3){
                        $da[] ="c";
                    }
                    if($count1==4){
                        $da[] ="d";
                    }
                }
            }
            ?>
            Đáp án A <input type="text" name="daa" value="<?php echo isset($_POST['daa']) ? $_POST['daa'] : htmlspecialchars($ar[0]) ?>">
            <br>
            Đáp án B <input type="text" name="dab" value="<?php echo isset($_POST['dab']) ? $_POST['dab'] : htmlspecialchars($arr[1]) ?>">
            <br>
            Đáp án C <input type="text" name="dac" value="<?php echo isset($_POST['dac']) ? $_POST['dac'] : htmlspecialchars($arr[2]) ?>">
            <br>
            Đáp án D <input type="text" name="dad" value="<?php echo isset($_POST['dad']) ? $_POST['dad'] : htmlspecialchars($arr[3]) ?>">
            <br>

            Đáp án:
            Đáp án A <input type="checkbox" name="da[]" value="a" <?php if (in_array("a",$da)) {
                    echo "checked";
                } ?>>
            Đáp án B <input type="checkbox" name="da[]" value="b" <?php if (in_array("b",$da)) {
                    echo "checked";
                } ?>>
            Đáp án C <input type="checkbox" name="da[]" value="c" <?php if (in_array("c",$da)) {
                    echo "checked";
                } ?>>
            Đáp án D <input type="checkbox" name="da[]" value="d" <?php if (in_array("d",$da)) {
                    echo "checked";
                } ?>>
            <br>
            <a href="suacauhoi.php"> Về trang sửa câu hỏi </a>
            <input type="submit" name="submit" value="Update">

    </form>
</body>
<?php require 'footer.php'; ?>


</html>