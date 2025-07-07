<?php
require_once 'db.php';
    $id = 6;
    $query = $con->prepare("SELECT * FROM users WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>User Details</h2>";
        echo "<hr>";
        echo "First Name: " . $row['fname'] . "<br>";
        echo "Last Name: " . $row['lname'] . "<br>";
        echo "Age: " . $row['age'] . "<br>";
    } else {
        echo "No user found with ID = " . $id;
    }
?>
