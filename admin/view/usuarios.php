<div id="medio" class="row">
    <div class="col">
       <h1 class="text-center">Usuarios</h1>
        <a class="btn btn-success" href="usuario.php?accion=create" role="button"><i class="fa-solid fa-plus"></i></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Correo</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $cont=0;
                        foreach($usuario as $usuarios):
                        ?>
                <tr>
                    <td><?php echo $usuarios['correo'] ?></td>
                    <td><a class="btn btn-danger" href="usuario.php?accion=delete&id=<?php echo $usuarios['id_usuario']; ?> " role="button"><i class="fa-solid fa-eraser"></i></a>
                    <a class="btn btn-success" href="usuario.php?accion=update&id=<?php echo $usuarios['id_usuario']; ?> " role="button"><i class="fa-solid fa-wand-magic-sparkles"></i></a>
                    <a class="btn btn-info" href="usuario.php?accion=admin&id=<?php echo $usuarios['id_usuario']; ?>"  role="button"><i class="fa-solid fa-circle-info"></i></a></td>
                </tr>
                <?php
                    $cont++;
                            endforeach;
                        ?>
            </tbody>
        </table>
        <p class="text-left" ><?php echo "Se encontraron: ".$cont." registros."; ?></p>
    </div>