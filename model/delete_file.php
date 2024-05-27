<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    $filepath = "C:/xampp/htdocs/project/CITUMAINLIBRARY/CHAT-BOT-LISA/dataset/" . $filename;

    if (file_exists($filepath)) {
        if (unlink($filepath)) {
            echo "File deleted successfully.";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error deleting file.'
                    });
                  </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'File not found.'
                });
              </script>";
    }
}
?>
