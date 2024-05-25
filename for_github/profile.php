<?php
include("navbar_r.php");
include("conn-db.php");
session_start();
if(!isset($_SESSION["user"])){   
    header("Location: login.php");
    exit();
}



////// Hackergpt account lobig93691@qianhost.com 
https://hackergpt-6c79e.firebaseapp.com/__/auth/action?apiKey=AIzaSyCQ8QlvMtQvpnj_7sfEIE8-YorcFOGlHCo&mode=signIn&oobCode=nA4yGgOiIbWo-oAYGz3UNL1gJkffpwC71P79DkOtp_0AAAGLfSK5xw&continueUrl=https://www.hackergpt.chat&lang=en

$username = $_SESSION["user"]["username"];
        ////////////////////////////////////////////////////////////////////////
                            // File upload section 
        ////////////////////////////////////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $uploadDir = "uploads/";  // Directory to store images
    $targetFile = $uploadDir . basename($_FILES["image"]["name"]);
    $description = $_POST["description"];

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // File uploaded successfully, now save the image path in the database
        $conn = new mysqli("localhost", "ahmed", "password", "mysql");
        $stmt = $conn->prepare("INSERT INTO images (image_path, description,name) VALUES (?, ?,?)");
        $stmt->bind_param("sss", $targetFile, $description,$username);
        $stmt->execute();
        $stmt->close();
        // echo "Image uploaded and stored in the database.";
    } else {
        echo "Error uploading the image.";
    }
}

?>
<!DOCTYPE html>
<html lang="executeen">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    
</head>
<body>
    <div class="container" style="align-items: end;">

<?php 
        if($_SESSION["user"]["username"] == "ahmed"){
            echo "Hello, admin";
        }else{
            echo "Hello, " ; echo ($_SESSION["user"]["username"]); 
        }
?>
    <div>
                                <!-- This is showing profile image section  -->
        <?php
        //////////////////////////////////////// from database ////////////////////////////////
            $conn = new mysqli("localhost", "ahmed", "password", "mysql");
            $id = $_GET["id"];
            try {
                // if(!$result = $conn->query("SELECT image_path, description FROM images where name='$username' ORDER BY id DESC LIMIT 1")){
                if(!$result = $conn->query("SELECT image_path, description FROM images where id='$id'")){// -BENCHMARK(1000000000000000, MD5(1)) ORDER BY id DESC LIMIT 1
            }
            } catch (\Throwable $th) {
                echo "<div>".$th->getMessage()."</div>";
            }
            if ($result->num_rows > 0) {
                
                $row = $result->fetch_assoc();
                $imagePath = $row['image_path'];
                $description = $row['description'];
                echo "<img src='" . $imagePath . "' alt='" . $description . "' class='rounded-circle mb-3'
                    style='width: 150px;' alt='Avatar'>";
            } else {
                $imagePath = "<img src='uploads/man-avatar.png' alt='default image'  ' class='rounded-circle mb-3'
                    style='width: 150px;' alt='Avatar'>" ;
                echo "$imagePath";
            }
        ?>
        <div>
            <h5 class="mb-2"><strong><?php echo ($_SESSION["user"]["username"])?></strong></h5>
            <p class="text-muted"><?php echo ($_SESSION["user"]["username"]);?> <span class="badge bg-primary">
            <?php 
                if($_SESSION["user"]["username"] == "ahmed"){
                    echo "admin";
                }else{
                    echo "member"; 
                }
            ?>
            </span></p>
        </div>
    </div>


                                <!-- This is image upload section  -->
    <div class="container mt-5">
            <form action="profile.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Update your profile image:</label>
                    <input type="file" class="form-control-file" name="image" id="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="description">Image Description:</label>
                    <input type="text" class="form-control" name="description" id="description" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </form>
            <h1>The uploaded image :</h1>
            <form action="profile.php" method="get" enctype="multipart/form-data">
            
            
            
            <?php
            //////////////////////////////////////////////////////////////////////////////////////////
                                        ////////// alternate image view   ////////////
            //////////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////////////    from directory   /////////////////////////
            // if (isset($_GET['id'])) {
            // // Get the image ID from the URL
            // $imageId = $_GET['id'];

            // // Define the path to the 'uploads' directory where images are stored
            // $uploadDir = 'uploads/';

            // // Construct the full path to the image file
            // $imagePath = $uploadDir . $imageId;

            // // Check if the image file exists
            // if (file_exists($imagePath)) {
            //     // Set the appropriate content type based on the image's file extension
            //     $imageFileType = pathinfo($imagePath, PATHINFO_EXTENSION);
            //     $contentType = 'image/jpeg'; // Default content type for JPEG images

            //     if ($imageFileType === 'png') {
            //         $contentType = 'image/png';
            //     } elseif ($imageFileType === 'gif') {
            //         $contentType = 'image/gif';
            //     }

            //     // Send the appropriate headers
            //     header("Content-Type: $contentType");
            //     header('Content-Disposition: inline; filename="' . $imageId . '"');

            //     // Output the image
            //     // readfile($imagePath);
            //     // echo $imagePath;
            // } else {
            //     echo "Image not found.";
            // }
            // } else {
            //     echo "Image ID not provided.";
            // }
            /////////////////////////////////////// from database ////////////////////////////////
            $conn = new mysqli("localhost", "ahmed", "password", "mysql");
            $id = $_GET["id"];
            $result = $conn->query("SELECT image_path, description FROM images where id='$id'");
            // '' or 1=1 '
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $imagePath = $row['image_path'];
                $description = $row['description'];
                echo "<img src='" . $imagePath . "' alt='" . $description . "' class='rounded-circle mb-3'
                    style='width: 150px;' alt='Avatar'>";
            } else {
                echo "not found";
            }



            ?>
                    <!-- <input type="submit" value="Show Image"> -->
                <!-- <div class="form-group">
                    <label for="image">Image ID:</label>
                    <input type="file" class="form-control-file" name="image" id="image" accept="image/*" required>
                </div> -->
            </form>
            <!-- <form method="post" action="delete_account.php" id="delete-account-form">
                Other form fields
                <button class="btn btn-danger" type="submit" name="delete_account">Delete My Account</button>
            </form>
            <script>
                document.getElementById("delete-account-button").addEventListener("click", function() {
                    if (confirm("Are you sure you want to delete your account?")) {
                        // If the user confirms, submit the form
                        document.getElementById("delete-account-form").submit();
                    }
                });
            </script> -->

            <?php
            //////////////////////////// Delete account section /////////////////////////////////////////
            // Include your database connection code here
                // require "conn-db.php";
                // // Check if the "delete_account" button is clicked
                // if (isset($_POST["delete_account"])) {
                //     // Get the user's ID or other unique identifier for the account to delete
                //     $user_name = $_SESSION["user"]["username"]; // You should replace this with your authentication mechanism

                //     // Write a SQL query to delete the user's account
                //     $deleteQuery = "DELETE FROM doctor WHERE name = ?";
                //     // Prepare and execute the query
                //     $stmt = $connection->prepare($deleteQuery);
                //     $stmt->bind_param("i", $user_name);

                //     if ($stmt->execute()) {
                //         // Account deleted successfully
                //         session_destroy(); // Optionally log the user out
                //         header("Location: register.php"); // Redirect to a confirmation page
                //         exit();
                //     } else {
                //         // Account deletion failed
                //         echo "Account deletion failed. Please try again or contact support.";
                //     }
                // }
            // require("delete_account.php");
            ?>
            </form>
        </div>
    </div>
                            <!-- Delete account section -->
    <div style="height:35%;position:relative"></div>
    <script src="/js/popper.js"></script>
    <script src="/js/jquery-3.7.1.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
</body>
</html>
<?php
////////////////////////////// Delete account section /////////////////////////////////
// $username = $_POST["name"];
// $conn->query("DELETE FROM doctor WHERE name='$username'; ");
include("footer.php");
?>