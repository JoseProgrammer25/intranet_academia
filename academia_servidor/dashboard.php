<?php
session_start();

// Si llega por POST (desde login), validar y guardar sesión
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST['name_log'] ?? '';
    $logpswd = $_POST['pswd_log'] ?? '';

    $conn = mysqli_connect("localhost", "root", "", "academia");
    if (!$conn) {
        die("<p>Error de conexión: " . mysqli_connect_error() . "</p>");
    }

    $sql = "SELECT id_docente FROM docentes WHERE name_docente = ? AND pwd = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $login, $logpswd);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['usuario'] = $login;
        $_SESSION['id_docente'] = $row['id_docente'];
    } else {
        echo "<p>No se encuentra autorizado. <a href='index.html'>Volver</a></p>";
        exit();
    }

    mysqli_close($conn);
}

// Si no hay sesión activa, redirigir al inicio
if (!isset($_SESSION['usuario']) || !isset($_SESSION['id_docente'])) {
    header("Location: index.html");
    exit();
}

$login = $_SESSION['usuario'];
$id_docente = $_SESSION['id_docente'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Dashboard - Centro Educativo</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e6f2e6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-top: 8px solid #00703c;
        }

        h2 {
            text-align: center;
            color: #00703c;
            margin-bottom: 30px;
        }

        p {
            font-size: 18px;
            color: #333333;
            margin: 10px 0;
        }

        .highlight {
            font-weight: bold;
            color: #00703c;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            margin-top: 30px;
            background-color: #00703c;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #005a2c;
        }

        .course {
            background-color: #f4f9f4;
            border-left: 4px solid #00703c;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 4px;
        }

        hr {
            height: 4px;
            border: none;
            background-color: #00703c;
            margin: 40px 0 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenida a la Intranet del Centro</h2>
        <p>Sea usted bienvenido, <span class="highlight"><?php echo $login; ?></span></p>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "academia");
        if (!$conn) {
            die("<p>Error de conexión: " . mysqli_connect_error() . "</p>");
        }

        $sqlCursos = "SELECT name_curso, fecha_creacion FROM cursos WHERE id_docente = ?";
        $stmtCursos = mysqli_prepare($conn, $sqlCursos);
        mysqli_stmt_bind_param($stmtCursos, "i", $id_docente);
        mysqli_stmt_execute($stmtCursos);
        $resultCursos = mysqli_stmt_get_result($stmtCursos);

        if (mysqli_num_rows($resultCursos) > 0) {
            echo "<p><strong>Cursos asignados:</strong></p>";
            while ($curso = mysqli_fetch_assoc($resultCursos)) {
                echo "<div class='course'>📘 <strong>" . $curso['name_curso'] . "</strong><br><small>Creado el " . $curso['fecha_creacion'] . "</small></div>";
            }
        } else {
            echo "<p>No tiene cursos asignados actualmente.</p>";
        }

        mysqli_close($conn);
        ?>

        <hr>
        <a class="button" href="menu.php">Ir al Menú</a>
    </div>
</body>
</html>