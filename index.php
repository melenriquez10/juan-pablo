<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Papas Fritas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body bgcolor=" #7FB3D5 ">
    <header>
        <h1>Papas Fritas</h1>
    </header>
    <main>
        <h2> Papas Fritas</h2>
        <form name="primel" action="index.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required><br><br>
            <input type="submit" value="Insertar" name="boton">
        </form>
        <h2>Tabla de conteo </h2>

        <?php
        include("conex.php");
        $linkconn = conectar();

        if (isset($_POST['boton'])) {
            
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];

            $consulta = "INSERT INTO `producto` (`nombre`, `precio`) VALUES ('$nombre', '$precio')";

            if (mysqli_query($linkconn, $consulta)) {
                echo "Su registro fue agregado";
            } else {
                echo "Error: " . mysqli_error($linkconn);
            }
        }

        $sql = "SELECT * FROM producto";
        $resultado = mysqli_query($linkconn, $sql);

        echo "La cantidad de filas son: " . mysqli_num_rows($resultado);
        echo "<table bgcolor='#AAB7B8'>";
        echo "<tr><td>Nro Producto</td><td>Nombre</td><td>Precio</td></tr>";

        foreach ($resultado as $fila) {
            $id_producto = $fila['id_producto'];
            $nombre = $fila['nombre'];
            $precio = $fila['precio'];

            echo "<tr><td>$id_producto</td><td>$nombre</td><td>$precio</td></tr>";
        }

        echo "</table>";
        ?>
        <li><a href="inicioooo.html">Volver inicio</a></li>

    </main>
</body>
</html>
