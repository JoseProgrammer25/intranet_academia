<?php
session_start();
if (!isset($_SESSION['id_docente'])) {
    header("Location: index.html");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "academia");
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$id_docente = $_SESSION['id_docente'];
$sql = "SELECT id_curso, name_curso, fecha_creacion FROM cursos WHERE id_docente = $id_docente";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Cursos</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e6f2e6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 600px;
            border-top: 8px solid #00703c;
        }

        h2 {
            color: #00703c;
            text-align: center;
            margin-bottom: 30px;
        }

        .curso {
            background-color: #f4f9f4;
            border-left: 4px solid #00703c;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 4px;
            font-size: 16px;
            color: #333333;
        }

        .menu-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            padding: 12px;
            background-color: #00703c;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .menu-link:hover {
            background-color: #005a2c;
        }

        .menu-link:focus {
            outline: 3px solid #a3d9a5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cursos asignados</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($curso = mysqli_fetch_assoc($result)) {
                echo "<div class='curso'><strong>ID:</strong> {$curso['id_curso']}<br><strong>Nombre:</strong> {$curso['name_curso']}<br><strong>Fecha:</strong> {$curso['fecha_creacion']}</div>";
            }
        } else {
            echo "<p>No hay cursos asignados.</p>";
        }
        mysqli_close($conn);
        ?>
        <a class="menu-link" href="../menu.php">Volver al menú</a>
    </div>
</body>
</html>