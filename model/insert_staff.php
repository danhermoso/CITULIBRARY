<?php
session_start();

include('../db_connection.php');

$user_id = $_SESSION['id'];
$datetoday = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all form fields are set
    if (isset($_POST['name'], $_POST['position'], $_FILES['image_one'])) {
        // Retrieve form data
        $name = $_POST['name'];
        $position = $_POST['position'];

        // Handle file upload
        $imageOneFileName = $_FILES['image_one']['name'];
        $imageOneTempName = $_FILES['image_one']['tmp_name'];

        // Check if file upload is successful
        if (!empty($imageOneFileName) && is_uploaded_file($imageOneTempName)) {
            $imageOneUploadPath = '../staff/' . $imageOneFileName;

            if (move_uploaded_file($imageOneTempName, $imageOneUploadPath)) {
                // SQL query to insert data into the database
                $sql = "INSERT INTO staff_table (name, position, profile_link, user_id, date_created) VALUES ('$name', '$position', '$imageOneFileName',$user_id, '$datetoday')";

                // SQL query to insert data into the chatbot table
                $sql_chatbot = "INSERT INTO chatbot (question, answer, datetime) VALUES ('$name', '$position', '$datetoday')";

                // Execute the queries
                if ($connection->query($sql) === TRUE && $connection->query($sql_chatbot) === TRUE) {
                    // Success message and redirection
                    header("Location: ../staffdb.php");
                    exit();
                } else {
                    $errorMessage = "Error inserting record";
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

    // Display error message using SweetAlert2
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

    // Close the database connection
    $connection->close();
}
?>
