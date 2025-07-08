<?php
require_once 'db.php';
$fname = $_POST['fname'];
$row=$con->query("delete from users where fname ='$fname'");

if($row){
    echo "deleted";
}else{
    echo "not deleted";
}