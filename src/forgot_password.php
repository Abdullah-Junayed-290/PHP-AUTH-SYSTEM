<?php
session_start();
// chack if user exists...
if (!isset($_SESSION["user"]) && !isset($_COOKIE["user"])) {
    echo "⚠️ You don't have an account,  please create an account first";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="A forgot password page" />
    <meta name="robots" content="index, follow" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styles/forgot_password_php.css" type="text/css" media="all" />
</head>
<body>
    <h2>Change Password</h2>
    <form action="./updated_password.php" method="post" accept-charset="utf-8">
        <input type="password" name="current_password" id="current_password" placeholplaceholder="Enter your current password..." required="true" />
        <br />
        <br />
        <input type="password" name="new_password" id="new_password" placeholder="Enter your new password..." />
        <br />
        <br />
        <button type="submit">
            Change Password
        </button>
    </form>
</body>
</html>