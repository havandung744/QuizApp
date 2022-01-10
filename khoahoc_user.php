<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .active1 {
            background-color: #ff7700;
        }
        .container .course {
            border: 1px solid #000;
            border-radius: 5px;
            width: 293px;
            height: 249px;
            background-color: white;
            margin: 30px;
        }
        .container{
            display: flex;
        }
        input{
            background-color: #5f5fdf;
            margin-left: 97px;
            width: 111px;
            height: 30px;
            color: white;
            border-radius: 5px;
            border: none;
            
        }
        p{
            margin-left: 20px;
            font-weight: bold;
            size: 20px;
        }
    </style>
</head>

<body>
    <?php
    require 'header.php';
    ?>
    <div class="container">
        <div class="course">
            <img src="anh.PNG">
            <p><a>Khóa học cơ bản</a></p>
            <input type="submit" name="submit" value="Vào học">
        </div>

        <div class="course">
            <img src="anh.PNG">
            <p><a>Khóa học vòng lặp</a></p>
            <input type="submit" name="submit" value="Vào học">
        </div>
        <div class="course">
            <img src="anh.PNG">
            <p><a>Khóa học hàm</a></p>
            <input type="submit" name="submit" value="Vào học">
        </div>

    </div>

</body>

<?php   require 'footer.php'; ?>

</html>