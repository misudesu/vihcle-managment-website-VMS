<?php
$mysqli=new mysqli('localhost','root','','wachemo')or die(mysqli_error($mysqli));

if(isset($_POST['username']) && !empty($_POST['username'])){ 
    $driverid=$_POST['username'];
    $passwords=$_POST['password'];
  
        $hashed_password = md5($passwords);
        $result = $mysqli->query("UPDATE users SET password='$hashed_password' WHERE user_name='$driverid'") or die( $mysqli->error);
        $success="your password successfuly changed";
header("location:profile.php");
                              
            }else{
        $username_err= "contact Admin please";
       //header("location:profile.php");
    }   


?>