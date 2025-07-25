<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="A login page" />
    <meta name="robots" content="index, follow" />
    <title>Login Process</title>
    <link rel="stylesheet" href="styles/login_php.css" type="text/css" media="all" />
</head>
<body>
<?php
session_start();
// connect to the database...
$conn = new mysqli("localhost", "root", "", "testdb");
if ($conn->connect_error) {
    echo "❌️ Connection failed!";
} else {
    echo "✅️ Connection successful.";
}

// extract username and password from login.html
$username = $_POST["username"];
$password = $_POST["password"];

// find user and save it...
$query = "SELECT * FROM users_login WHERE username='$username'";
$result = $conn->query($query);

// verify password and login user...
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // verify hashed password...
    if (password_verify($password, $user["password"])) {
        $_SESSION["user"] = $username;

        //set coockie of remaining user...
        if (isset($_POST["remember"])) {
            setcookie("user", $username, time() + 86400, "", "", true, true);
        }

        echo "<h2>✅ Login successful!  <br /> <a href='dashboard.php'>Go to Dashboard</a></h2>";
    } else {
        echo "<h1>❌️ Wrong password!</h1>";
    }
} else {
    echo "<h1>❌️ User not found!</h1>";
}
?>
</body>
</html>
