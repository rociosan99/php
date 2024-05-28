<!DOCTYPE html>
<html>
<head>
    <title>Números Primos en Tabla 4x4</title>
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
    <label for="numero">Ingrese un número:</label>
    <input type="number" id="numero" name="numero" required>
    <input type="submit" value="Mostrar números primos">
</form>

<?php
// Función para comprobar si un número es primo
function esPrimo($num) {
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        } //comprobar todos los posibles divisores desde 2 hasta la raíz cuadrada del número (sqrt($num))
    }
    return true;
}

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperamos el número ingresado y lo guardamos en la variable $numero
    $numero = intval($_POST["numero"]);

    // Array para almacenar los números primos
    $primos = [];
    
    // Encontramos los siguientes 16 números primos
    $contador = $numero + 1;
    while (count($primos) < 16) {
        if (esPrimo($contador)) {
            $primos[] = $contador;
        }
        $contador++;
    }

    // Mostrar los números primos en una tabla de 4x4
    echo "<h2>16 Números primos después de $numero</h2>";
    echo "<table>";
    for ($i = 0; $i < 4; $i++) {
        echo "<tr>"; // Inicia una nueva fila
        for ($j = 0; $j < 4; $j++) {
            echo "<td>" . $primos[$i * 4 + $j] . "</td>"; // Muestra el número primo en la celda correspondiente
        }
        echo "</tr>"; // Cierra la fila
    }
    echo "</table>";
}
?>

</body>
</html>