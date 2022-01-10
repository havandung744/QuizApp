<?php
include 'connect.php';
session_start();
?>
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

        .canle {
            margin-left: 500px;
        }

        a{
            text-decoration: none;
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
    ?>





    <table>
        <h2 class='canle'>Danh sách đề thi</h2>
        <?php
        if (isset($_SESSION['tb'])) {
            $x = $_SESSION['tb'];
            echo "<h2 class=\"canle\"> $x </h2>";
        }
        unset($_SESSION['tb']);
        ?>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên đề thi</th>
            <th>Thuộc khóa học</th>
            <th>Thời gian làm bài</th>
            <th>Tổng số câu hỏi</th>
            <th>số câu hỏi dễ</th>
            <th>số câu hỏi trung bình</th>
            <th>số câu hỏi khó</th>
            <th>ngày tạo</th>
            <th>ngày cập nhật</th>
            <th colspan="2"><a href="taodethi.php">Create</a></th>
        </tr>
        <?php
        $stt=1;
        $records = mysqli_query($conn, "SELECT *
    FROM exams JOIN course
    ON exams.course_id = course.course_id");
        while ($data = mysqli_fetch_array($records)) {
        ?>
            <tr>
                <td><?php echo $stt;$stt++; ?></td>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[11]; ?></td>
                <td><?php echo $data[9] . " minutes"; ?></td>
                <td><?php echo $data[3]; ?></td>
                <td><?php echo $data[6]; ?></td>
                <td><?php echo $data[5]; ?></td>
                <td><?php echo $data[4]; ?></td>
                <td><?php echo $data[7]; ?></td>
                <td><?php echo $data[8]; ?></td>
                <td><a href="delete_dt.php?id=<?php echo $data[0]; ?>">Delete</a></td>
                <td> <a href="update_dt.php?id=<?php echo $data[0]; ?>">Update</a></td>
            </tr>

        <?php
        }
        ?>




    </table>




</body>
<?php require 'footer.php'; ?>

</html>