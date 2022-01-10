<?php include 'connect.php';
  session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .active7 {
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

        .canle{
            margin-left: 500px;
        }


    </style>
</head>

<body>
    <?php
    require 'header1.php';
    if(isset($_SESSION['user'])){
        echo "Welcome ". $_SESSION['user'];
    }else{
        header('location: Form_DN.php');
    }
    ?>





<table>
    <h2 class='canle'>Danh sách khóa học</h2>
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
        </tr>
        <?php
        $stt=1;
    $ten=$_SESSION['daa'];
    $records = mysqli_query($conn, "select * from course WHERE name like '%$ten%'");
    while ($data = mysqli_fetch_array($records)) {
    ?>
        <tr>
            <td><?php echo $stt;$stt++; ?></td>
            <td><?php echo $data[0]; ?></td>
            <td><?php echo $data[1]; ?></td>
            <td><?php echo $data[2]; ?></td>
            <td><?php echo $data[3]; ?></td>
        </tr>
    <?php
    }
    ?>
    <a href="timkiem.php"> quay lại</a>
    </table>


    




</body>
<?php   require 'footer.php'; ?>
</html>