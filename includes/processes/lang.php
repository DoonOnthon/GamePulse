<?php 
if(session_status()==PHP_SESSION_NONE)session_start();
require set_language();

function set_language() {
    $_SESSION['lang'] = $_SESSION['lang'] ?? 'en';
    $_SESSION['lang'] = $_GET['lang'] ?? 'en';

    return "includes/data/languages.php";
}
?>