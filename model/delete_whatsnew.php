<?php
// delete_whatsnew.php

// Include your database connection
include('../db_connection.php');

// Check if postId is set in the POST request
if(isset($_POST['postId'])) {
    // Get the user ID from the AJAX request
    $postId = $_POST['postId'];

    // Perform the deletion query
    $sql = "DELETE FROM list_new WHERE id = ?";

    $stmt = $connection->prepare($sql);

    // Bind the postId parameter
    $stmt->bind_param("i", $postId);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Deletion successful
        echo "success";
    } else {
        // Deletion failed
        echo "error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If postId is not set in the POST request
    echo "error: postId is not set";
}

// Close the database connection
$connection->close();
?>
