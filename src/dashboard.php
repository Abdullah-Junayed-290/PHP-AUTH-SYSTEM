<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="A Dashboard" />
    <meta name="robots" content="index, follow" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/dashboard_php.css" type="text/css" media="all" />
</head>
<body>
<?php
session_start();

// chack if user is login...
if (!isset($_SESSION["user"]) && !isset($_COOKIE["user"])) {
    echo "<h2>⚠️ Access denied! <a href='login.html'>Login</a></h2>";
    exit();
}

// home message...
$user = $_SESSION["user"] ?? $_COOKIE["user"];
echo "<h1>👋 Welcome, $user<br /></h1>";
echo "<a href='forgot_password.php'>Change Password</a><br>";
echo "<a href='logout.php'>Logout</a>";
?>
</body>
</html>