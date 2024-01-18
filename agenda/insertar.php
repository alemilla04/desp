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
    </header>
    <section>
<?php
        //incluimos el fichero con el que trabajamos con la BD
        include "includes/conexion.php";
        
        //conexion a la base de datos
        $conexion = abrir_conexion();
                
        if(!$_POST){
            include "includes/formulario.php";
        }
        else{
            //control de errores
            $sql = 'INSERT INTO contactos(nombre, email, tlf, direccion)
            VALUES ("'.$_POST['nombre'].'","'.$_POST['email'].'","'.$_POST['tlf'].'","'.$_POST['direccion'].'")';
            if(mysqli_query($conexion,$sql)){
                echo '<p>Contacto insertado correctamente</p>';
            }
            else{
                echo '<p>El contacto no se ha podido insertar</p>';
                include ("includes/formulario.php");
            }
        }
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