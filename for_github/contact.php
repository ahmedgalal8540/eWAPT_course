<?php
// if(!isset($_SESSION["user"])){
//     include("navbar.php");
//     header("Location: login.php");
//     exit();
// }else{
//     include("navbar_r.php");
// }
// include("conn-db.php");
include("conn-db.php");
session_start();
if(!isset($_SESSION["user"])){   
    include("navbar.php");
}else {
    include("navbar_r.php");
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
<body>




    <script src="/js/popper.js"></script>
    <script src="/js/jquery-3.7.1.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
</body>
</html>