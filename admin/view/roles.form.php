<?php if($accion=="create"): ?>
<h1 class="text-center">Nuevo rol</h1>
<?php
 else:
?>
<h1 class="text-center">Modificar rol</h1>
<?php
endif;
?>
<form method="POST" enctype="multipart/form-data" action="rol.php?accion=<?php echo $accion; ?><?php if($accion=='update') echo '&id='.$id;?>">
    <label class="form-label" for="">Nombre del rol: </label>
    <input class="form-control" type="text" name="data[rol]" id="" value="<?php echo ($accion=="update")?$data["rol"]:""; ?>" />
    <input class="btn btn-primary" type="submit" value="Guardar rol" name="data[enviar]" />
</form>