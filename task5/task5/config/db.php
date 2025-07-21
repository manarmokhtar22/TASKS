<?php

$host="localhost";
$username="root";
$password="";
$dbname="dashboard";

$con=new mysqli($host,$username,$password,$dbname);

if($con->connect_error){
    echo "connection failed : ".$con->connect_error;
    exit();
}