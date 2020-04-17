<?php

/**
 * 
 * @Author: titaro
 * @FB: facebook.com/tyroklonejr
 * @Twitter: twitter.com/tyroklonejnr
 * 
 * @License: FREE
 * @Aim: A forum for the dragon programming language
 */

// Load the initialization file
require_once "Init.php";

var_dump(file_get_contents('php://input'));

// Collect input data
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$submit = $_POST['submit'] ?? '';
$error = '';
$success = null;

if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($submit))
{
 // Begin the fun stuff
//  $u = "SELECT * FROM users WHERE username = '$username';";
//  $e = "SELECT * FROM users WHERE email = '$email';";
 $u = $db->query("SELECT * FROM users WHERE username = '$username'");
 $e = $db->query("SELECT * FROM users WHERE email = '$email'");

 if($db->num_rows($u) >= 1)
 {
  $error = 'Username already exists in our database!';
 }
 elseif($db->num_rows($e) >= 1)
 {
  $error = 'Email already exists in our database!';
 }
 else
 {
  $error = '';
  // Sanitize and do some validation on user input
  $password = password_hash(sanitize_input($db->escape_string($password)), PASSWORD_BCRYPT);
  $username = sanitize_input($db->escape_string($username));
  $email = sanitize_input($db->escape_string($email));

  // Lets add the user to the database
  $add = "INSERT INTO users(username, password, email) VALUES ('$username', '$password', '$email');";
  $i = $db->query($add);
  if($i === true)
  {
   $success = true;
  }
  else
  {
   $success = false;
  }
 }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Charset -->
    <meta charset="UTF-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Page title -->
    <title>Dragon Forum | Registration Page</title>

    <!-- Materialize icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- The main and universal CSS declarations -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- The register page CSS declarations -->
    <link rel="stylesheet" href="assets/css/register.css?v1.0">
</head>
<body>
    <!-- Include the header -->
    <?php require_once 'inc/header.php' ?>

    <!-- Error messages -->
    <?php

    if($success === true)
    {
     echo 'Registration Successfull, you should be automaically redirected to the home page. If not <a href="index.php">click here</a>';
    }
    
    if($success === false)
    {
     echo 'Registration was not successfull, please try again.';
    }

    ?>

    <!-- Form section -->
    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" autocomplete="off" class="form-container">
        <br>
        <input type="text" name="username" id="user" value="<?php echo $username ?>" class="dragon-input-text" placeholder="Username">
        <br>
        <br>
        <input type="password" name="password" id="pass" class="dragon-input-text" placeholder="Password">
        <br>
        <br>
        <input type="email" name="email" id="email" value="<?php echo $email ?>" class="dragon-input-text" placeholder="Email">
        <br>
        <br>
        <input type="submit" name="sub" value="Register Now!" class="dragon-input-button">
    </form>

    <!-- Include footer -->
    <?php require_once 'inc/footer.php' ?>
</body>
</html>