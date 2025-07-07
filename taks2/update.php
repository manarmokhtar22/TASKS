<?php

require_once 'db.php';

$username=$_POST['username'];
$age=$_POST['age'];

$sql=$con->prepare("update users set age =? where username=?");
$sql->bind_param("is",$age,$username);


if ($sql->execute()) {
    echo "Done";
} else {
    echo "Error Not Updated Because: " . $sql->error;
}
