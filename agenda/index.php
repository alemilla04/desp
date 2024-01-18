<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda de contactos</title>
    <link rel="stylesheet" href="includes/estilos.css">
</head>
<body>
    <header class="cabecera">
        <h1>Agenda de contactos</h1>
        <h2>--despliegue web--</h2>
    </header>
    <section>
<?php
        //incluimos el fichero con el que trabajamos con la BD
        include "includes/conexion.php";
        
        //conexion a la base de datos
        $conexion = abrir_conexion();

        //utilizamos una tabla para mostrar las filas de la BD
        echo '<table>';
            echo '<tr>';
                echo '<td>Nombre</td>';
                echo '<td>Email</td>';
                echo '<td>Tlf</td>';
                echo '<td>Direccion</td>';
                echo '<td>Editar</td>';
                echo '<td>Borrar</td>';
            echo '</tr>';
            $sql = 'SELECT * FROM contactos';
            if($resultado = mysqli_query($conexion,$sql)){
                while($fila = mysqli_fetch_array($resultado)){
                    echo '<tr>';
                        echo '<td>'.$fila['nombre'].'</td>';
                        echo '<td>'.$fila['email'].'</td>';
                        echo '<td>'.$fila['tlf'].'</td>';
                        echo '<td>'.$fila['direccion'].'</td>';
                        echo '<td><a href="update.php?id='.$fila['id_contacto'].'">Editar</a></td>';
                        echo '<td><a href="borrar.php?id='.$fila['id_contacto'].'">Borrar</a></td>';
                    echo '</tr>';
                }
            }
        echo '</table>';
        
        //cerramos la conexión
        cerrar_conexion($conexion);
?>
    </section>
    <footer class="pie">
        <a href="index.php">Página principal</a>
        ---
        <a href="insertar.php">Insertar un contacto</a>
    </footer>
</body>
</html>