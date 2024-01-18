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
                       
        //realizamos la operacion DELETE
        $sql = 'DELETE FROM contactos WHERE id_contacto='.$_GET['id'];
        //////////////////////////////
        //opcion a
        /*
        $resultado=$conexion->query($sql);
        if($resultado){
                echo '<p>Se ha borrado '.$conexion->affected_rows.' contactos</p>';                
            }
            else{
                echo '<p>Tuvimos problemas con el borrado, intentalo de nuevo más tarde</p>';
            }
         */
        
        //////////////////////////
        //opcion b
        if(mysqli_query($conexion,$sql)){
            echo '<p>Se ha borrado '.mysqli_affected_rows($conexion).' contactos</p>';
        }
        else{
            echo '<p>Tuvimos problemas con el borrado, intentalo de nuevo más tarde</p>';
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
