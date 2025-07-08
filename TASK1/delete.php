<?php
require_once 'db.php';
$id=12;
$row=$con->query("delete from users where id ='$id'");