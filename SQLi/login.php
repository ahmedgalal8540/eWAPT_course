<?php
require("navbar.php");
require("conn-db.php");
session_start();
if(isset($_SESSION["user"])){   
    header("Location: profile.php");
    exit();
}
if(isset($_POST["submit"])){
    $errors[] = 0;
    // $name = $_POST["name"];
    // $password = $_POST["password"];
    // if(empty($name)){
    //     $errors[] = "please input a valid username";
    // }if(empty($password)){
    //     $errors[] = "please input a valid password";
    // }
    // if(empty($errors)){
    //     $name = htmlspecialchars($_POST["name"]);
    //     $password = htmlspecialchars($_POST["password"]);
    //     $real_name = mysqli_query($connection,"SELECT name from doctor where name='$name'");
    //     $real_password = mysqli_query($connection,"SELECT password from doctor where password='$password'");
    //     if($name === $real_name && $password === $real_password){
    //         header("location:profile.php");
    //     }else{
    //         echo "please input correct credentials";
    //     }
    // }else {
    //     var_dump($errors);
    // }

// if (empty($errors)) {
//     $name = htmlspecialchars($_POST["name"]);
//     $password = htmlspecialchars($_POST["password"]);
//     $real_name_query = mysqli_query($connection, "SELECT name from doctor where name='$name'");
//     $real_password_query = mysqli_query($connection, "SELECT password from doctor where password='$password'");
    
//     $real_name_row = mysqli_fetch_assoc($real_name_query);
//     $real_password_row = mysqli_fetch_assoc($real_password_query);

//     if ($real_name_row && $real_password_row) {
//         $real_name = $real_name_row['name'];
//         $real_password = $real_password_row['password'];

//         if ($name === $real_name && $password === $real_password) {
//             header("location:profile.php");
//         } else {
//             echo "Please input correct credentials";
//         }
//     } else {
//         echo "Please input correct credentials";
//     }
// } else {
//     var_dump($errors);
// }

// if (empty($errors)) {
//     $name = htmlspecialchars($_POST["name"]);
//     $password = htmlspecialchars($_POST["password"]);
//     // $real_name_query = mysqli_query($connection, "SELECT name from doctor where name='$name'");
//     // $real_password_query = mysqli_query($connection, "SELECT password from doctor where password='$password'");
//     $sql = "select  * from doctor where usename= '$name' and password = '$password'" ;
//     $result = mysqli_query($connection, $sql) ;   
//     $row = mysqli_fetch_array($result,MYSQLI_ASSOC) ;
//     $count = mysqli_num_rows($result);   
//     if ($count == 1) { 
//         header("location : profile.php");
//     }else {
//         echo "<script>
//         window.location.href= index.php ;
//         alert('login failed : Invalid username or password');
//         <script>";
//     }localhost/database/
// }
// else { 
//     var_dump($errors);
// }


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Sanitize and validate user input
//     $username = $_POST['name'];
//     $password = $_POST['password'];

//     // Connect to the database (using MySQLi)
//     $conn = new mysqli("localhost", "name", "password", "database_name");

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Check user credentials
//     $stmt = $conn->prepare("SELECT name, password FROM doctor WHERE name = ?");
//     $stmt->bind_param("s", $name);
//     $stmt->execute();
//     $stmt->bind_result($id, $dbname, $dbPassword);
//     $stmt->fetch();

//     if (password_verify($password, $dbPassword)) {
//         // Login successful
//         $_SESSION['user_id'] = $id;
//         header("Location: dashboard.php");
//     } else {
//         // Login failed
//         echo "Invalid username or password.";
//     }

//     $stmt->close();
//     $conn->close();
// }



// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST['name'];
//     $user_password = $_POST['password'];

//     // Connect to the database (using MySQLi)
//     $conn = new mysqli("localhost", "ahmed", "password", "mysql");

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Prepare a SELECT statement to retrieve the hashed password
//     $stmt = $conn->prepare("SELECT name, password FROM doctor WHERE name = ?");
//     $stmt->bind_param("s", $name_value);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows == 1) {
//         $stmt->bind_result($name, $password);
//         $stmt->fetch();

//         // Verify the entered password with the hashed password
//         if (password_verify($user_password, $password)) {
//             // Login successful
//             // $_SESSION['user_id'] = $id;
//             header("Location: profile.php");
//         } else {
//             // Login failed
//             echo "Invalid username or password.";
//         }
//     } else {
//         // User not found
//         echo "Invalid username or password.";
//     }

//     $stmt->close();
//     $conn->close();
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli("localhost", "ahmed", "password", "mysql");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a SELECT statement to retrieve the hashed password
    // $stmt = $conn->prepare("SELECT * FROM doctor WHERE name = '$name' and password = '$password'");
    $stmt = mysqli_query($connection ,"SELECT name,password FROM doctor WHERE name = '$username' and password = '$password'");
    $row_ac = mysqli_num_rows($stmt); 
    if($row_ac > 0){
        $row = mysqli_fetch_array($stmt);
        // $_SESSION["username"] = $row["username"];
        $_POST["name"] = "";
        $_POST["password"] = "";
        $_POST["id"] = "" ; 
        $_POST["email"] = "";
        $_SESSION["user"] = [
            "username" => $username,
            "email" => $email, 
        ];
        // $_SESSION["user"] = $username;
        header("location: profile.php");
    }
    else {
        echo "<div style='padding: 50px;''>Invalid username or password</div>";
    }


    // $stmt->bind_param("s", $username);
    // $stmt->execute();
    // $stmt->store_result();
    // if ($stmt->num_rows == 1) {
    //     $stmt->bind_result($name, $email , $hashed_password);
    //     $stmt->fetch();

        // Verify the entered password with the hashed password
//         if (password_verify($password, $hashed_password)) {
//             // Login successful
//             $_SESSION['username'] = $name;
//             header("Location: profile.php");
//         } else {
//             // Login failed
//             echo "Invalid username or password.";
//         }
//     } else {
//         // User not found
//         echo "Invalid username or password.";
//     }

    $stmt->close();
    $conn->close();
}

















}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="/css/bootstrap.css">

</head>
<body class="bg-light">
    <div class="container">
        <form style="padding-top:8%;" method="POST">
            <!--  style="padding-left: 25%; padding-top: 5%; margin-left:10% ; margin-right: 40%;" -->
        <div class="form-group">
            <label for="exampleInputusername1">Username <label style="color: red;">*</label>    </label>
            <input type="Username" value="<?php $_POST["name"];?>" class="form-control" id="exampleInputusername1" placeholder="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password <label style="color: red;">*</label></label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    
    








    
    <!-- <div class="form-group">
        <label for="exampleInputEmail1">Email address <label style="color: red;">*</label></label>
        <input type="email" value="<?php $_POST["email"];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div> -->
    <script src="/js/popper.js"></script>
    <script src="/js/jquery-3.7.1.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
</body>
</html>