<?php
    require_once('../class/publicaciones.class.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../imagenes/logo-meits.png" type="image/x-icon">
    <title>MEITS - blog</title>
    <link rel="stylesheet" href="../css/blog.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
   <nav>
    <h1>BLOG - MEITS</h1>
    <div class="onglets">
      <a href="blog.php">Inicio</a>
      <a href="blog.php?desc=cierto">Recientes</a>
      <a href="publicacion.php?accion=create">Crear</a>
    </div>
  </nav>
  
  <section class="articles">
        <?php
            if(isset($_GET['desc'])?$_GET['desc']:"false"=="cierto"){
                $publicaciones = $Publicacion->readdesc();
            }else{
                $publicaciones = $Publicacion->read();
            }
            foreach($publicaciones as $publicacion):
        ?>
     <div class="article">
      <div class="left">
        <img src="../<?php echo $publicacion['foto']; ?>" alt="imagen<?php echo $publicacion['id_publicacion']; ?>">
      </div>
      <div class="right">
        <p class="date"><?php echo substr($publicacion['creado'],0,10); ?></p>
        <h1><a href="blog.view.php?id=<?php echo $publicacion['id_publicacion']; ?>"><?php echo $publicacion['titulo']; ?></a></h1>
        <p class="description"><?php echo substr($publicacion['descripcion'],0,100)."..."; ?>.</p>
        <p class="auteur"><?php echo $publicacion['autor']; ?></p>
      </div>
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
                <a href="https://www.facebook.com/MeitsCelaya" target="_blank" class="footer__icons"><img src="../imagenes/facebook.svg" class="footer__img" alt="iconoFacebook"></a>
                <a href="https://www.instagram.com/meits_celaya/" target="_blank" id="instagram" class="footer__icons"><img src="../imagenes/instagram.svg" class="footer__img" alt="iconoInstagram"></a>
                <a href="meits.celaya@gmail.com" class="footer__icons" target="_blank"><img src="../imagenes/mail.svg" class="footer__img" alt="iconoCorreo"></a>
            </div>

            <h3 class="footer__copyright">Pagina creada &copy; <a href="https://twitter.com/GuadaGamer7u7" class="autoria">Guadalupe Sanchez</a></h3>
        </section>
        <a href="login.php">login</a>
    </footer>
</body>
</html>