<?php
session_start();

include('../db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sanitize the ID to prevent SQL injection
    $id = intval($id); // Convert to integer

    // Prepare SQL statement with the sanitized ID
    $sql = "SELECT * FROM list_new WHERE id = $id";

    // Execute query
    $result = $connection->query($sql);

    // Fetch data
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        echo json_encode($post); // Return the data as JSON
    } else {
        echo json_encode(["error" => "Post not found"]);
    }
} else {
    echo json_encode(["error" => "ID parameter not provided"]);
}

// Close connection
$connection->close();
?>
