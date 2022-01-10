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

        #canle{
            margin-left: 500px;
        }
    </style>
</head>



<body>
    <?php
    require 'header1.php';
    if (isset($_SESSION['user'])) {
        echo "Welcome " . $_SESSION['user'];
        echo "<br><br>";
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
            <th>Câu hỏi</th>
            <th>Đáp án</th>
            <th>Thuộc khóa học</th>
            <th>Trạng thái</th>
            <th>Cấp độ</th>
            <th>Tạo ngày</th>
            <th>Cập nhật ngày</th>
            <th>type</th>
        </tr>
        <?php
        $stt=1;
    $records =mysqli_query($conn, "SELECT q.question,qc.choice,c.name,q.is_active,q.level,q.create_day,q.update_day,q.type
    FROM questions q JOIN question_choices qc
    ON q.question_id = qc.question_id
    JOIN course c ON c.course_id =q.coures_id
    WHERE qc.is_right_choice='1'");
    while ($data = mysqli_fetch_array($records)) {
    ?>
        <tr>
            <td><?php echo $stt; $stt++;?></td>
            <td><?php echo htmlspecialchars($data[0]) ?></td>
            <td><?php echo htmlspecialchars($data[1]) ?></td>
            <td><?php echo htmlspecialchars($data[2]) ?></td>
            <td><?php echo htmlspecialchars($data[3]) ?></td>
            <td><?php echo htmlspecialchars($data[4]) ?></td>
            <td><?php echo htmlspecialchars($data[5]) ?></td>
            <td><?php echo htmlspecialchars($data[6]) ?></td>
            <td><?php echo htmlspecialchars($data[7]) ?></td>
        </tr>
    <?php
    }
    ?>
       
      
       
    </table>

<?php   require 'footer.php'; ?>
</body>

</html>