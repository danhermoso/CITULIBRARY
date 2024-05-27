<?php
session_start();

include('../db_connection.php');

$user_id = $_SESSION['id'];
$datetoday = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Handle file upload
    $imageOneFileName = $_FILES['image_one']['name'];
    $imageOneTempName = $_FILES['image_one']['tmp_name'];
    $imageOneUploadPath = '../whatsnew/' . $imageOneFileName;

    move_uploaded_file($imageOneTempName, $imageOneUploadPath);

    // SQL query to insert data into the list_new table
    $sql_list_new = "INSERT INTO list_new (name, description, image_link, user_id, date_created) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt_list_new = $connection->prepare($sql_list_new);
    
    // Bind parameters
    $stmt_list_new->bind_param("sssis", $name, $description, $imageOneFileName, $user_id, $datetoday);
    
    // Execute the statement
    if ($stmt_list_new->execute()) {
        $errorMessage = "Successfully Insert!";
        // Close the prepared statement
        $stmt_list_new->close();
        
        // Insert data into the chatbot table
        $sql_chatbot = "INSERT INTO chatbot (question, answer, datetime) VALUES (?, ?, ?)";
        
        // Prepare the statement
        $stmt_chatbot = $connection->prepare($sql_chatbot);
        
        // Bind parameters
        $stmt_chatbot->bind_param("sss", $name, $description, $datetoday);
        
        // Execute the statement
        if ($stmt_chatbot->execute()) {
            // Close the prepared statement
            $stmt_chatbot->close();
            
            // Redirect to the whatsnew.php page upon successful insertion
            header("Location: ../whatsnew.php");
            exit();
        } else {
            $errorMessage = "Error inserting record into chatbot table: " . $connection->error;
        }
    } else {
        $errorMessage = "Error inserting record into list_new table: " . $connection->error;
    }

    // Close the database connection
    $connection->close();
    
    // If any error occurs, display it
    echo "<script>
                Swal.fire({
                  title: 'Error!',
                  text: '" . $errorMessage . "',
                  icon: 'error',
                  confirmButtonText: 'OK'
                }).then(function() {
                  window.history.back();  
                });
              </script>";
}
?>
