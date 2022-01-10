<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            width: auto;
            height: auto;
            margin-left: 20px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .canle{
            margin-left: 500px;
        }


    </style>
</head>

<body>
    <?php
    include 'connect.php';
    require 'header1.php';
    session_start();
    if(isset($_SESSION['user'])){
        echo "Welcome ". $_SESSION['user'];
    }else{
        header('location: Form_DN.php');
    }
    ?>





<table>
    <h2 class='canle'>Khóa học</h2>
        <?php
        if(isset($_SESSION['tb'])){
            $x = $_SESSION['tb'];
            echo "<h2 class=\"canle\"> $x </h2>";}
        unset($_SESSION['tb']);
        ?>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên khóa học</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Số lượng đề thi</th>
        </tr>
        <?php
    // $records = mysqli_query($conn, "SELECT exams.course_id,course.name,course.create_day,course.update_day,count(exams.course_id)
    // FROM exams JOIN course
    // ON exams.course_id = course.course_id
    // GROUP BY exams.course_id
    // ORDER BY exams.course_id DESC LIMIT 1");

    $records = mysqli_query($conn,"SELECT exams.course_id,count(exams.course_id)as so_luong
    FROM exams 
    GROUP BY exams.course_id
    ORDER BY so_luong DESC
    LIMIT 1");
    $row = mysqli_fetch_array($records);
    $temp = $row[1];

    $records = mysqli_query($conn,"SELECT exams.course_id,course.name,course.create_day,course.update_day,count(exams.course_id)as so_luong
    FROM exams JOIN course
    ON exams.course_id = course.course_id
    GROUP BY course.course_id
    HAVING so_luong='$temp'");

            $stt=1;
    while ($data = mysqli_fetch_array($records)) {
    ?>
        <tr>
            <td><?php echo $stt;$stt++; ?></td>
            <td><?php echo $data[0]; ?></td>
            <td><?php echo $data[1]; ?></td>
            <td><?php echo $data[2]; ?></td>
            <td><?php echo $data[3]; ?></td>
            <td><?php echo $data[4]; ?></td>
        </tr>
    <?php
    }
    ?>
    </table>


    




</body>
<?php   require 'footer.php'; ?>
</html>