<?php 
$title = "Users list";

require './config/db_connection.php';

session_start();

require './config/session_check.php';


if(isset($_SESSION['type'])){
if($_SESSION['type'] != 'admin'){
    header('Location: redirect.php');
}
} else {
    header('Location: redirect.php');
}

$sql = "SELECT * FROM users ORDER BY id";

$result = mysqli_query($conn, $sql);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php require './components/head.php' ?>
<body>

<?php require './components/nav.php' ?>
<div class="fixed all-user-info">

<?php foreach($users as $user){ ?>
    <div class="user-bracket">  
<span class="user-id user-information">ID: <?php echo $user['id'] ?></span>
<span class="user-username user-information">Username: <?php echo $user['username']  ?> </span>
<span class="user-password user-information">Password: <?php echo $user['password'] ?></span>
<span class="user-type user-information">Type: <?php echo $user['type']  ?></span>
    </div>
    <hr class="user-splitter">
<?php } ?>
</div>
</body>
</html>