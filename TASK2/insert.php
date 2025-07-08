<?php
require_once 'db.php';


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$row=$con->query("insert into users (fname,lname,age) values('$fname','$lname',$age)");

if($row){
    echo "inserted";
}else{
        echo " not inserted".$con->error;
}