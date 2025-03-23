<?php
    require 'vendor/autoload.php';

    session_start();

    $client = new Google_Client();
    $client->setClientId('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com');  
    $client->setClientSecret('xxxxxxxxxxxxxxxxxxxxxxxxxxx'); 
    $client->setRedirectUri('http://localhost/google-login/index.php');  
    $client->addScope('email');
    $client->addScope('profile');
?>
