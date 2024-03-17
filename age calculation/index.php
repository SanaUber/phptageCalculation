<?php
$serverName="localhost";
$userName="root";
$password="";
$dbName="information";
//create connection
$con = mysqli_connect($serverName,$userName,$password,$dbName);
if(mysqli_connect_errno()){
    echo "fail";
   exit();
}
echo "bismillah";
?> 