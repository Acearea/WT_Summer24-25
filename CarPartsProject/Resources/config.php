<!DOCTYPE html>
<html><head></head>
<body>
<?php

$host="localhost";
$user="root";
$pass="";
$dbName="carautoshop";

$conn= new mysqli($host,$user,$pass,$dbName);
if($conn->connect_error){
    die("Connection Failled".$conn->connect_error);
}
else{
    //echo "Connection Sucessful";//
}

?>
</body>
</html>