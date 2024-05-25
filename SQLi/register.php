<?php
// include("navbar.php");
session_start();
// if(isset($_SESSION["user"])){
//     // include("navbar_r.php");
//     header("Location: profile.php");
// }else {
//     include("navbar.php");
// }
include("navbar.php");
if(isset($_POST["submit"])){
    include("conn-db.php");
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $stmt = "INSERT INTO doctor (name,email,password) VALUES ('$name','$email','$password')";
    $error[] = 0;
    $confirm= htmlspecialchars($_POST["password2"]);

    // Validate username 
    if (empty($name)){
        $errors[] = "please enter username";
        exit();
    }

    // Validate password
    if(empty($password)){
        $errors[] = "please , enter valid password";
        exit();
    }elseif(strlen($password) < 6){
        $errors[] = "Input password more than 6 chars";
    }
    if($password !== $confirm){
        $errors[] = "please , input two identical passwords";
        
    }
    if(empty($password2)){
        $error[]="please, enter valid at confirm password";
        
    }
    // Validate email
    if(empty($email)){
        $errors[] = "please enter email";
        exit();
    }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $errors[] = "incorrect email";
        
    }
    
    
    // Give the last result
    if(empty($errors)){
        $valid_password = password_hash($password,PASSWORD_DEFAULT);
        $conn = $connection->prepare($stmt)->execute();
        echo "done";        
        $_POST["name"] = "";
        $_POST["password"] = "";
        $_POST["id"] = "" ; 
        $_POST["email"] = "";
        $_SESSION["user"] = [
            "username" => $name,
            "email" => $email, 
        ];
        header("location:profile.php");
        
    }else{
        var_dump($errors);
    }







// Assume you have a database connection established here

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['username'];
//     $password = $_POST['password'];
//     $email = $_POST['email'];
    // Check if the username already exists in the database
    // $query = "SELECT count(*) FROM doctor WHERE name = ?";
    // $stmt = $connection->prepare($query);
    // $stmt->bind_param("s", $name);
    // $stmt->execute($name);
    // echo "ok";
    // $stmt->bind_result($count);
    // echo "ok";
    // $stmt->fetch();

    // if ($count > 0) {
    //     echo "Invalid user: Username already exists.";
    // } else {
    //     echo "Valid user: Username is available.";
    // }


    // Check if the username already exists in the database


    // Assuming you have a MySQLi connection established here
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['name'];

    // Prepare a SELECT statement to check if the name already exists in the doctor table
    // $stmt = $conn->prepare("SELECT * FROM doctor WHERE name = ?");
    // $u ="SELECT name FROM doctor WHERE name = '$name'";
    // $uu = mysqli_query($connection,$u);
    // $e = "SELECT password FROM doctor WHERE email = '$email'";
    // $ee = mysqli_query($connection,$ee); 

    // if (mysqli_num_rows($ee) > 0){
    //     echo "Already existed";
    // }else {
    //     echo "not existed";
    // }

    // if (mysqli_num_rows($uu) > 0){
    //     echo "Already existed";
    // }else {
    //     echo "not existed";
    // }

    // $query = "SELECT name FROM doctor WHERE name = $name";
//     $query = "SELECT * from doctor where name = $name";
//     $result = mysqli_query($connection,$query);
//     if (!$result) {
//     die("Query failed: " . mysqli_error($connection));
// }
//     echo "ok";
//     $count = mysqli_num_rows($result);
//     if($count > 0){
//         echo "Already used";
//     }else {
//         echo "not used";
//     }

    // if ($count > 0) {
    //     echo "Invalid user: Username already exists.";
    // } else {
    //     echo "Valid user: Username is available.";
    // }



    // if ($result > 0) {
    //     echo "This username already exists.";
    // } else {
    //     echo "Please enter a valid username.";
    // }








    $connection->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/bootstrap.css">
        <title>Resgisteration</title>
    </head>
    <body class="bg-light">

    <div class="container">

    <!-- ------------------------------ content ------------------------------ -->
        <form style="padding-top:8%;" method="POST">
            <!--  style="padding-left: 25%; padding-top: 5%; margin-left:10% ; margin-right: 40%;" -->
        <div class="form-group">
            <label for="exampleIhtmlspecialcharsnputusername1">Username <label style="color: red;">*</label>    </label>
            <input type="Username" value="<?php $_POST["name"];?>" class="form-control" id="exampleInputusername1" placeholder="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address <label style="color: red;">*</label></label>
            <input type="email" value="<?php $_POST["email"];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password <label style="color: red;">*</label></label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm password <label style="color: red;">*</label></label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm password" name="password2" required>
        </div>
        <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out$_POST["password"</label>
        </div> -->
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>






    
    <script src="/js/popper.js"></script>
    <script src="/js/jquery-3.7.1.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>