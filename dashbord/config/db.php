
<?php
$host="localhost";
$username="root";
$password="";
$dbname="dashbord";
$con=new mysqli($host,$username,$password,$dbname);
if($con->connect_error){
    echo "the connection failed.";
    exit();
}