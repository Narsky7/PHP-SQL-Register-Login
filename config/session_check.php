<?php

if(isset($_SESSION['status'])){
    if($_SESSION['status'] != true){
        session_unset();
        session_abort();
    }
} else{
    session_abort();
}

?>