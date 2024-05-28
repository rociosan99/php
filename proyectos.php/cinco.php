<?php

// Función para convertir un número binario a decimal
function binarioADecimal($binario) {
    // Inicializar variables
    $decimal = 0;
    $potencia = 0;

    // Recorrer el número binario de derecha a izquierda
    for ($i = strlen($binario) - 1; $i >= 0; $i--) {
        // Obtener el dígito binario en la posición actual
        $digito = $binario[$i];

        // Calcular la contribución del dígito al valor decimal
        $contribucion = $digito * pow(2, $potencia);

        // Sumar la contribución al valor decimal total
        $decimal += $contribucion;

        // Incrementar la potencia
        $potencia++;
    }

    return $decimal;
}

// Función para convertir un número decimal a hexadecimal
function decimalAHexadecimal($decimal) {
    // Convertir el número decimal a una cadena
    $decimalStr = strval($decimal);

    // Crear un array para almacenar los dígitos hexadecimales
    $hexadecimal = [];

    // Convertir cada dígito decimal a su equivalente hexadecimal
    while ($decimal > 0) {
        $resto = $decimal % 16;
        $digitoHex = dechex($resto); // Convertir a letra hexadecimal
        $hexadecimal[] = $digitoHex;
        $decimal = floor($decimal / 16);
    }

    // Invertir el orden de los dígitos hexadecimales
    $hexadecimalStr = implode("", array_reverse($hexadecimal));

    return $hexadecimalStr;
}

// Variables para almacenar el número binario, su equivalente decimal y hexadecimal
$numeroBinario = null;
$decimal = null;
$hexadecimal = null;

// Verificar si se ha enviado el formulario
if (isset($_POST['numeroBinario'])) {
    // Obtener el número binario ingresado
    $numeroBinario = $_POST['numeroBinario'];

    // Validar que el número binario solo contenga dígitos 0 y 1
    if (preg_match('/^[01]+$/', $numeroBinario)) {
        // Convertir el número binario a decimal
        $decimal = binarioADecimal($numeroBinario);

        // Convertir el número decimal a hexadecimal
        $hexadecimal = decimalAHexadecimal($decimal);
    } else {
        echo "<p>Error: El número binario solo debe contener dígitos 0 y 1.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión binario a decimal y hexadecimal</title>
</head>
<body>
    <h1>Conversión binario a decimal y hexadecimal</h1>

    <form method="post">
        <label for="numeroBinario">Ingrese un número binario:</label>
        <input type="text" id="numeroBinario" name="numeroBinario" required>
        <input type="submit" value="Convertir">
    </form>

    <?php if ($decimal != null && $hexadecimal != null): ?>
        <p>Equivalente en decimal: <?php echo $decimal; ?></p>
        <p>Equivalente en hexadecimal: 0x<?php echo $hexadecimal; ?></p>
    <?php endif; ?>
</body>
</html