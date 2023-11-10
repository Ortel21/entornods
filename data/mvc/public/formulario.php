<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario BDD</title>
</head>

<body>
    <form action="/" method="post">
        <ul>
            <li>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="inombre">
            </li>
            <li>
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="idireccion">
            </li>
            <li>
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="iedad">
            </li>
            <li>
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="itelefono">
            </li>
            <li>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="ifecha">
            </li>
            <li class="button">
                <button type="submit">Enviar Formulario</button>
            </li>

        </ul>
    </form>

</body>

</html>