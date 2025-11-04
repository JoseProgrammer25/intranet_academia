<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Formulario 26</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e6f2e6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
            border-top: 8px solid #00703c;
        }

        h2 {
            color: #00703c;
            margin-bottom: 30px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #00703c;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #005a2c;
        }

        input[type="submit"]:focus {
            outline: 3px solid #a3d9a5;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Acceso Docente</h2>
        <form action="dashboard.php" method="post">
            <input type="text" name="name_log" placeholder="Nombre" required>
            <input type="text" name="pswd_log" placeholder="Contraseña" required>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>