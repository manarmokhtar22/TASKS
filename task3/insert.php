<?php
header('Content-Type: application/json');
require_once 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['fname'], $data['lname'], $data['age'])) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Missing required fields (fname, lname, age)"
    ]);
    exit;
}

$fname = $data['fname']; 
$lname = $data['lname'];
$age   = $data['age'];

$sql = "INSERT INTO users (fname, lname, age) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);

if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Prepare failed: " . $con->error
    ]);
    exit;
}

$stmt->bind_param("ssi", $fname, $lname, $age);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "User added successfully"
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Insert failed: " . $stmt->error
    ]);
}
?>