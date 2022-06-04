<?php if($accion=="create"): ?>
<h1 class="text-center">Nuevo usuario</h1>
<?php
 else:
?>
<h1 class="text-center">Modificar usuario</h1>
<?php
endif;
?>
<form method="POST" enctype="multipart/form-data" action="usuario.php?accion=<?php echo $accion; ?><?php if($accion=='update') echo '&id='.$id;?>">
    <label class="form-label" for="">Nombre del usuario: </label>
    <input class="form-control" type="text" name="data[correo]" id="" value="<?php echo ($accion=="update")?$data["correo"]:""; ?>" />
    <label class="form-label" for="">contraseña: </label>
    <input class="form-control" type="password" pattern=".{6,}" name="data[contrasena]" id="" value="<?php echo ($accion=="update")?$data["contrasena"]:""; ?>" />
    <input class="btn btn-primary" type="submit" value="Guardar usuario" name="data[enviar]" />
</form>
