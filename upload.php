<?php
// Check if a file has been uploaded
if (isset($_FILES['files'])) {
    // Base URL of your Flask application
    $flaskBaseUrl = "http://172.16.97.38:5000"; // Update this with your Flask app's URL
 
    // Target URL to upload files to Flask app
    $uploadUrl = $flaskBaseUrl . "/upload";
 
    // Initialize cURL
    $curl = curl_init();
 
    // Set cURL options
    curl_setopt_array($curl, array(
        CURLOPT_URL => $uploadUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
            'files' => new CURLFile($_FILES['files']['tmp_name'][0], $_FILES['files']['type'][0], $_FILES['files']['name'][0])
        ),
    ));
 
    // Execute the cURL request
    $response = curl_exec($curl);
 
    // Check for errors
    if (curl_errno($curl)) {
        echo "Error: " . curl_error($curl);
    } else {
        // Close cURL
        curl_close($curl);
        
        // Redirect to chatbotdb.php
        header('Location: chatbotdb.php');
        exit();
    }
} else {
    // No file uploaded
    echo "No files uploaded.";
}
?>
