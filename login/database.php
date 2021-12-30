<?php
    $servername     =   'localhost';
    $username       =   'root';
    $password       =   '';
    $dbname         =   "wcu";
    $connection     =   mysqli_connect($servername, $username, $password,"$dbname");
if(!$connection)
{
   die('Could not Connect My Sql:' .mysql_error());
}
