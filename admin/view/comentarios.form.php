<?php if($accion=="create"): ?>
<h1>Nuevo Comentario</h1>
<?php
 else: $accion="update";
?>
<h1 class="text-center">Modificar comentario</h1>
<?php
endif;
?>
<form method="POST" enctype="multipart/form-data" action="comentario.php?accion=<?php echo $accion.'&id='.$idrecibe;?>">
    <label class="form-label" for="">Comentario: </label>
    <textarea class="form-control" name="data[comentario]" cols="20" rows=""><?php echo ($accion=="update")?$data["comentario"]:""; ?></textarea>
    <input class="btn btn-primary" type="submit" value="Guardar publicacion" name="data[enviar]" />
</form>