<?php 
$title = "Register";

require './config/db_connection.php';

session_start();

require './config/session_check.php';

$username_check = 'SELECT username FROM users';

$result = mysqli_query($conn, $username_check);

$all_usernames = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    $sql = "INSERT INTO users(username, password, type) VALUES ('$username' , '$password',  '$type') ";




    foreach ($all_usernames as $usernames){
        if ($usernames['username'] == $username){
     $verdict = true;
     $registration_error_username = 'username is already being used';
        }; 
    };
    
        if(strlen($password) < 7) {
            $verdict = true;
            $registration_error_password = 'password must have at least 7 characters';
        }

if($verdict){

} else {

    if(mysqli_query($conn, $sql)){
       header('Location: login.php');
    } else {
        echo mysqli_error($conn);
    };

};

mysqli_close($conn);
}; 
?>

<!DOCTYPE html>
<html lang="en">
<?php require './components/head.php' ?>
<body>

<?php require './components/nav.php' ?>

<div class="fixed">
<form action="register.php" method="post" class="form-logreg">
    <h2>Register now!</h2>
    <div class="inputs">
    <label for="username" class="label-form">username</label>
<input type="text" name="username" placeholder="enter your username here"  class="input-form" required>
<div class="error"><?php if(isset($registration_error_username)){echo $registration_error_username;};?></div>
<label for="password" class="label-form">password</label>
<input type="password" name="password" class="input-form" placeholder="enter your password here" required>
<input type="hidden" value="user" class="input-form" name="type">
<div class="error"><?php if(isset($registration_error_password)){echo $registration_error_password;};?></div>
</div>
<input type="submit" value="Register" class="submit-btn" name="submit">
</form>
</div>
</body>
</html>