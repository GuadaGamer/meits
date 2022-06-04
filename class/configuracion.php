<?php
    define("SGBD", "mysql");
    define("BD_host", "localhost");
    define("BD_name", "meits");
    define("BD_user", "meits");
    define("BD_password", "dbMeits2022");
    define("port", "3306");
    define("IMG", array("image/png","image/jpeg"));
    define("DOC", array("application/pdf"));
    define("EMAIL", "19030053@itcelaya.edu.mx");
    define("EMAIL_password", "14dedicdel2000");
    define("PATH", "C:/xampp/htdocs/meits/");
    define("IMG_size", 500000);

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'C:/xampp/htdocs/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('277394131725-jrvk7d5sa9mis48javpkpom6nrdfsrfg.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/meits/admin/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>
