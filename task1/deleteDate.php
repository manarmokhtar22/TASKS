<?php
require_once 'db.php';
$id=6;
$age=11.00;
$query = $con->prepare("delete from users where id = ?");
$query->bind_param("i",$id);


if($query->execute()){
    echo "success";
   
} else {
     echo "Error: " . $query->error;
}
