<?php

require_once 'db.php';

$username=$_POST['username'];

$sql=$con->prepare("delete from users where username = ?");
$sql->bind_param("s",$username);

if($sql->execute()){
      if ($sql->affected_rows > 0) {
        echo "Done Number of rows deleted : " . $sql->affected_rows;
    } else {
        echo "No user found with that username";
    }
}else{
    echo "Error Not deleted Because : ".$sql->error;
}