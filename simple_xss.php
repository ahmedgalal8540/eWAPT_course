<?php if(isset($_GET["name"])){
    echo '<pre>This is xss : "' . $_GET["name"] .'</pre>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple reflected XSS</title>
</head>
<body>
<form method="get">
        <input type="text" name="name" id="">
        <input type="submit" value="Submit">
    </form>
</body>
</html>