<?php
setcookie("second_cookie","This is second cookie",time()+3600,"/second_path");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second file</title>
</head>
<body>
    <p>This is the second path</p>
    <p>The second path will read the first path cookies through the trick in javascript</p>
    <p>read the javascript code to know more</p>
    <p>look at the set cookie in the first file to know it is set for only first_path</p>
    <p>but we can still read them</p>
    <p>note that it is viewed as key=value </p>
    <p>note that we can avoid this trick through x-frame-options header in PHP</p>
</body>
<script>
    function cookiepath(path) {
    for (var i = 0; i < window.frames.length; i++) {
    frameURL = window.frames[i].location.toString();
    if (frameURL.indexOf(path) > -1)
    alert(window.frames[i].document.cookie);
    }
    }
    </script>
    <iframe onload="cookiepath('/first_path/')" style="display:none;"
    src="/first_path/first.php"></iframe>
</script>
</html>