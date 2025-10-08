## Introduction
This project provides a basic implementation of session-based authentication using PHP. It demonstrates a simple workflow for user registration, login, and access to a protected index page.  This implementation is for demonstration purposes and is considered insecure.

## Installation
1.  **Clone the repository:**
    ```bash
    git clone https://github.com/KeneNwogu/session-auth-php.git
    ```
2.  **Navigate to the project directory:**
    ```bash
    cd session-auth-php
    ```
3.  **Ensure PHP is installed:**  You need PHP installed and configured on your system or web server.

## Usage
1.  **Register a user:**  You would typically have a registration form (not provided in this example).
2.  **Login:** Navigate to `login.php` in your web browser.  Enter the email and password of a registered user.
3.  **Access the index page:** Upon successful login, you will be redirected to `index.php`.

**Example Code Snippets:**

**`index.php`:**
```php
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
// se...
```

**`login-error.php`:**
```html
<h1>Invalid Login Credentials</h1>

<p>Go back and try logging in again</p>
<a href="login.php">Login</a>
```

**`login.php`:**
```php
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
        if($users->email == $_POST['email'] &...
```

## Features
*   Session-based authentication.
*   Login and index pages.
*   Error handling for invalid login credentials.

## Contributing
This project is for demonstration purposes.  Contributions are not currently accepted.