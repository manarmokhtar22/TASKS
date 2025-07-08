<?php
require_once 'db.php';
$fname=$_POST['fname'];
$age=$_POST['age'];
$row=$con->query("update users set age=$age where fname='$fname'");
if($row){
    echo "updated";
}else{
    echo "not updated";
}