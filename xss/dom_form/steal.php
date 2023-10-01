<?php
// Check if the "username" field is set in the POST data
if (isset($_POST['username'])) {
    // Get the value of the "username" field from the POST data
    $username = $_POST['username'];

    // Specify the file name and open it for writing (creates the file if it doesn't exist)
    $filename = "/var/www/html/Doctor/log.txt";
    $file = fopen($filename, "w");

    if ($file) {
        // Write the username to the file
        fwrite($file, $username);

        // Close the file
        fclose($file);

        echo "Username has been received and saved successfully.";
    } else {
        echo "Unable to open or create the file.";
    }
} else {
    echo "No 'username' field found in the POST data.";
}
?>