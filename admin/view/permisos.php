<div id="medio" class="row">
    <div class="col">
       <h1 class="text-center">Permisos</h1>
        <a class="btn btn-success" href="permiso.php?accion=create" role="button"><i class="fa-solid fa-plus"></i></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Renglón</th>
                    <th scope="col">Permiso</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $cont=1;
                        foreach($permiso as $permisos):
                        ?>
                <tr>
                    <th scope="row"><?php echo $cont; $cont++?></th>
                    <td><?php echo $permisos['permiso'] ?></td>
                    <td><a class="btn btn-danger" href="permiso.php?accion=delete&id=<?php echo $permisos['id_permiso']; ?> " role="button"><i class="fa-solid fa-eraser"></i></a>
                    <a class="btn btn-success" href="permiso.php?accion=update&id=<?php echo $permisos['id_permiso']; ?> " role="button"><i class="fa-solid fa-wand-magic-sparkles"></i></a></td>
                </tr>
                <?php
                    
                            endforeach;
                        ?>
            </tbody>
        </table>
        
    </div>