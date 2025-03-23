<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            padding: 20px; 
            box-sizing: border-box; 
        }

        .dashboard-container {
            text-align: center;
            padding: 20px; 
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%; 
            max-width: 400px; 
            box-sizing: border-box; 
        }

        .profile-img {
            width: 120px; 
            height: 120px; 
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .logout-btn {
            padding: 10px 15px; 
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em; 
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Bienvenido, <?= htmlspecialchars($user['name']) ?>!</h2>
        <img src="<?= htmlspecialchars($user['picture']) ?>" alt="Foto de perfil" class="profile-img">
        <p>Email: <?= htmlspecialchars($user['email']) ?></p>
        <a href="logout.php" class="logout-btn">Cerrar sesión</a>
    </div>
</body>
</html>