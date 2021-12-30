<?php
$servername = "localhost";
$usernames = "root";
$passwords = "";
$dbname = "wachemo";
 // Create connection
$conn = new mysqli($servername, $usernames, $passwords, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['save']))
{

    $Activity=$_POST['activity'];
    $startdate=$_POST['date'];
    $enddate=$_POST['enddate'];
    $Activitytype=$_POST['typesof'];
    $colore=$_POST['colore'];
$sql="INSERT INTO alart values('',' $Activitytype','$startdate','$enddate','$Activity','$colore','New')";
if ($conn->query($sql) === TRUE) {
    $notif= "New record created successfully";
    header("location: alart.php");
} else {
    echo "Error: " .$conn."<br>" . $conn->error;
    header("location: alart.php");
}
$conn->close();
}else{
  $id=$_POST['id'];
  $Activity=$_POST['activity'];
  $startdate=$_POST['date'];
  $enddate=$_POST['enddate'];
  $Activitytype=$_POST['typesof'];
  $colore=$_POST['colore'];
  $result = $conn->query("UPDATE alart set enddate='$enddate', start='$startdate', Activity='$Activity', title =' $Activitytype',colore='$colore' WHERE id=$id") or die( $mysqli->error);
  header("location: alart.php");
}

?>
