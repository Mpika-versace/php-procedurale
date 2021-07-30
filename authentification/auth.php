<?php
function is_connect():bool
{
    if (session_status()===PHP_SESSION_NONE) {
        session_start();
    }
    // $_SESSION['connect']=1;
    return !empty($_SESSION['connect']);
};

// verifons si l'utilisateur est connecté
function user_connect():void
{
    if (!is_connect()) {
        header('Location:http://localhost/PHP_%20procedurale/contact.php');
        exit();
    }
}