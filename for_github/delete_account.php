<?php
// Include your database connection code here
require "conn-db.php";
// Check if the "delete_account" button is clicked
if (isset($_POST["delete_account"])) {
    // Get the user's ID or other unique identifier for the account to delete
    $name = $_SESSION["user"]["username"]; // You should replace this with your authentication mechanism
    
    // Write a SQL query to delete the user's account
    $deleteQuery = "DELETE FROM doctor WHERE name = (?)";
    // Prepare and execute the query
    $stmt = $connection->prepare($deleteQuery);
    $stmt->bind_param("s", $name);
    
    if ($stmt->execute()) {
        // Account deleted successfully
        sleep(1);
        session_unset(); // Optionally log the user out
        session_destroy();
        header("Location: index.php"); // Redirect to a confirmation page
        exit();
    } else {
        // Account deletion failed
        echo "Account deletion failed. Please try again or contact support.";
    }
}

        // $conn = new mysqli("localhost", "ahmed", "password", "mysql");
        // $stmt = $conn->prepare("INSERT INTO images (image_path, description,name) VALUES (?, ?,?)");
        // $stmt->bind_param("sss", $targetFile, $description,$username);
        // $stmt->execute();
        // $stmt->close();

?>
