<?php 
$title = "Main Page";

require './config/db_connection.php';

session_start();

require './config/session_check.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php require './components/head.php' ?>
<body>
<?php require './components/nav.php' ?>
<div class="fixed">
    <h3 class="header-main">Welcome back</h1>
    <h4 class="user-welcome"><?php echo (isset($_SESSION['name']) ? $_SESSION['name'] : 'guest');?></h4>
    </div>
</body>
</html>