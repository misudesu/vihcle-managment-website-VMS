<?php
$servername = "localhost";
$usernames = "root";
$passwords = "";
$dbname = "wcu";
// Create connection
$conn = new mysqli($servername, $usernames, $passwords, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$id=$_REQUEST['id'];
if(isset($_POST['save'])){


$fullname=$_REQUEST['fullname'];
$email=$_REQUEST['email'];
$phonenumber=$_REQUEST['phonenumber'];

$password=$_REQUEST['password'];
$driverid=$_POST['driverid'];
$carid=$_REQUEST['carid'];
$startdate=$_REQUEST['startdate'];
$startime=$_REQUEST['starttime'];
$enddate=$_REQUEST['enddate'];
$endtime=$_REQUEST['endtime'];
$registrationdeadline=$_REQUEST['registrationdeadline'];
$timezone=$_REQUEST['timezone'];
$age=$_REQUEST['age'];
$country=$_REQUEST['country'];
$address=$_REQUEST['address'];
$zone=$_REQUEST['zone'];
$city=$_REQUEST['city'];
$dphoto=$_FILES['dphoto']['name'];
$tm=$_FILES['dphoto'] ['tmp_name'];
$dlicense=$_FILES['dlicense']['name'];
$tmL=$_FILES['dlicense'] ['tmp_name'];


move_uploaded_file($tm,"../image/".$dphoto);
move_uploaded_file($tmL,"../image/".$dlicense);
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$hashed_password = md5($password);
//echo "<img src='$dphoto' width=300 height=300>";
$sql = "INSERT INTO driver 
VALUES ('','$fullname','	$email',	'$phonenumber',
'	$driverid',	'$carid',
'	$startdate','	$startime','	$enddate','	$endtime','	$registrationdeadline','	$timezone','	$age',
	'$country','	$address',	'$zone',	'$city',	'$dphoto','$dlicense','Active'	
)";
$regsterd = "INSERT INTO users
VALUES ( '',
'$driverid','$hashed_password','$fullname','driver','Active'
)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($conn->query($regsterd) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $regsterd . "<br>" . $conn->error;
}
$conn->close();
}
?>