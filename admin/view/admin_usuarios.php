<div id="medio" class="row">
    <div class="col">
        <h1 class="text-center">Modificar roles y permisos.</h1>
        <h2 class="text-center">Usuario: <?php echo $usuario[0]['correo'];  ?></h2>
    </div>
</div>
<div>
    <form method="POST" action="usuario.php?accion=update&id=<?php echo $usuario[0]['id_usuario']?>&correo=<?php echo $usuario[0]['correo'];  ?>">
        <h3>Escoje el tipo de rol.</h3>
        <?php
            $usroles = $Rol->roles($usuario[0]['correo']);
            foreach($allroles as $rol): ?>
            <input <?php if(isset($usroles)){if(in_array($rol['rol'],$usroles)){echo " checked ";}} ?> class="form-check-input" type="checkbox" name="rolch[<?php echo $rol['id_rol']; ?>]" /><label class="form-check-label" for=""><?php echo $rol['rol']; ?></label>
        <?php endforeach; ?>
        <br>
        <h3>Escoje el tipo de permiso.</h3>
        <?php
            $uspermisos = $Permiso->permisos($usuario[0]['correo']);
            foreach($allpermisos as $permiso): ?>
            <input disabled <?php if(isset($usuario[0]['id_usuario'])){if(in_array($permiso['permiso'],$uspermisos)){echo " checked ";}} ?> class="form-check-input" type="checkbox" name="permisoch[<?php echo $permiso['id_permiso']; ?>]" /><label class="form-check-label" for=""><?php echo $permiso['permiso']; ?></label>
        <?php endforeach; ?>
        <br>
        <input class="btn btn-primary" type="submit" value="Guardar cambios" name="data[enviar]" />
    </form>
</div>