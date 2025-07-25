<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="A signup page" />
    <meta name="robots" content="index, follow" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles/signup_php.css" type="text/css" media="all" />
</head>
<body>
<?php
// connect to the database...
$conn = new mysqli("localhost", "root", "", "testdb");
if ($conn->connect_error) {
    echo "❌️ Connection failed!";
} else {
    echo "✅️ Connection successful.";
}

// give the user data to html form...
$username = $_POST["username"];
$password = $_POST["password"];

// hashing the password...
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// chack is user early exists...
$chack_user = $conn->query(
    "SELECT * FROM users_login WHERE username='$username'",
);
if ($chack_user->num_rows > 0) {
    echo "⚠️ User already exists!";
    exit();
}

// register new user in db...
$query = "INSERT INTO users_login(username, password) VALUES ('$username', '$hashed_password')";
if ($conn->query($query) == true) {
    echo "✅ Registered! <a href='pages/login.html'>Login Now</a>";
} else {
    echo "❌ Error: " . $conn->error;
}
?>
</body>
</html>