<?php
$servername = "localhost";
$usernames = "root";
$passwords = "";
$dbname = "wachemo";

//$id=$_REQUEST['id'];
$orgname=$_REQUEST['orgName'];
$username=$_REQUEST['orgID'];
$password=$_REQUEST['password'];
$startdate=$_REQUEST['StatrDate'];
$startime=$_REQUEST['StartTime'];
$enddate=$_REQUEST['EndDate'];
$endtime=$_REQUEST['EndTime'];
$address=$_REQUEST['orgAddress'];
$orgfile=$_FILES['orgFile']['name'];
$tm=$_FILES['orgFile'] ['tmp_name'];
// Create connection
$conn = new mysqli($servername, $usernames, $passwords, $dbname);
move_uploaded_file($tm,"../file/".$orgfile);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO orgtable 
VALUES ('','$username',
'$orgname','$address','$orgfile','$startdate','$startime','	$enddate','	$endtime'
		,'Active'	
)";
$pass = md5($password);
$regsterd = "INSERT INTO users 

VALUES ( '',

'$username','$pass','$orgname','org','Active'
)";
$document = "INSERT INTO orgfile 
VALUES ( '',
'$orgname','$username','$startdate','$orgfile','request'
)";
if ($conn->query($document) === TRUE) {
    echo "Document saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($conn->query($sql) === TRUE) {
    echo "Acount created successfully"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($conn->query($regsterd) === TRUE) {
    echo "New record created successfully";
    header("location: addaccount.php");
} else {
    echo "Error: " . $regsterd . "<br>" . $conn->error;
}
$conn->close();
?>