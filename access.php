<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
if (!isset($_SESSION["logedIn"])) {
    header("Location: ./");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Welcome! <?php echo $_SESSION['username'] ?>;
</body>

</html>