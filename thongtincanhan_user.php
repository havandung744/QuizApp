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
        .active5 {
            background-color: #ff7700;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            width: 500px;
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

    </style>
</head>

<body>
    <?php
    require 'header.php';
    if (isset($_SESSION['user'])) {
        echo "Welcome " . $_SESSION['user'];
    } else {
        header('location: Form_DN.php');
    }
    ?>


    <table>
        <h3 class='canle'>Thông tin cá nhân</h3>
        <?php
        if (isset($_SESSION['tb'])) {
            $x = $_SESSION['tb'];
            echo "<h2 class=\"canle\"> $x </h2>";
        }
        unset($_SESSION['tb']);
        ?>
        <tr>
            <th>ID</th>
            <th>Tên Admin</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Cấp độ</th>
            <th>ngày tạo</th>
            <th>ngày cập nhật</th>
        </tr>
        <?php
        $user = $_SESSION['u'];
        $pass = $_SESSION['p'];
        $records = mysqli_query($conn, "SELECT * FROM users WHERE user_name='$user' AND user_pass ='$pass' ");
        while ($data = mysqli_fetch_array($records)) {
        ?>
            <tr>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]; ?></td>
                <td><?php echo $data[4]; ?></td>
                <td><?php echo $data[5]; ?></td>
                <td><?php echo $data[6]; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

<?php  require 'footer.php'; ?>
</body>

</html>