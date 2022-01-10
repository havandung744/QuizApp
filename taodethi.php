<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .active3 {
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

        $ma_khoa_hoc = (int)$_POST['mkh'];
        $ten_de_thi = $_POST['tdt'];
        $thoi_gian = $_POST['tg'];
        $tong_so_cau_hoi = $_POST['tsch'];
        $so_Cau_hoi_de = $_POST['schd'];
        $so_cau_hoi_trung_binh = $_POST['schtb'];
        $so_cau_hoi_kho = $_POST['schk'];

        if (trim($ten_de_thi) == "" || trim($tong_so_cau_hoi) == "" || trim($so_Cau_hoi_de) == "" || trim($so_cau_hoi_trung_binh) == "" ||
         trim($so_cau_hoi_kho) == "" ||  trim($thoi_gian) == "") {
            $_SESSION['tb'] = "Không để trống dữ liệu";

        }elseif($tong_so_cau_hoi<0 || $so_Cau_hoi_de<0 ||  $so_cau_hoi_trung_binh<0 ||  $so_cau_hoi_kho<0 || $thoi_gian<0){
            $_SESSION['tb'] = "Không được nhập số âm";
        }elseif($tong_so_cau_hoi==0){
            $_SESSION['tb'] = "Tổng số câu hỏi phải lớn hơn 0";
        }elseif($thoi_gian==0){
            $_SESSION['tb'] = "Thời gian làm bài phải lớn hơn 0";
        }
         else {
            $dbo2 = mysqli_query($conn, "SELECT * FROM exams WHERE name='$ten_de_thi'");
            $count = mysqli_num_rows($dbo2);
            if ($count < 1) {
                $sql = "INSERT INTO exams(course_id,name,total_number,total_easy,total_medium,total_difficult,minute)
                VALUES('$ma_khoa_hoc','$ten_de_thi','$tong_so_cau_hoi','$so_Cau_hoi_de','$so_cau_hoi_trung_binh','$so_cau_hoi_kho','$thoi_gian')";


                $temp = $so_cau_hoi_kho+$so_cau_hoi_trung_binh+$so_Cau_hoi_de;
                if($tong_so_cau_hoi==$temp){
                    if (mysqli_query($conn, $sql) && $tong_so_cau_hoi==$temp) {
                        $_SESSION['tb'] = "Thêm đề thi thành công ";
                    } else {
                        $_SESSION['tb'] = "Thêm đề thi thất bại ";
                    }
                }elseif($tong_so_cau_hoi<$temp){
                    $_SESSION['tb'] = "Tổng số câu hỏi bé hơn số các câu hỏi dễ, khó, trung bình cộng lại (vui lòng nhập lại)";
                }else{
                    $_SESSION['tb'] = "Tổng số câu hỏi lớn hơn số các câu hỏi dễ, khó, trung bình cộng lại (vui lòng nhập lại)";
                }
            } else {
                $_SESSION['tb'] = "Đề thi đã tồn tại";
            }
        }
    }


    if (isset($_POST['nhap_lai'])) {
        $_POST['loaich'] = "";
        $_POST['tdt'] = "";
        $_POST['tg'] = "";
        $_POST['tsch'] = "";
        $_POST['schd'] = "";
        $_POST['schtb'] = "";
        $_POST['schk'] = "";
    }

    if (isset($_POST['tro_lai'])) {
        header('location: dethi.php');
    }

    ?>


    <form action="" method="post">
        <h3>Tạo đề thi</h2>
            <?php
            if (isset($_SESSION['tb']))
                echo $_SESSION['tb'];
            unset($_SESSION['tb']);
            ?>
            <br>
           

            <?php
            $result = mysqli_query($conn, "SELECT * FROM course");
            echo "<br>Khóa học ";
            echo "<select name=\"mkh\">";
         
            while ($row = mysqli_fetch_array($result)) { ?>
                <option <?php if (isset($_POST['submit']) && $ma_khoa_hoc == $row[0]) echo "selected"; ?> value=<?php echo $row[0] ?>> <?php echo $row[1] ?> </option>
            <?php }
            echo "</select>"; ?>

          
            <br>
            Tên đề thi<input type="text" name="tdt" size="50" value="<?php echo (isset($_POST['tdt']) && isset($_POST['submit'])) ? $_POST['tdt'] : '' ?>">
            <br>
            Thời gian<input type="number" name="tg" value="<?php echo (isset($_POST['tg']) && isset($_POST['submit'])) ? $_POST['tg'] : '' ?>">
            <br>
            Tổng số câu hỏi<input type="number" name="tsch" value="<?php echo (isset($_POST['tsch']) && isset($_POST['submit'])) ? $_POST['tsch'] : '' ?>">
            <br>
            Số câu hỏi dễ<input type="number" name="schd" value="<?php echo (isset($_POST['schd']) && isset($_POST['submit'])) ? $_POST['schd'] : '' ?>">
            <br>
            Số câu hỏi trung bình<input type="number" name="schtb" value="<?php echo (isset($_POST['schtb']) && isset($_POST['submit'])) ? $_POST['schtb'] : '' ?>">
            <br>
            Số câu hỏi khó<input type="number" name="schk" value="<?php echo (isset($_POST['schk']) && isset($_POST['submit'])) ? $_POST['schk'] : '' ?>">
            <br>
         
           
          
            
            <input type="submit" name="tro_lai" value="Trở lại">
            <input type="submit" name="submit" value="Thêm đề thi">
            <input type="submit" name="nhap_lai" value="Nhập lại">
    </form>
</body>
<?php require 'footer.php'; ?>


</html>