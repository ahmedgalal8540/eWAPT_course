<?php
// Get the user input from the form
$username = $_POST['username'];  // Assuming your form field is named 'username'
$password = $_POST['password'];  // Assuming your form field is named 'password'

// Check if the username and password match a predefined value (for demonstration purposes)
$valid_username = "user123";
$valid_password = "password123";

if ($username === $valid_username && $password === $valid_password) {
    // Login successful
    echo "<h1>Welcome, $username!</h1>";
} 
// else {
//     // Login failed
//     echo "<h1>Invalid credentials. Please try again.</h1>";
// }
?>
