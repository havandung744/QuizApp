<?php include 'connect.php';
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
    require 'header1.php';
    require 'footer.php';
    if (isset($_SESSION['user'])) {
        echo "Welcome " . $_SESSION['user'];
    } else {
        header('location: Form_DN.php');
    }
    ?>


    <table>
        <h2 class='canle'>Học viên</h2>
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
            <th>Tên học viên</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Cấp độ</th>
            <th>ngày tạo</th>
            <th>ngày cập nhật</th>
            <th>Số lượng đề thi đã làm</th>
        </tr>
        <?php
        // $records = mysqli_query($conn, "SELECT * FROM users WHERE NOT EXISTS(SELECT user_id FROM results WHERE users.user_id = results.user_id)AND level='0'");
        $records = mysqli_query($conn, "SELECT user_id, COUNT(user_id) AS so_luong
        FROM results
        GROUP BY user_id ORDER BY user_id LIMIT 1");
        $row = mysqli_fetch_array($records);
        $temp = $row[1];

        $records = mysqli_query($conn, "SELECT users.user_id,users.name,users.user_name,users.user_pass,users.level,users.create_day,users.update_day, COUNT(results.user_id) AS so_luong
        FROM results JOIN users
        ON results.user_id = users.user_id
        GROUP BY results.user_id
        HAVING so_luong = '$temp'");

        $stt = 1;
        while ($data = mysqli_fetch_array($records)) {
        ?>
            <tr>
                <td><?php echo $stt;
                    $stt++; ?></td>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]; ?></td>
                <td><?php echo $data[4]; ?></td>
                <td><?php echo $data[5]; ?></td>
                <td><?php echo $data[6]; ?></td>
                <td><?php echo $data[7]; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>


</body>

</html>