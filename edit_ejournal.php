<?php
// Include your database connection
include('db_connection.php');

// Get the data from the AJAX request
$ejournalId = $_POST['ejournalId'];
$newTitle = $_POST['newTitle'];
$newInfo = $_POST['newInfo'];
$newWebLink = $_POST['newWebLink'];

// Perform the update query
$sql = "UPDATE ejournal_table SET title = ?, info = ?, web_link = ? WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("sssi", $newTitle, $newInfo, $newWebLink, $ejournalId);

if ($stmt->execute()) {
    // Update successful
    echo "success";
} else {
    // Update failed
    echo "error";
}

// Close the prepared statement and database connection
$stmt->close();
$connection->close();
?>
