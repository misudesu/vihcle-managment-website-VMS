<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "wachemo";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if ($conn==false) {
	echo "Connection failed!";
}