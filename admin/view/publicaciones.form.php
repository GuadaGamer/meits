<?php if($accion=="create"): ?>
<h1>Nueva publicación</h1>
<?php
 else: $accion="update";
?>
<h1 class="text-center">Modificar publicacion</h1>
<div class="d-flex justify-content-center">
    <img class="rounded-circle" src="../<?php echo $data['foto']; ?>" width="200" height="200">
</div><!-- /.col-lg-4 -->
<?php
endif;
?>
<form method="POST" enctype="multipart/form-data" action="publicacion.php?accion=<?php echo $accion; ?><?php if($accion=='update') echo '&id='.$idrecibe;?>">
    <label class="form-label" for="">Titulo de la publicacion: </label>
    <input class="form-control" type="text" name="data[titulo]" id="" value="<?php echo ($accion=="update")?$data["titulo"]:""; ?>" />
    <label class="form-label" for="">Descripción: </label>
    <textarea class="form-control" name="data[descripcion]" cols="20" rows=""><?php echo ($accion=="update")?$data["descripcion"]:""; ?></textarea>
    <label for="" class="form-label">Categoria:</label>
    <select name="data[id_categoria]" class="form-select" id="">
        <?php
            foreach($categorias as $categoria):
        ?>
        <option <?php if(isset($data["id_categoria"])){ if($data["id_categoria"]==$categoria["id_categoria"]) {echo "selected";}} ?> value="<?php echo $categoria["id_categoria"] ?>"><?php echo $categoria["categoria"] ?></option>
        <?php endforeach; ?>
    </select>
    <label class="form-label" for="">Foto:</label>
    <input class="form-control" type="file" name="fotografia" id="" />
    <input class="btn btn-primary" type="submit" value="Guardar publicacion" name="data[enviar]" />
</form>