<?php
header('Content-Type: application/json');
require_once 'db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Missing ID in URL"
    ]);
    exit;
}

$id = intval($_GET['id']);

if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Content-Type must be application/json"
    ]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['fname'], $data['lname'], $data['age'])) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Missing required fields: fname, lname, age"
    ]);
    exit;
}

$fname = $data['fname'];
$lname = $data['lname'];
$age   = $data['age'];

$sql = "UPDATE users SET fname = ?, lname = ?, age = ? WHERE id = ?";
$stmt = $con->prepare($sql);

if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Prepare failed: " . $con->error
    ]);
    exit;
}

$stmt->bind_param("ssii", $fname, $lname, $age, $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode([
            "success" => true,
            "message" => "User with ID $id updated successfully"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "No changes made or user not found"
        ]);
    }
} else {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Update failed: " . $stmt->error
    ]);
}
?>