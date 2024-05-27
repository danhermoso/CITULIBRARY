<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve username and password from the form
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    // Check if the username exists in the database
    $query = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_start();
                // Password is correct, set session variables for authentication
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redirect to the dashboard upon successful login
                $errorMessage = "Successfully login!";
                header("Location: dashboard.php");
                exit();
            } else {
                $errorMessage = "Incorrect password. Please try again.";
                header("Location: index.php");
                exit();
            }
        } else {
            $errorMessage = "Username not found. Please check your username and try again.";
            header("Location: index.php");
            exit();
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle error if query fails
        $errorMessage = "Database error. Please try again later.";
    }

    // If the script reaches here, there was an error in the login process
    // Redirect the user back to the login page with an error message
    header("Location: login.php?error=" . urlencode($errorMessage));
    exit();
}
?>