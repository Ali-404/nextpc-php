<?php 
    session_start();
    $_SESSION['account'] = null;
    session_unset();
    session_destroy();

?>