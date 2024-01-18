<?php 
    include "includes/funciones.php";
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    Nombre: <input type="text" name="nombre" <?php mostrar_campo("nombre");?>>
    <br /><br />
    Email: <input type="email" name="email" <?php mostrar_campo("email");?>>
    <br /><br />
    Tlf: <input type="phone" name="tlf" <?php mostrar_campo("tlf");?>>
    <br /><br />
    Direccion: <input type="text" name="direccion" <?php mostrar_campo("direccion");?>>
    <br /><br />
    <input type="submit" value="Enviar">
</form>

 