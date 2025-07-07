<?php
require_once 'db.php';

$fname='magico';
$lname='marwan';
$age=221.00;
$query = $con->prepare("insert into users (fname,lname,age) values(?,?,?)");
$query->bind_param("ssd", $fname,$lname,$age);

if($query->execute()){
     echo "success";
} else {
    echo "Error: " . $query->error;
}
