<?php
// Check if newId and postId are set in the POST request
if(isset($_POST['newId']) && isset($_POST['postId'])) {
    // Get the new ID and post ID from the AJAX request
    $newId = $_POST['newId'];
    $postId = $_POST['postId'];

    // Perform the deletion query
    $sql = "DELETE FROM list_new_details WHERE new_id = ? AND id = ?";

    $stmt = $connection->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ii", $newId, $postId);

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
    // If newId or postId is not set in the POST request
    echo "error: newId or postId is not set";
}
?>
