<?php
    include 'mysql_login.php';

    $conn=new mysqli($hostname,$username,$password,$database);
if($conn->connect_error) die($conn->connect_error);

session_start();
$value1=$_SESSION['username'];
$sql="SELECT 'password' FROM 'common' WHERE username='$value1'";

$result=mysqli_query($conn,$sql);
if(!$result) die('SORRY!');
$value2=$result->fetch_assoc('password');

$sql="INSERT INTO `login_doctor`('username', 'password') VALUES ('$value1','$value2')";
$result=mysqli_query($conn,$sql);
if(!$result) die('couldn;t store it');
else echo "value is stored";


?>