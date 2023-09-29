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
<h1 style="display:flex; justify-content: center; align-items: center;">This is simple reflected XSS</h1>
<form method="get"style="display:flex; justify-content: center; align-items: center;">
        <input type="text" name="name" id="">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
