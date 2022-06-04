<div id="medio" class="row">
    <div class="col">
       <h1 class="text-center">Publicaciones</h1>
        <a class="btn btn-success" href="publicacion.php?accion=create" role="button"><i class="fa-solid fa-plus"></i></a>
        <a class="btn btn-link" target="_blank" href="publicacion.php?accion=reporte" role="button"><i class="fa-solid fa-file-pdf"></i></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Atraccion</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $cont=0;
                        foreach($publicaciones as $publicacion):
                        ?>
                <tr>
                    <td><?php echo $publicacion['id_publicacion'] ?></td>
                    <td><?php echo $publicacion['titulo'] ?></td>
                    <td><?php echo $publicacion['descripcion'] ?></td>
                    <td><img class="rounded-circle" src="../<?php echo $publicacion["foto"] ?>" alt="" width="50" height="50"></td>
                    <td><a class="btn btn-danger" href="publicacion.php?accion=delete&id=<?php echo $publicacion['id_publicacion']; ?> " role="button"><i class="fa-solid fa-eraser"></i></a></td>
                </tr>
                <?php
                    $cont++;
                            endforeach;
                        ?>
            </tbody>
        </table>
        <p class="text-left" ><?php echo "Se encontraron: ".$cont." registros."; ?></p>
    </div>
