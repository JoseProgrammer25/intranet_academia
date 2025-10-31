<?php
session_start();

// Si no hay sesión iniciada, redirigir al index
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Menú Principal</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e6f2e6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-top: 8px solid #00703c;
            text-align: center;
        }

        h2 {
            color: #00703c;
            margin-bottom: 30px;
        }

        .menu-button {
            display: block;
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            background-color: #00703c;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .menu-button:hover {
            background-color: #005a2c;
        }

        .menu-button:focus {
            outline: 3px solid #a3d9a5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Menú de Gestión de Cursos</h2>

        <a class="menu-button" href="functions/listar.php">📋 Listar Cursos</a>
        <a class="menu-button" href="functions/agregar.php">➕ Añadir Curso</a>
        <a class="menu-button" href="functions/borrar.php">🗑️ Borrar Curso</a>
        <a class="menu-button" href="functions/editar.php">✏️ Editar Curso</a>
        <a class="menu-button" href="dashboard.php">🔙 Volver al Dashboard</a>
        <a class="menu-button" href="cerrar_sesion.php">🚪 Salir</a>
    </div>
</body>
</html>