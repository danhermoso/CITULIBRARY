<?php

// Include your database connection
include('db_connection.php');

// Get the data from the AJAX request
$userId = $_POST['userId'];
$newName = $_POST['newName'];
$newPosition = $_POST['newPosition'];

// Check if a file was uploaded
if(isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profilePicture']['tmp_name'];
    $fileName = $_FILES['profilePicture']['name'];
    $fileSize = $_FILES['profilePicture']['size'];
    $fileType = $_FILES['profilePicture']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Generate a unique file name to prevent conflicts
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // Define allowed file extensions
    $allowedExtensions = array('jpg', 'jpeg', 'png');

    // Check if the uploaded file has an allowed extension
    if (in_array($fileExtension, $allowedExtensions)) {
        // Upload directory
        $uploadDir = 'staff/';

        // Destination path for uploaded file
        $destPath = $uploadDir . $newFileName;

        // Move the uploaded file to the destination directory
        if(move_uploaded_file($fileTmpPath, $destPath)) {
            // Perform the update query including the image file name
            $sql = "UPDATE staff_table SET name = ?, position = ?, profile_link = ? WHERE id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sssi", $newName, $newPosition, $newFileName, $userId);

            if ($stmt->execute()) {
                // Update successful
                echo "success";
            } else {
                // Update failed
                echo "error";
            }
        } else {
            // Error in uploading file
            echo "upload_error";
        }
    } else {
        // File extension not allowed
        echo "extension_error";
    }
} else {
    // No file uploaded, update only name and position
    $sql = "UPDATE staff_table SET name = ?, position = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi", $newName, $newPosition, $userId);

    if ($stmt->execute()) {
        // Update successful
        echo "success";
    } else {
        // Update failed
        echo "error";
    }
}

// Close the prepared statement and database connection
$stmt->close();
$connection->close();
?>
