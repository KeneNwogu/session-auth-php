<?php
require_once "user.php";

$redirect_url = '/php-auth/index.php';
$error_url = '/php-auth/login-error.php';
session_start();

// print_r($_SESSION['users']);

// if(isset($_COOKIE['email'])) echo $_COOKIE['email'];

$_SESSION['users_id'] = [];
if(!isset($_SESSION['IDs'])) $_SESSION['IDs'] = [];

if(isset($_POST['email']) && isset($_POST['password'])){ // on valid submission of form

    foreach($_SESSION['users'] as $users){ //loop through users
        if($users->email == $_POST['email'] && $users->get_password() == $_POST['password']){
            if(!$users->get_session_id()){
               $users->set_session_id();
               $_SESSION['IDs'][] = $users->get_session_id();
               
               $_SESSION['users_id'][] = new UserID($users->get_session_id(), $users->name);
            //    echo $_SESSION['users_id'];
               header("Location: $redirect_url");
               exit();
            }
            else {
                $_SESSION['users_id'][] = new UserID($users->get_session_id(), $users->name);
                header("Location: $redirect_url");
                exit(); 
            }
        }      
    }
    header("Location: $error_url");
    exit();
    
    // if($_COOKIE['users'])
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       body{
           font-family: Sans-serif;
       }
       input{
           display: block;
           margin-top: 30px;
           margin-bottom: 30px;
       }
       input[type="submit"]{
           background-color: blue;
           border-radius: 12px;
           color: white;
           font-size: 23px;
           border-bottom: none;
           cursor: pointer;
       }
       input[type="text"], input[type="number"], input[type="submit"], input[type="password"]{
           width: 100%;
           padding: 12px 20px;
           outline: none;
           border: none;
           border-bottom: 1px solid blue;
           transition: .2s ease-in;
       }
       input[type="text"]:hover{
           border-bottom: 1px solid green;
       }
       .form{
           display: flex;
           justify-content: center;
           align-items: center;
           /* height: 200px; */
           margin-left: 20vw;
           margin-right: 20vw;
           border: 2px solid purple;
       }
    </style>
</head>
<body>
    <div class="form">
        <form action="login.php" method="post">
            <h1 style="text-align: center;">Login</h1>
            <input type="text" name="email" placeholder="Enter your email">
            <input type="password" name="password" placeholder="Enter your password">
            <input type="submit" value="submit">
        </form>
    </div>
</body>
</html>