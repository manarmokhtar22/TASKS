<?php
require_once 'db.php';
$id=6;
$age=11.00;
$query = $con->prepare("update users set age=? where id=?");
$query->bind_param("di", $age,$id);
$query->execute();

if($query->error){
    echo "Error: " . $query->error;
} else {
    echo "success";
}
