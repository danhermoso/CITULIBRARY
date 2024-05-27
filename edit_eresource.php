<?php
// Include your database connection
include('db_connection.php');

// Get the data from the AJAX request
$eresourceId = $_POST['eresourceId'];
$newTitle = $_POST['newTitle'];
$newInfo = $_POST['newInfo'];
$newWebLink = $_POST['newWebLink'];

// Perform the update query
$sql = "UPDATE eresources_table SET title = ?, info = ?, web_link = ? WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("sssi", $newTitle, $newInfo, $newWebLink, $eresourceId);

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
