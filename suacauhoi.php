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
        .active {
            background-color: #ff7700;
        }

        form {
            margin: auto;
            text-align: center;
            width: auto;
            height: auto;
            border: red solid 1px;
            padding-top: 20px;
        }

        input {
            margin: 10px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: auto;
            height: auto;
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

        #canle{
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

    if (isset($_POST['submit']) && isset($_POST['da'])) {
        $da = $_POST['da'];
    } else {
        $da = "";
    }
    ?>


    <table>
        <?php
        if(isset($_SESSION['tb'])){
            $x = $_SESSION['tb'];
            echo "<h2 id=\"canle\"> $x </h2>";}
        unset($_SESSION['tb']);
        ?>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Câu hỏi</th>
            <th>Trạng thái</th>
            <th>Cấp độ</th>
            <th>Type</th>
            <th>Update</th>
        </tr>
        <?php
        $stt=1;
    $records = mysqli_query($conn, "select * from questions");
    while ($data = mysqli_fetch_array($records)) {
    ?>
        <tr>
            <td><?php echo $stt; $stt++; ?></td>
            <td><?php echo $data[0]; ?></td>
            <td><?php echo $data[2]; ?></td>
            <td><?php echo $data[3]; ?></td>
            <td><?php echo $data[4]; ?></td>
            <td><?php echo $data[8]; ?></td>
            <td><a href="update.php?id=<?php echo $data[0]; ?>">Update</a></td>
        </tr>
    <?php
    }
    ?>
       
      
       
    </table>

<?php   require 'footer.php'; ?>
</body>

</html>