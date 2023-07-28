<?php
$conn = mysqli_connect('localhost', 'username', 'password', 'list-of-users');

if(!$conn){
    echo mysqli_connect_error();
};
?>