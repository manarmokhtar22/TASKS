<?php
session_start();
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $pass = trim($_POST['password']);

   
    if (empty($name) || empty($pass)) {
        header("Location: login.php?error=Please fill in all fields");
        exit;
    }

    $sql = $con->prepare("
        SELECT users.*, roles.role_name 
        FROM users 
        INNER JOIN roles ON users.roleID = roles.id 
        WHERE users.name = ?
    ");
    $sql->bind_param("s", $name);
    $sql->execute();
    $result = $sql->get_result();
    $user = $result->fetch_assoc();

    
    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user'] = [
            'id'        => $user['id'],
            'email'     => $user['email'],
            'name'      => $user['name'],
            'roleID'    => $user['roleID'],
            'role_name' => $user['role_name']
        ];
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=Invalid name or password");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}