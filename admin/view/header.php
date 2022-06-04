<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../imagenes/logo-meits.png" type="image/x-icon">
    <title>Meits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7a93f8c7d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Administración</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <?php
                        $roles=$_SESSION['roles'];
                        foreach($roles as $rol){
                            if(file_exists("view/menu.".$rol.".php")){
                               include("view/menu.".$rol.".php");
                            }
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>