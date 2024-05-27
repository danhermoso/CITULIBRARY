<?php
// Start the session
session_start();

// Include the database connection
include('../db_connection.php');

// Initialize error message variable
$errorMessage = "";

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all form fields are set
    if (isset($_POST['title'], $_POST['info'], $_POST['web_link'])) {
        // Retrieve form data
        $title = $_POST['title'];
        $info = $_POST['info'];
        $web_link = $_POST['web_link']; // Define $web_link variable

        // Prepare the SQL statement with a placeholder for data
        $sql = "INSERT INTO ejournal_table (title, info, web_link, user_id, date_created) VALUES (?, ?, ?, ?, ?)";
        // Prepare and bind the statement
        if ($stmt = $connection->prepare($sql)) {
            // Bind parameters
            // Ensure that the data types provided in the bind_param function match the order of placeholders in the SQL statement
            $stmt->bind_param("sssis", $title, $info, $web_link, $_SESSION['id'], date('Y-m-d H:i:s'));

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect upon successful insertion
                header("Location: ../ejournaldb.php");
                exit();
            } else {
                // Error message for database insertion failure
                $errorMessage = "Error inserting record into ejournal_table: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            // Error message for database preparation failure
            $errorMessage = "Error preparing statement: " . $connection->error;
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
