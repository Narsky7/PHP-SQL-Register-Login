<?php
$title = "Log in";

session_start();

require './config/session_check.php';



// Login check => User enters username. Then you find if of that user by username and look if password for that id is equal to the input

require "./config/db_connection.php";

if(isset($_POST['submit'])){
   $passed_username = mysqli_real_escape_string($conn, $_POST['username']);
   $passed_password = mysqli_real_escape_string($conn, $_POST['password']);

$verification_sql = "SELECT * FROM users WHERE username = '$passed_username'";

$result = mysqli_query($conn, $verification_sql);

$username_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);



foreach ($username_data as $db_user)

$db_type = $db_user['type'];

$db_password = $db_user['password'];

if(!isset($db_password)){
 $username_login_error = "username not found";
} else {

if ($db_password == $passed_password){
session_start();
$_SESSION['name'] = $passed_username;
$_SESSION['password'] = $passed_password;
$_SESSION['type'] = $db_type;
$_SESSION['status'] = true;
    if ($db_type == 'admin'){
        header('Location: index.php');
    } else {
        header('Location: index.php');
    }

    
} else{
    $password_login_error = "wrong password";
} 

}

mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html lang="en">
<?php require './components/head.php' ?>
<body>
    
<?php require './components/nav.php' ?>
<div class="fixed">
<form method="post" action="login.php" class="form-logreg">
    <h2>Log in</h2>
    <div class="inputs">
<label for="username" class="label-form">username</label>
<input type="text" id="username" placeholder="enter your username here"  name="username" class="input-form" required >
<div class="error"><?php if(isset($username_login_error)){echo $username_login_error;};?></div>
<label for="password" class="label-form">password</label>
<input type="password" id="password" name="password" placeholder="enter your password here"  class="input-form" required>
<div class="error"><?php if(isset($password_login_error)){echo $password_login_error;};?></div>
<input type="submit" class="submit-btn"  name="submit" value="log in">
</div>
<div>
    <span class="text-login">You dont have account?</span>
<a href="register.php" class="link-login"> Register now!</a>
</div>
</form>
</div>

</body>
</html>