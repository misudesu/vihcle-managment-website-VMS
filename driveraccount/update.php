
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
if(isset($_POST['id'])){
  $id=$_POST['id'];
  $date=$_POST['date'];
  $travllocation=$_POST['travllocation'];
  $arrivedate=$_POST['arrivedate'];
  $km=$_POST['km'];
  $travldate=$_POST['travldate'];
  $carlocation=$_POST['carlo'];
  $gej=$_POST['gej'];
  $name=$_POST['name'];
  $carid=$_POST['carid'];
  $comment=$_POST['comment'];
  $file=$_FILES['file']['name'];
  $tmL=$_FILES['file'] ['tmp_name'];
  $oldfile = $_POST['old'];

if($_FILES['file']['size'] == 0) {

  $result = $conn->query("UPDATE report set name='$name',carid='$carid', date='$date', travllocation='$travllocation', arrivedate='$arrivedate', km='$km',travldate='$travldate' ,gej='$gej',comment='$comment', carlocation='$carlocation', file='$oldfile',stutes='new' WHERE date='$date'") or die( $conn->error);
  header("location: report.php");
} else {
move_uploaded_file($tmL,"../driveraccount/file/".$file);
$result = $conn->query("UPDATE report set name='$name',carid='$carid', date='$date', travllocation='$travllocation', arrivedate='$arrivedate', km='$km',travldate='$travldate' ,gej='$gej',comment='$comment', carlocation='$carlocation', file='$file',stutes='new' WHERE date='$date'") or die( $conn->error);
header("location: report.php");
}

  
 
}else{
    echo "nop";
}
?>