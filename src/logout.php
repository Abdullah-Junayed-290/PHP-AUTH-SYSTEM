<?php
session_start();
session_destroy();
setcookie("user", time() - 3600); // remove cookies...
header("Location: ./pages/login.html");
?>
