

<?php
session_start();

include('../db_connection.php');

$datetoday = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];

    
    // SQL query to insert data into the database
    $sql = "INSERT INTO chatbot (question, answer, datetime) VALUES ('$name', '$description', '$datetoday')";

    
    // Execute the query
    if ($connection->query($sql) === TRUE) {
            $errorMessage = "Successfully Insert!";
            header("Location: ../chatbotdb.php");
            exit();
    } else {
        echo "<script>
                Swal.fire({
                  title: 'Error!',
                  text: 'Error inserting record',
                  icon: 'error',
                  confirmButtonText: 'OK'
                }).then(function() {
                  window.history.back();  
                });
              </script>";
    }



    // Close the database connection
    $connection->close();
}
?>
