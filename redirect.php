<?php 
$title = "error";

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
<h2>You dont have access to this site</h2>
<a href="index.php">go back to main page</a>
</div>
</body>
</html>