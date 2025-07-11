
<?php
header('Content-Type: application/json');
require_once 'db.php';

$result = $con->query("SELECT * FROM users");

if (!$result) {
    http_response_code(500); 
    echo json_encode([
        "success" => false,
        "message" => "Query failed: " . $con->error
    ]);
    exit;
}


$response = [
    "success" => true,
    "count" => $result->num_rows,
    "users" => []
];

while ($row = $result->fetch_assoc()) {
    $response["students"][] = [
        "id" => $row["id"],
        "first_name" => $row["fname"],
        "second_name" => $row["lname"],
        "age" => $row["age"],
        "update_url" => "Update_page.php?id=" . $row["id"],
        "delete_url" => "Delete_page.php?id=" . $row["id"]
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT);
?>