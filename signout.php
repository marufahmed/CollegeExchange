<?php
    if(isset($_SESSION['username'])){
        
        session_destroy();
        $_SESSION = array();
        header('location: login.html');
    }
    else{
        session_destroy();
        $_SESSION = array();
        header('location: login.html');
    }
?>