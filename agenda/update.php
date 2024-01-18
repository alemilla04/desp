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
        
        //si pulsamos el boton de modificar
        if($_POST){
            //control de errores
            $sql = 'UPDATE contactos SET nombre="'.$_POST['nombre'].'", email="'.$_POST['email'].'", tlf="'.$_POST['tlf'].'", direccion="'.$_POST['direccion'].'" WHERE id_contacto='.$_POST['id_contacto'];
            if(mysqli_query($conexion,$sql)){
                echo '<p>Contacto modificado correctamente</p>';
            }
            else{
                echo '<p>El contacto no se ha podido modificar</p>';
            }            
        }
        else{        
            //rellenamos el formulario con los datos de la BD
            $sql = 'SELECT * FROM contactos WHERE id_contacto='.$_GET['id'];
            if($resultado = mysqli_query($conexion,$sql)){
                $fila = mysqli_fetch_array($resultado);
                echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">';
                echo 'Nombre: <input type="text" name="nombre" value="'.$fila['nombre'].'">';
                echo '<br /><br />';
                echo 'Email: <input type="email" name="email" value="'.$fila['email'].'">';
                echo '<br /><br />';
                echo 'Tlf: <input type="phone" name="tlf" value="'.$fila['tlf'].'">';
                echo '<br /><br />';
                echo 'Direccion: <input type="text" name="direccion" value="'.$fila['direccion'].'">';
                echo '<br /><br />';
                echo '<input type="hidden" name="id_contacto" value="'.$fila['id_contacto'].'">';
                echo '<input type="submit" value="Enviar">';
                echo '</form>';
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