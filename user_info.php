<?php 
$title = "user data";

require './config/db_connection.php';

session_start();

require './config/session_check.php';

if(isset($_POST['submit'])){
    $username_to_delete = mysqli_real_escape_string($conn, $_POST['usernameToDelete']);

    $sql = "DELETE FROM users WHERE username = '$username_to_delete'";

    if(mysqli_query($conn, $sql)){
       
        header('Location: logout.php');
    } else {
        echo "error: " . mysqli_errno($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require './components/head.php' ?>
<body>
    
<?php require './components/nav.php' ?>

<div class="fixed">
    <div class="user-card">
    <?php if(!isset($_SESSION['status'])){
        echo "<a class='user-info-error' href='login.php'>You need to log in first to see user's info</a>"; 
    } 
    else{
echo " <div class='user-info' >  Username: " . $_SESSION['name'] . "</div>" ;
echo " <div class='user-info' > Password: <span class='password-user'> " . $_SESSION['password']  . "</span> <button class='show'><i class='fa-solid fa-eye'></i></button></div>";
echo " <div class='user-info' > Type: " . $_SESSION['type'] . " </div>" ;
echo "<div class='user-info delete-btn'>Delete account </div>";
        }?>


    </div>
</div>

<div class="popup">
   <button class="close-btn"><i class="fa-solid fa-circle-xmark"></i></button>
   <div class="popup-content">
    <span>Are you sure that you want to delete your account? This action is irreversible.</span>
    <form action="user_info.php" method="post">
        <input type="hidden" value="<?php if(isset($_SESSION['name'])){
            echo $_SESSION['name'];
        } ?>" name="usernameToDelete">
        <input type="submit" value="delete account" class="delbtn" name="submit">
    </form>
    </div>


</div>

</body>
</html>