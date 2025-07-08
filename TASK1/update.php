<?php
require_once 'db.php';
$id=2;
$row=$con->query("update users set age=200 where id='$id'");