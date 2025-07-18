<?php
session_start();
require_once 'config/db.php';

$email = trim($_POST['email']);
$pass  = trim($_POST['password']);

$sql = $con->prepare("SELECT * FROM users WHERE email = ?");
$sql->bind_param("s", $email);
$sql->execute();

$result = $sql->get_result();
$user = $result->fetch_assoc();

if ($user && $pass == $user['password']) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'] 
    ];
    header("location: index.php");
    exit;
} else {
    header("location: login.php?error=User not found");
    exit;
}
