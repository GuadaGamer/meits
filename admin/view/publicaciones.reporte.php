<img src="../imagenes/header.jpg" alt="header" style="width: 100%;" />
<h1 style="color: red;"> Publicaciones</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th>Foto</th>
    </tr>
    <?php
        $cont=0;
        foreach($publicaciones as $publicacion):
    ?>
    <tr>
        <td><?php echo $publicacion['id_publicacion'] ?></td>
        <td><?php echo $publicacion['titulo'] ?></td>
        <td><?php echo $publicacion['descripcion'] ?></td>
        <td><img src="../<?php echo $publicacion["foto"] ?>" alt="" style="width:50px; heigth:50px; -moz-border-radius:50px; -webkit-border-radius:50px; border-radius: 50px;"></td>
    </tr>
    <?php
        $cont++;
        endforeach;
    ?>
</table>
