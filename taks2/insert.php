<?php

require_once 'db.php';

$username=$_POST['username'];
$age=$_POST['age'];

$sql=$con->prepare("insert into users (username,age) values(?,?)");
$sql->bind_param("si",$username,$age);

if($sql->execute()){
    echo "Done and the number of rows is : ".$sql->affected_rows;
}else{
    echo "Error Not Inserted Because : ".$sql->error;
}