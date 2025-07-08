<?php
require_once 'db.php';
$re=$con->query("select * from users");
if($re->num_rows>0){
    while($test=$re->fetch_assoc()){
        echo $test['id']."->".$test['lname']."<br>";
    }
}else{
    echo "No records found.";
}