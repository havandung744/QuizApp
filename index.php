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
        .timkiem{
          margin:auto;
          width: 286px;
        }
  </style>
</head>
<body>
  <?php
  require 'header.php';
  session_start();
    if(isset($_SESSION['user'])){
        echo "Welcome ". $_SESSION['user'];
    }else{
        header('location: Form_DN.php');
    }
  ?>
  <form method="get">
  <div class="timkiem">
    <label>
          <input type="text" name="search" placeholder="Tìm kiếm khóa học">
          <input type="submit" name="submit" value="Tìm kiếm">
    </label>
  </div>
  </form>
  <?php 
      include('connect.php');
      if (isset($_GET['submit'])) {
        $search=$_GET['search'];
        $sql="SELECT * FROM course WHERE name like '%$search%'";
        $do=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($do)>0) {
                        echo "<table border='10px' color='red'>
                            <tr>
                              <td>STT</td>
                              <td>Tên khóa học </td>
                              <td>create_day</td>
                              <td>update_day</td>
                            </tr>";
                       while ($row=mysqli_fetch_array($do)) {
                        echo "<tr>";
                            echo "<td>".$row[0]."</td>";  
                            echo "<td>".$row[1]."</td>";  
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]."</td>";  
                          echo "</tr>"; 
                       }
                       echo "</table>";
                      }
      }
   ?>

   <?php require 'footer.php' ?>
</body>
</html>