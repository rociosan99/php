<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Multiplicar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Formulario para ingresar el número -->
<form method="post" action="">
    <label for="numero">Ingrese un número entre 1 y 9:</label>
    <input type="number" id="numero" name="numero" min="1" max="9" required>
    <input type="submit" value="Mostrar tabla">
</form>

<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperamos el número ingresado y lo guardamos en la variable $numero mediante intval
    $numero = intval($_POST["numero"]);

    // Comprobamos que el número esté en el rango válido
    if ($numero >= 1 && $numero <= 9) {
        echo "<h2>Tabla de multiplicar del $numero</h2>";

        // Inicio de la tabla HTML
        echo "<table>";
        echo "<tr><th>Multiplicación</th><th>Resultado</th></tr>";

        // Generamos las filas de la tabla
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            echo "<td>$numero x $i</td>";
            echo "<td>" . ($numero * $i) . "</td>";
            echo "</tr>";
        }

        // Fin de la tabla HTML
        echo "</table>";
    } else {
        // Si el número no está en el rango válido, mostramos un mensaje de error
        echo "<p>Por favor, ingrese un número válido entre 1 y 9.</p>";
    }
}
?>

</body>
</html>