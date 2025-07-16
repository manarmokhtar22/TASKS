<?php

include("config/db.php");

$userName = $_POST['username'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM users WHERE username = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("s", $userName);

$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

// $user [ id = 1 , username = amir , password = 123 , created_at = 20:11 12/7 ]

if ($user && $pass == $user['password']) {
   header(header: "location: index.php");
}else {

          header("location: login.php?error = user not valid ");

}

