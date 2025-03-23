<?php
    require 'vendor/autoload.php';

    session_start();

    $client = new Google_Client();
    $client->setClientId('336569982006-hi5ervg8lp801q6ncvf6ed1lvpsb6vcg.apps.googleusercontent.com');  
    $client->setClientSecret('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'); 
    $client->setRedirectUri('http://localhost/google-login/index.php');  
    $client->addScope('email');
    $client->addScope('profile');
?>