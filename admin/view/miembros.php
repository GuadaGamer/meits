<div id="medio" class="row">
    <div class="col">
       <h1 class="text-center">Miembros</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Numero de control</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $cont=0;
                        foreach($miembro as $miembros):
                        ?>
                <tr>
                    <td><?php echo $miembros['nombre'] ?></td>
                    <td><?php echo $miembros['apellidos'] ?></td>
                    <td><?php echo $miembros['num_cont'] ?></td>
                    <td><a class="btn btn-danger" href="miembro.php?accion=delete&id=<?php echo $miembros['id_miembros']; ?> " role="button"><i class="fa-solid fa-eraser"></i></a>
                    <a class="btn btn-success" href="miembro.php?accion=update&id=<?php echo $miembros['id_miembros']; ?> " role="button"><i class="fa-solid fa-wand-magic-sparkles"></i></a>
                </tr>
                <?php
                    $cont++;
                            endforeach;
                        ?>
            </tbody>
        </table>
        <p class="text-left" ><?php echo "Se encontraron: ".$cont." registros."; ?></p>
    </div>