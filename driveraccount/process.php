<?php
$mysqli=new mysqli('localhost','root','','wachemo')or die(mysqli_error($mysqli));
if(isset($_GET['open'])){
    $id=$_GET['open'];
    
    $result = $mysqli->query("UPDATE trip SET seen='seen' WHERE id=$id") or die( $mysqli->error);
header("location:../driveraccount/driverhome.php");
}else if(isset($_GET['view'])) {
    $id=$_GET['view'];
    
    $result = $mysqli->query("UPDATE allfile SET status='seen' WHERE id=$id") or die( $mysqli->error);
header("location:../distrbution/allreport.php");  
}
else if(isset($_GET['seen'])){
    $id=$_GET['seen'];
    
    $result = $mysqli->query("UPDATE proreport SET status='seen' WHERE id=$id") or die( $mysqli->error);
    header("location:../proreport/proview.php");
}

else if(isset($_GET['Active'])){
    $id=$_GET['Active'];
    
    $result = $mysqli->query("UPDATE orgtable SET AccountStates
    ='Active' WHERE id=$id") or die( $mysqli->error);
    header("location:../org/addaccount.php");
}

else if(isset($_GET['Panding'])){
    $id=$_GET['Panding'];
    
    $result = $mysqli->query("UPDATE orgtable SET AccountStates
    ='Panding' WHERE id=$id") or die( $mysqli->error);
    header("location:../org/addaccount.php");
}
else if(isset($_GET['Delate'])){
    $id=$_GET['Delate'];
    
    $result = $mysqli->query("UPDATE orgtable SET AccountStates
    ='Delate' WHERE id=$id") or die( $mysqli->error);
    header("location:../org/addaccount.php");
}
else if(isset($_GET['ACTIVE'])){
    $id=$_GET['ACTIVE'];
    
    $result = $mysqli->query("UPDATE users SET stutes
    ='Active' WHERE id=$id") or die( $mysqli->error);
    header("location:../mangeAccount/allusers.php");
}
else if(isset($_GET['orgseen'])){
    $id=$_GET['orgseen'];
    
    $result = $mysqli->query("UPDATE orgreport SET status
    ='seen' WHERE id=$id") or die( $mysqli->error);
    header("location:../org/viewreport.php");
}
else if(isset($_GET['PENDING'])){
    $id=$_GET['PENDING'];
    
    $result = $mysqli->query("UPDATE users SET stutes
    ='Panding' WHERE id=$id") or die( $mysqli->error);
    header("location:../mangeAccount/allusers.php");
}
else if(isset($_GET['reset'])){
    $id=$_GET['reset'];
    $pass = md5("wcu12345");
    $result = $mysqli->query("UPDATE users SET password
    ='$pass' WHERE id=$id") or die( $mysqli->error);
    header("location:../mangeAccount/allusers.php");
}else if(isset($_GET['incity'])){
    $id=$_GET['incity'];
   
    $result = $mysqli->query("UPDATE trip SET City
    ='in city' WHERE id=$id") or die( $mysqli->error);
    header("location:../trip/alltrip.php");
}else if(isset($_GET['outcity'])){
    $id=$_GET['outcity'];
    $result = $mysqli->query("UPDATE trip SET City
    ='out city' WHERE id=$id") or die( $mysqli->error);
    header("location:../trip/alltrip.php");
}else if(isset($_GET['reseen'])){
    $id=$_GET['reseen'];
    $result = $mysqli->query("UPDATE report SET stutes
    ='seen' WHERE id=$id") or die( $mysqli->error);
    header("location:../report/report.php");
}else if(isset($_GET['eventseen'])){
    $id=$_GET['eventseen'];
    $Activity=$_GET['activity'];
    $startdate=$_GET['date'];
    $enddate=$_GET['enddate'];
    $Activitytype=$_GET['typesof'];
    $colore=$_GET['colore'];
    $result = $mysqli->query("UPDATE schedule set title =' $Activitytype' WHERE id=$id") or die( $mysqli->error);
    header("location:../report/report.php");
}
?>