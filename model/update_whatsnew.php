<?php
session_start();

include('../db_connection.php');

$user_id = $_SESSION['id'];
$datetoday = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'] ?? null; // Use the null coalescing operator to handle undefined index
    $name = $_POST['name'] ?? null;
    $description = $_POST['description'] ?? null; // Correct the typo here from 'name' to 'description'

    // Handle file upload
    $imageOneFileName = $_FILES['image']['name'];
    $imageOneTempName = $_FILES['image']['tmp_name'];
    $imageOneUploadPath = '../whatsnew/' . $imageOneFileName;

    move_uploaded_file($imageOneTempName, $imageOneUploadPath);

    // Check if the ID is provided and is numeric
    if ($id !== null && is_numeric($id)) {
        // SQL query to update data in the database
        $sql = "UPDATE list_new SET name = '$name', description = '$description', image_link = '$imageOneFileName', user_id = $user_id, date_created = '$datetoday' WHERE id = $id";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            $errorMessage = "Successfully Updated!";
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
    } else {
        echo "Invalid ID provided.";
    }

    // Close the database connection
    $connection->close();
}
?>
