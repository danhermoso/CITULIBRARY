<?php
session_start();

include('../db_connection.php');

$user_id = $_SESSION['id'];
$datetoday = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id']; // Assuming you're passing the ID of the record to update
    $description1 = $_POST['description1'];

    // Use prepared statements to prevent SQL injection
    $del = "DELETE FROM list_new_details WHERE new_id = ?";
    $stmt_del = $connection->prepare($del);
    $stmt_del->bind_param("i", $id);
    $stmt_del->execute();

    $sql_chatbot = "INSERT INTO list_new_details (new_id, description_1) VALUES (?, ?)";
    $stmt_chatbot = $connection->prepare($sql_chatbot);
    $stmt_chatbot->bind_param("is", $id, $description1);

    if ($stmt_chatbot->execute()) {
        $successMessage = "Successfully Updated!";
        header("Location: ../whatsnew.php");
        exit();
    } else {
        echo "<script>
                Swal.fire({
                  title: 'Error!',
                  text: 'Error updating record',
                  icon: 'error',
                  confirmButtonText: 'OK'
                }).then(function() {
                  window.history.back();  
                });
              </script>";
    }

    // Close the prepared statements
    $stmt_del->close();
    $stmt_chatbot->close();
}

// Close the database connection
$connection->close();

return $successMessage;
?>
