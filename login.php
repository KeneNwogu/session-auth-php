<?php
$redirect_url = '/php-auth/index.php';
session_start();

// print_r($_SESSION);

// if(isset($_COOKIE['email'])) echo $_COOKIE['email'];

$_SESSION['user_id'] = [];
print_r($_SESSION['users']);
if(isset($_POST['email']) && isset($_POST['password'])){
    foreach($_SESSION['users'] as $users){
        if($users['email'] == $_POST['email'] && $users['password'] == $_POST['password']){
            $_SESSION['user_id']['username'] = $users['username'];
            $_SESSION['user_id']['id'] = rand(3, 50000); 
            header("Location: $redirect_url");
            exit();
        }
    }
    
    var_dump($_SESSION['user_id']);
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