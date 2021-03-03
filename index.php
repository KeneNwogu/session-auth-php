<?php
session_start();

// var_dump($_SESSION);
// $fullname = $_SESSION['username'];

if($_SESSION['user_id']['id'] != 0) {
    $fullname = $_SESSION['user_id']['username'];
    $id = $_SESSION['user_id']['id'];
}

echo "<h1>Welcome $fullname </h1>";
echo "<p>Your Session-ID: $id </p>";
// session_destroy();
?>

