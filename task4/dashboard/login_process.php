<?php

require_once 'config/db.php';

$email = $_POST['email'];
$pass  = $_POST['password'];

$sql = $con->prepare("SELECT * FROM users WHERE email = ?");
$sql->bind_param("s", $email);
$sql->execute();

$result = $sql->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($pass, $user['password'])) {
    echo "Hello, " . htmlspecialchars($user['email']);
} else {
    echo "No user found or incorrect password.";
}
