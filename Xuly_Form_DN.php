<?php
    include 'connect.php';
    session_start();
        if(isset($_POST['submit'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $_SESSION['u']=$user;
            $_SESSION['p']=$pass;
            $_SESSION['pass']=$pass;
            $row = mysqli_query($conn, "SELECT * FROM users WHERE user_name='$user' AND user_pass ='$pass' ");
            $row1 = mysqli_query($conn, "SELECT * FROM users WHERE user_name='$user' ");

            $count = mysqli_num_rows($row);
            $count1 = mysqli_num_rows($row1);
            if(trim($user)=="" || trim($pass)==""){
                $_SESSION['tb'] = "Không để trống tài khoản, mật khẩu";
                header("location: Form_DN.php");
            }else{
                if($count==1){
                    $level = mysqli_fetch_array($row);
                    $_SESSION['user']=$level[1];
                    if($level[4]==1){
                        header("location: index1.php");
                    }elseif($level[4]==0){
                        header("location: index.php");
                    }
                }else{
                    $level1 = mysqli_fetch_array($row1);
                    if($user != $level1[2]){
                        $_SESSION['tb'] = "Tài khoản không chính xác";
                    }else{
                        $_SESSION['tb'] = "Mật khẩu không chính xác";
                    }
                    header("location: Form_DN.php");
                }
               
            }
            
        }

        
        if(isset($_POST['reset'])){
            // $_POST['user'] = "";
            // $_POST['pass'] = "";
            $_SESSION['u']="";
            $_SESSION['p']="";
            header('location: Form_DN.php');
        }
    ?>