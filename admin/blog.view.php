<?php
    require_once('../class/publicaciones.class.php');
    require_once('../class/comentarios.class.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../imagenes/logo-meits.png" type="image/x-icon">
    <title>MEITS - blog</title>
    <link rel="stylesheet" href="../css/blog.view.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav>
        <h1>BLOG - MEITS</h1>
        <div class="onglets">
            <a href="blog.php">Inicio</a>
            <a href="publicacion.php?accion=desc">Recientes</a>
            <a href="publicacion.php?accion=create">Crear</a>
        </div>
    </nav>
    <section class="articles">

        <?php
            $id = isset($_GET['id'])?$_GET['id']:null;
            $publicacion = $Publicacion->readOne($id);
            if($publicacion != array()):
        ?>
        <a href="publicacion.php?accion=delete&id=<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a>
        <a href="publicacion.php?accion=update"><i class="fas fa-edit"></i></a>
        <div class="article">
            <div class="left">
                <img src="../<?php echo $publicacion[0]['foto']; ?>" alt="">
            </div>
            <div class="right">
                <p class="date"><?php echo substr($publicacion[0]['creado'],0,10); ?></p>
                <h1><?php echo $publicacion[0]['titulo']; ?></h1>
                <p class="description"><?php echo $publicacion[0]['descripcion']; ?>.</p>
                <p class="auteur"><?php echo $publicacion[0]['autor']; ?></p>
            </div>
        </div>
        <?php
            else:
                $Publicacion->alerta("Id no valida","danger");
            endif;
        ?>
    </section>
    <section class="comentarios">
        <button> <a href="comentario.php?accion=create&id=<?php echo $_GET['id']; ?>">Un valor</a></button>
        <?php
            $comentarios = $Comentario->read($_GET['id']);
            foreach($comentarios as $comentario):
        ?>
     <div class="comentario">
        <p><?php echo $comentario['id_comentario']; ?></p>
        <h1 class="description"><?php echo $comentario['comentario']; ?>.</h1>
        <p class="auteur"><?php echo $comentario['autor']; ?></p>
        <a role="button" href="comentario.php?accion=deletecom&id=<?php echo $comentario['id_comentario']; ?>&id_publ=<?php echo $_GET['id']; ?>"><i class="fas fa-minus-square"></i></a>
        <a href=""><i class="fas fa-pen-square"></i></a>
    </div> 
    <?php
      endforeach;
      ?>
    </section>
    <footer class="footer">
        <section class="footer__container container">
            <nav class="nav nav--footer">
                <h2 class="footer__title">MEITS.</h2>

                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="index.php" class="nav__links">Inicio</a>
                    </li>
                    <li class="nav__items">
                        <a href="#nosotros" class="nav__links">Sobre nosotros</a>
                    </li>
                    <li class="nav__items">
                        <a href="#integrantes" class="nav__links">Integrantes</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links">Blog</a>
                    </li>
                    <li class="nav__items">
                        <a href="#contacto" class="nav__links">Contacto</a>
                    </li>
                </ul>
            </nav>
        </section>

        <section class="footer__copy container">
            <div class="footer__social">
                <a href="https://www.facebook.com/MeitsCelaya" target="_blank" class="footer__icons"><img src="../imagenes/facebook.svg" class="footer__img"></a>
                <a href="https://www.instagram.com/meits_celaya/" target="_blank" id="instagram" class="footer__icons"><img src="../imagenes/instagram.svg" class="footer__img"></a>
                <a href="meits.celaya@gmail.com" class="footer__icons" target="_blank"><img src="../imagenes/mail.svg" class="footer__img"></a>
            </div>

            <h3 class="footer__copyright">Pagina creada &copy; <a href="https://twitter.com/GuadaGamer7u7" class="autoria">Guadalupe Sanchez</a></h3>
        </section>
        <a href="login.php">login</a>
    </footer>
</body>

</html>
