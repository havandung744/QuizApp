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

        .canle {
            margin-left: 500px;
        }
    </style>
</head>

<body>
    <?php
    include 'connect.php';
    require 'header1.php';
    session_start();
    if (isset($_SESSION['user'])) {
        echo "Welcome " . $_SESSION['user'];
    } else {
        header('location: Form_DN.php');
    }
    ?>





    <table>
        <h2 class='canle'>Kết quả thi</h2>
        <?php
        if (isset($_SESSION['tb'])) {
            $x = $_SESSION['tb'];
            echo "<h2 class=\"canle\"> $x </h2>";
        }
        unset($_SESSION['tb']);
        ?>
        <tr>
            <th>STT</th>
            <th>Mã kết quả</th>
            <th>mã bài thi</th>
            <th>Mã học viên</th>
            <th>Tên Tài khoản</th>
            <th>kết quả</th>
            <th>Thời gian</th>
        </tr>
        <?php
        $stt=1;
        $records = mysqli_query($conn, "SELECT results.result_id,results.exam_id,results.user_id,users.user_name,results.scores,results.create_day
    FROM users JOIN results
    ON users.user_id = results.user_id");

        while ($data = mysqli_fetch_array($records)) {
        ?>
            <tr>
                <td><?php echo $stt; $stt++; ?></td>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]; ?></td>
                <td><?php echo $data[4]; ?></td>
                <td><?php echo $data[5]; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>







</body>
<?php require 'footer.php'; ?>

</html>