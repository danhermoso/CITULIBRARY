<?php
session_start();

include('../db_connection.php');

$user_id = $_SESSION['id'];
$datetoday = date('Y-m-d H:i:s');
$errorMessage = ""; // Initialize error message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all form fields are set
    if (isset($_POST['name'], $_POST['position'], $_FILES['image_one'])) {
        // Retrieve form data
        $title = $_POST['name'];
        $description = $_POST['position'];

        // Handle file upload
        $imageOneFileName = $_FILES['image_one']['name'];
        $imageOneTempName = $_FILES['image_one']['tmp_name'];

        // Check if file upload is successful
        if (!empty($imageOneFileName) && is_uploaded_file($imageOneTempName)) {
            $imageOneUploadPath = '../services/' . $imageOneFileName;

            if (move_uploaded_file($imageOneTempName, $imageOneUploadPath)) {
                // SQL query to insert data into the database
                $sql = "INSERT INTO service_table (title, description, pic_link, user_id, date_created) VALUES ('$title', '$description', '$imageOneFileName', $user_id, '$datetoday')";

                // Execute the query
                if ($connection->query($sql) === TRUE) {
                    // Success message and redirection
                    header("Location: ../servicesdb.php");
                    exit();
                } else {
                    // Error message for database insertion failure
                    $errorMessage = "Error inserting record into list_services: " . $connection->error;
                }
            } else {
                $errorMessage = "Error moving uploaded file";
            }
        } else {
            $errorMessage = "File upload failed";
        }
    } else {
        $errorMessage = "Missing form fields";
    }
}

// Display error message using JavaScript alert
if (!empty($errorMessage)) {
    echo "<script>
            Swal.fire({
              title: 'Error!',
              text: '$errorMessage',
              icon: 'error',
              confirmButtonText: 'OK'
            }).then(function() {
              window.history.back();  
            });
          </script>";
}

// Close the database connection
$connection->close();
?>
