
<?php
//$con = new mysqli("localhost","root","","web",3306);
//build docker dùng dòng 5
$con = new mysqli("db","melp","1234","web",3306);
if($con->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
