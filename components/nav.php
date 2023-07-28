<nav class="navbar">
    <h1>BrandName</h1>
    <ul class="list_of_links">
<li class="nav-link"><a href="index.php">Home <i class="fa-solid fa-house"></i></a></li>
<li class="nav-link">
    <?php 
    if (isset($_SESSION['type'])){
    if ($_SESSION['type'] == 'user'){
  echo '<a href="user_info.php">User <i class="fa-solid fa-user"></i></a>';
} else {
    echo '<a href="all_users_info.php">All users <i class="fa-regular fa-user"></i></a>';
}
    }else{
        echo '<a href="user_info.php">User <i class="fa-solid fa-user"></i></a>';
    }
?>
</li>

<li class="nav-link">
    <?php 
    if(isset($_SESSION['status'])){
        echo '<a href="logout.php">log out <i class="fa-solid fa-right-to-bracket"></i></a>';
    } else {
echo '<a href="login.php">Log in <i class="fa-solid fa-play"></i></a></li>';
    }
    ?>
    </ul>
</nav>