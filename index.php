<?php
    require_once('class/miembro.class.php');
    $miembros = $Miembro->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagenes/logo-meits.png" type="image/x-icon">
    <title>MEITS | leadership</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="js/prelaoder/dist/css/gspinner.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <div id="particles-js"></div>
    <header class="hero">
        <nav class="navbar">
            <div class="content">
                <div class="logo">
                    <a href="#">MEITS</a>
                </div>
                <ul class="menu-list">
                    <div class="icon cancel-btn">
                        <i class="fas fa-times"></i>
                    </div>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#nosotros">Sobre nosotros</a></li>
                    <li><a href="#integrantes">Integrantes</a></li>
                    <li><a href="admin/blog.php" target="_blank">Blog</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <button class="switch" id="switch">
                        <span><i class="fas fa-sun"></i></span>
                        <span><i class="fas fa-moon"></i></span>
                    </button>
                </ul>
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </nav>
        <section class="contenido">
            <img src="imagenes/meits-black.png" alt="Imagen MEITS" class="logo-prin" id="img-prin">
            <h1 class="titulo"><span class="typed"></span> mentes jovenes.</h1>
            <h4 class="subt">Fomentamos a los jóvenes la cultura de emprendimiento y liderazgo.</h4>
        </section>
    </header>

    <section class="seccion" id="nosotros">
        <div class="nosotros_cont">
            <div class="nosotros_text">
                <p> Nos mueven el ingenio y la innovación.
                    Somos un grupo estudiantil que trabaja de la mano con la comunidad del tecnológico de Celaya y empresas de la región.
                    Contamos con un gran equipo de trabajo en el cual podemos ayudarte a desarrollar y liberar el potencial que llevas dentro.
                    Nos apasiona trabajar con los mejores jóvenes y con los lideres de las organizaciones con mayor proyección. Por eso es que la comunidad es lo mas importante para nosotros
                    Nuestro éxito depende de nuestras relaciones, tanto al interior como al exterior de nuestro equipo.</p>
            </div>
            <div class="nosotros_persona">
                <img src="imagenes/grupo_wITC.JPG" alt="cara" class="nosotros_img">
                <h2>We are MEITS.</h2>
            </div>
        </div>
    </section>
    <section class="seccion" id="integrantes">
        <div class="swiper mySwiper integrantes">
            <div class="swiper-wrapper integrante">
               <?php 
                    foreach($miembros as $miembro):
                ?>
                <div class="swiper-slide card">
                    <div class="card-integrante">
                        <div class="image">
                            <img src="<?php echo $miembro['foto']; ?>" alt="">
                        </div>

                        <div class="media-icons">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-github"></i>
                        </div>
                        <div class="name-profesion">
                            <span class="name"><?php echo $miembro['nombre']; ?></span>
                            <span class="profesion"><?php echo $miembro['apellidos']; ?></span>
                        </div>

                        <div class="button">
                            <button class="aboutMe"><?php echo $miembro['num_cont']; ?></button>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </section>
    <section class="seccion" id="contacto">
        <div id="Empresas" class="tabcontent">
            <h1>¿Buscas impulsar a la juventud?</h1>
            <p>Te invitamos a desarrollar un proyecto que involucre a la comunidad estudiantil o apoyarnos con algún patrocinio.</p>
            <form action="">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nombre</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="name" placeholder="Nombre de la empresa..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="mail">Correo</label>
                    </div>
                    <div class="col-75">
                        <input type="mail" id="mail" name="mail" placeholder="uncorreo@tuhost.com">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="desc">Descripcion</label>
                    </div>
                    <div class="col-75">
                        <textarea id="desc" name="descripcion" placeholder="Escribe aqui.." style="height:100px"></textarea>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-25">
                            <label for="image">Imagen</label>
                        </div>
                        <div class="col-75">
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">Asunto</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="subject" id="subject" placeholder="Tu asunto..">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>

        <div id="Estudiantes" class="tabcontent">
            <h1>¡Únete a la familia MEITS!</h1>
            <p>Te invitamos a formar parte de nuestra comunidad estudiantil.</p>
            <form action="">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nombre</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="name" placeholder="Nombre completo..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="mail">Correo</label>
                    </div>
                    <div class="col-75">
                        <input type="mail" id="mail" name="mail" placeholder="uncorreo@itcelaya.edu.mx">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="desc">¡Inspirate!</label>
                    </div>
                    <div class="col-75">
                        <textarea id="desc" name="descripcion" placeholder="¿Por qué te gustaria pertenecer?" style="height:100px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">Asunto</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="subject" id="subject" placeholder="Solitud de ingreso..">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>

        <button class="tablink" onclick="openCity('Empresas', this, 'black')" id="defaultOpen">Empresas</button>
        <button class="tablink" onclick="openCity('Estudiantes', this, 'black')">Estudiantes</button>
    </section>
    <div id="contenedor-loader">
        <div id="loader"></div>
    </div>
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
                        <a href="blog.php" target="_blank" class="nav__links">Blog</a>
                    </li>
                    <li class="nav__items">
                        <a href="#contacto" class="nav__links">Contacto</a>
                    </li>
                </ul>
            </nav>
        </section>

        <section class="footer__copy container">
            <div class="footer__social">
                <a href="https://www.facebook.com/MeitsCelaya" target="_blank" class="footer__icons"><img src="imagenes/facebook.svg" class="footer__img"></a>
                <a href="https://www.instagram.com/meits_celaya/" target="_blank" id="instagram" class="footer__icons"><img src="imagenes/instagram.svg" class="footer__img"></a>
                <a href="meits.celaya@gmail.com" class="footer__icons" target="_blank"><img src="imagenes/mail.svg" class="footer__img"></a>
            </div>

            <h3 class="footer__copyright">Pagina creada &copy; <a href="https://twitter.com/GuadaGamer7u7" class="autoria">Guadalupe Sanchez</a></h3>
        </section>
        <a href="admin/login.php">login</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="js/prelaoder/dist/js/g-spinner.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
        var $loader = $("#loader");
        $loader.gSpinner();

        window.onload = function() {
            setTimeout(function() {
                $("#contenedor-loader").fadeOut();
                $loader.gSpinner("hide")
            }, 2000);
        };
        
        var windowWidth = window.innerWidth;
            if (windowWidth >= 850) {
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    slidesPerGroup: 3,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            }else if(windowWidth<=420) {
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            } else{
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    slidesPerGroup: 2,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            }
        window.onresize = start;
        function start() {
            var windowWidth = window.innerWidth;
            if (windowWidth >= 850) {
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    slidesPerGroup: 3,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            } else if(windowWidth<=550) {
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            } else{
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    slidesPerGroup: 2,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            }
        }

    </script>

</body>
</html>
