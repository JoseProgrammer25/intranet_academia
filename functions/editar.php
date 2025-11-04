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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_curso = $_POST['id_curso'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $sql = "UPDATE cursos SET name_curso = '$nuevo_nombre' WHERE id_curso = $id_curso AND id_docente = $id_docente";
    mysqli_query($conn, $sql);
    header("Location: listar.php");
    exit();
}

$sql = "SELECT id_curso, name_curso FROM cursos WHERE id_docente = $id_docente";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
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
            width: 380px;
            text-align: center;
            border-top: 8px solid #00703c;
        }

        h2 {
            color: #00703c;
            margin-bottom: 30px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="submit"],
        .menu-link {
            width: 100%;
            padding: 12px;
            background-color: #00703c;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        .menu-link:hover {
            background-color: #005a2c;
        }

        input[type="submit"]:focus,
        .menu-link:focus {
            outline: 3px solid #a3d9a5;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Editar nombre de curso</h2>
        <form method="post">
            <select name="id_curso" required>
                <?php while ($curso = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$curso['id_curso']}'>{$curso['name_curso']}</option>";
                } ?>
            </select>
            <input type="text" name="nuevo_nombre" placeholder="Nuevo nombre del curso" required>
            <input type="submit" value="Actualizar">
        </form>
        <a class="menu-link" href="../menu.php">Volver al menú</a>
    </div>
</body>
</html>