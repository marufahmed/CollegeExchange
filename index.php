<?php
session_start();

if(!isset($_SESSION['username']))
{
    header('location: login.html');
}

else{
    
    header('location: home.php');
}

?>
