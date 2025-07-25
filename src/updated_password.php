<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="A new web page" />
    <meta name="robots" content="index, follow" />
    <title>Updating password</title>
    <link rel="stylesheet" href="styles/update_password_php.css" type="text/css" media="all" />
</head>
<body>
<?php
session_start();

// connect to database...
$conn = new mysqli("localhost", "root", "", "testdb");
if ($conn->connect_error) {
    echo "❌️ Connection failed!";
} else {
    echo "✅️ Connection successful.";
}

//get old and new password from forgot_password.php
$current_password = $_POST["current_password"];
$new_password = $_POST["new_password"];

// extract user...
$user = $_SESSION["user"] ?? $_COOKIE["user"];

// fetch user data...
$result = $conn->query("SELECT * FROM users_login WHERE username='$user'");
$data = $result->fetch_assoc();

// ✅️ verify old password...
if (password_verify($current_password, $data["password"])) {
    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
    $conn->query(
        "UPDATE users_login SET password='$hashed_new_password' WHERE username='$user'",
    );
    echo "<h2>🔒 Password updated successfully! <a href='pages/login.html'>Log In</a></h2>";
} else {
    echo "<h2>❌ Current password is wrong!</h2>";
}
?>
</body>
</html>
