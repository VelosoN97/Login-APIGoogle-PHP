<?php
require 'google-config.php';

// Si el usuario ya está autenticado, redirigir al dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}

// Si hay un código de autenticación en la URL
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $_SESSION['access_token'] = $token;

    $google_service = new Google_Service_Oauth2($client);
    $user_info = $google_service->userinfo->get();

    $_SESSION['user'] = [
        'name' => $user_info->name,
        'email' => $user_info->email,
        'picture' => $user_info->picture
    ];

    header("Location: dashboard.php");
    exit();
}

// Genera el enlace de inicio de sesión con Google
$login_url = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login con Google</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px; 
            box-sizing: border-box; 
        }

        h2 {
            margin-bottom: 20px;
            font-size: 1.5em; 
        }

        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center; 
            width: 90%; 
            max-width: 300px; 
            background-color: #4285F4;
            border-radius: 5px;
            padding: 15px; 
            font-size: 1em; 
            font-weight: bold;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            box-sizing: border-box; 
        }

        .google-btn:hover {
            background-color: #357ae8;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .google-btn img {
            width: 30px; 
            background: white;
            padding: 5px; 
            border-radius: 3px;
            margin-right: 10px; 
        }
    </style>
</head>
<body>
    <h2>Iniciar sesión con Google</h2>
    <a href="<?= htmlspecialchars($login_url) ?>" class="google-btn">
        <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo">
        Sign in with Google
    </a>
</body>
</html>