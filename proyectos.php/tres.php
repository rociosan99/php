<?php

// Función para convertir una cifra a letras
function cifraALetras($cifra) {
    $letras = ["cero", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve"];
    return $letras[$cifra];
}

// Variables para almacenar la cifra y la palabra en letras
$cifra = null;
$letraCifra = null;

// Verificar si se ha enviado el formulario
if (isset($_POST['cifra'])) {
    // Obtener la cifra ingresada
    $cifra = $_POST['cifra'];

    // Validar que la cifra sea un número entre 0 y 9
    if ($cifra >= 0 && $cifra <= 9) {
        // Convertir la cifra a letras
        $letraCifra = cifraALetras($cifra);
    } else {
        echo "<p>Error: La cifra debe ser un número entre 0 y 9.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir cifra a letras</title>
</head>
<body>
    <h1>Convertir cifra a letras</h1>

    <form method="post">
        <label for="cifra">Ingrese una cifra (0-9):</label>
        <input type="number" id="cifra" name="cifra" min="0" max="9" required>
        <input type="submit" value="Convertir">
    </form>

    <?php if ($letraCifra != null): ?>
        <p>La cifra <?php echo $cifra; ?> en letras es: <?php echo $letraCifra; ?></p>
    <?php endif; ?>
</body>
</html>
