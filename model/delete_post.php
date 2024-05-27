<?php
// delete_post.php

// Include your database connection
include('../db_connection.php');

// Check if postId, type, and newId are set in the POST request
if(isset($_POST['postId'], $_POST['type'], $_POST['newId'])) {
    // Get the postId, type, and newId from the AJAX request
    $postId = $_POST['postId'];
    $type = $_POST['type'];
    $newId = $_POST['newId'];

    // Determine the table based on the type parameter
    $table = ($type === 'detail') ? 'list_new_details' : 'list_new';

    // Perform the deletion query
    if ($type === 'detail') {
        // Delete from list_new_details
        $sql = "DELETE FROM $table WHERE id = ? AND new_id = ?";
    } else {
        // Delete from list_new
        $sql = "DELETE FROM $table WHERE id = ?";
    }

    $stmt = $connection->prepare($sql);

    // Bind the postId parameter
    if ($type === 'detail') {
        $stmt->bind_param("ii", $postId, $newId);
    } else {
        $stmt->bind_param("i", $postId);
    }

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
    // If postId, type, or newId is not set in the POST request
    echo "error: postId, type, or newId is not set";
}

// Close the database connection
$connection->close();
?>
