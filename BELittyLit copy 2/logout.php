<?php
    // creates a session puts it in an array and then destroys the session with the current user and log in
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: home.html');
?>  