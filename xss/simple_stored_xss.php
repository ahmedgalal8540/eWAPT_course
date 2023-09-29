<?php
// To get the best results follow the following : 
// Very important note : 
// create a user to access the database (I don't recommand root because of compatible error)
// So we will go through some steps : 
// write the following to terminal : 
// CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password'; 
// Remember : replace newuser with your favourite user
// This will create a user with password value password :
// write the following to terminal : 
// GRANT ALL PRIVILEGES ON database_name.* TO 'newuser'@'localhost'; 
// This step for granting the privilages of newuser ; 
// I suppose this newuser as ahmed 

//Start the connection : 
$connection = mysqli_connect("localhost", "ahmed", "password", "mysql");
if (isset($_GET["reset"])) {
    // Handle reset action
    mysqli_query($connection, "DELETE FROM users");
} elseif (isset($_GET["input"]) && !empty($_GET["input"])) {
    // Handle input submission only if it's not empty
    $userInput = $_GET['input'];
    mysqli_query($connection, "INSERT INTO users (name) VALUES ('$userInput')");
}

// Retrieve all saved inputs from the database
$result = mysqli_query($connection, "SELECT name FROM users");
$savedInputs = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $savedInputs[] = $row['name'];
    }
}
//Close connection 
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple stored xss</title>
</head>
<body>
<h1 style="display:flex; justify-content: center; align-items: center;">This is simple stored XSS</h1>
<div style="display:flex; justify-content: center; align-items: center;">
<label>Enter the payload :  </label>
    <form method="GET" >
        <input type="text" name="input" id="">
        <input type="submit" value="Submit">
        <input type="submit" value="reset" name="reset">
    </form>
    </div> 
</body>
</html>

<?php
if (!empty($savedInputs)) {
    echo "<h2>Saved Inputs:</h2>";
    echo "<ul>";
    foreach ($savedInputs as $savedInput) {
        echo "<li>" . $savedInput . "</li>";
    }
    echo "</ul>";
}
?>
