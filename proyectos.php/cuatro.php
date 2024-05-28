<!DOCTYPE html>
<html>
<head>
    <title>Descomposición de Número</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<!-- Formulario para ingresar el número -->
<form method="post" action="">
    <label for="numero">Ingrese un número:</label>
    <input type="number" id="numero" name="numero" required>
    <input type="submit" value="Descomponer">
</form>

<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperamos el número ingresado y lo guardamos en la variable $numero
    $numero = $_POST["numero"];

    // Función para descomponer el número en unidades, decenas, centenas, etc.
    function descomponerNumero($num) {
        $num = (string)$num; // Convertimos el número a string para manejar cada dígito
        $longitud = strlen($num);
        $descomposicion = [];

        // Recorremos el número y almacenamos cada dígito en el array de descomposición
        for ($i = 0; $i < $longitud; $i++) {
            $posicion = $longitud - $i - 1;
            $valor = intval($num[$i]);
            $etiqueta = '';

            switch ($posicion) {
                case 0:
                    $etiqueta = 'Unidades';
                    break;
                case 1:
                    $etiqueta = 'Decenas';
                    break;
                case 2:
                    $etiqueta = 'Centenas';
                    break;
                case 3:
                    $etiqueta = 'Unidades de mil';
                    break;
                case 4:
                    $etiqueta = 'Decenas de mil';
                    break;
                case 5:
                    $etiqueta = 'Centenas de mil';
                    break;
                // Puedes seguir agregando casos según la longitud del número que quieras manejar
                default:
                    $etiqueta = 'Dígito ' . ($posicion + 1);
            }

            $descomposicion[$etiqueta] = $valor;
        }

        return $descomposicion;
    }

    // Obtener la descomposición del número ingresado
    $descomposicion = descomponerNumero($numero);

    // Mostrar el resultado en una tabla HTML
    echo "<h2>Descomposición de $numero</h2>";
    echo "<table>";
    echo "<tr><th>Etiqueta</th><th>Valor</th></tr>";
    foreach ($descomposicion as $etiqueta => $valor) {
        echo "<tr><td>$etiqueta</td><td>$valor</td></tr>";
    }
    echo "</table>";
}
?>

</body>
</html>