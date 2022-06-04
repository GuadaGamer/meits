<?php if($accion=="create"): ?>
<h1 class="text-center">Nuevo permiso</h1>
<?php
 else:
?>
<h1 class="text-center">Modificar permiso</h1>
<?php
endif;
?>
<form method="POST" enctype="multipart/form-data" action="permiso.php?accion=<?php echo $accion; ?><?php if($accion=='update') echo '&id='.$id;?>">
    <label class="form-label" for="">Nombre del permiso: </label>
    <input class="form-control" type="text" name="data[permiso]" id="" value="<?php echo ($accion=="update")?$data["permiso"]:""; ?>" />
    <input class="btn btn-primary" type="submit" value="Guardar permiso" name="data[enviar]" />
</form>
