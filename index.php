<?php
require_once "user.php";
$error_url = '/php-auth/login-error.php';
session_start();

$fullname = '';
$ID = '';
// print_r($_SESSION['users_id']); //debug
// print_r($_SESSION['IDs']);

foreach($_SESSION['IDs'] as $id)
{
    foreach($_SESSION['users_id'] as $users){
        if($users->ID == $id){
            $fullname = $users->user;
            $ID = $users->ID;
        }
    }
}

echo "<h1>Welcome $fullname </h1>";
echo "<p>Your Session-ID: $ID </p>";

// $_SESSION['users_id'] = [];
// session_destroy();
?>

