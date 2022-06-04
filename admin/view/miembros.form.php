<?php if($data['accion']=="create"): ?>
<h1 class="text-center">Nuevo miembro</h1>
<?php
    $accion='create';
 else:
?>
<h1 class="text-center">Modificar miembro</h1>
<?php
endif;
?>
<form method="POST" enctype="multipart/form-data" action="miembro.php?accion=<?php echo $accion.'&id='.$id;?>">
    <label class="form-label" for="">Nombre del miembro: </label>
    <input required class="form-control" type="text" name="data[nombre]" id="" value="<?php echo ($data['accion']=="update")?$data["nombre"]:""; ?>" />
    <label class="form-label" for="">Apellidos: </label>
    <input required class="form-control" type="text" name="data[apellidos]" id="" value="<?php echo ($data['accion']=="update")?$data["apellidos"]:""; ?>" />
    <label class="form-label" for="">Numero de control: </label>
    <input required class="form-control" type="number" maxlength="8" name="data[num_cont]" id="" value="<?php echo ($data['accion']=="update")?$data["num_cont"]:""; ?>" />
    <label class="form-label" for="">Foto:</label>
    <input class="form-control" type="file" name="fotografia" id="" required />
    <input class="btn btn-primary" type="submit" value="Guardar miembro" name="data[enviar]" />
</form>
