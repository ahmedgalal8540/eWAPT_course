<?php
$conn = new mysqli("localhost", "ahmed", "password", "mysql");
if (isset($_GET['id'])) {
    $imageId = $_GET['id'];
    $result = $conn->query("SELECT image_path, description FROM images where id='$imageId'");
    // select image_path , description from images where id='99999' union select NULL,@@version '
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagePath = $row['image_path'];
    $description = $row['description'];
    echo "<img src='" . $imagePath . "' alt='" . $description . "' class='rounded-circle mb-3'
        style='width: 150px;' alt='Avatar' >";
} else {
    echo "No images found.";
}
} else {
    echo "Image ID not provided.";
}
// Check if the 'id' parameter is set in the URL
// if (isset($_GET['id'])) {
//     // Get the image ID from the URL
//     $imageId = $_GET['id'];

//     // Define the path to the 'uploads' directory where images are stored
//     $uploadDir = 'uploads/';

//     // Construct the full path to the image file
//     $imagePath = $uploadDir . $imageId;

//     // Check if the image file exists
//     if (file_exists($imagePath)) {
//         // Set the appropriate content type based on the image's file extension
//         $imageFileType = pathinfo($imagePath, PATHINFO_EXTENSION);
//         $contentType = 'image/jpeg'; // Default content type for JPEG images

//         if ($imageFileType === 'png') {
//             $contentType = 'image/png';
//         } elseif ($imageFileType === 'gif') {
//             $contentType = 'image/gif';
//         }

//         // Send the appropriate headers
//         header("Content-Type: $contentType");
//         header('Content-Disposition: inline; filename="' . $imageId . '"');

//         // Output the image
//         readfile($imagePath);
//     } else {
//         echo "Image not found.";
//     }
// } else {
//     echo "Image ID not provided.";
// }
// echo "<img src='profile.php?id=$imagePath' alt='imageasdf' >";