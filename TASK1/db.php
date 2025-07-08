<?php
$host="localhost";
$username="root";
$password="";
$dbname="crud_abi";
$con=new mysqli($host,$username,$password,$dbname);
if($con->connect_error){
    echo "the connection failed.";
    exit();
}