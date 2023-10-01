<?php
setcookie("first_cookie","This is first cookie",time()+3600,"/first_path");
//Use below in your php file which outputs response to client side.
// header("X-Frame-Options: DENY");
//DENY will fully block. You may try SAMEORIGIN option also.
// header("X-Frame-Options: SAMEORIGIN");
//If you are using apache web server, you can directly set in httpd.conf also.
//<Directory />
//    Header always set X-Frame-Options "SAMEORIGIN"
//</Directory>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First file</title>
</head>
<body>
    <p>This is the first path</p>
</body>
</html>
