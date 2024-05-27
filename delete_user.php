<?php
// delete_user.php

// Include your database connection
include('db_connection.php');

// Get the user ID from the AJAX request
$userId = $_POST['userId'];

// Perform the deletion query
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $userId);

if ($stmt->execute()) {
    // Deletion successful
    echo "success";
} else {
    // Deletion failed
    echo "error";
}

// Close the prepared statement and database connection
$stmt->close();
$connection->close();
?>
