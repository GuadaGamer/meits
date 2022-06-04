<?php

//Include Configuration File
include('../class/configuracion.php');
require_once('../class/meits.class.php');
require_once('../class/usuario.class.php');
require_once('../class/rol.class.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];

 



  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><i class="fab fa-google"></i></a>';
}

?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
     if(isset($_SESSION['access_token'])){
         echo '<title>Meits</title>';
     }else{
         echo '<title>Meits-login</title>';
     }
  ?>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../imagenes/logo-meits.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/login.css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <br />
        <?php
     if(!isset($_SESSION['access_token'])){
         echo '<h2 align="center">Accede usando tu cuenta de Google</h2>';
     }else{
         echo '<h2 align="center">Bienvenido a tu perfil.</h2>';
     }
  ?>

        <br />
        <div class="panel panel-default">
            <?php
   if($login_button == '')
   {
        $correo= $_SESSION['user_email_address'];
        $inst = "itcelaya";
        if($Usuario->read_One_mail($correo)==array()){
           $externo = strpos($correo,$inst);
            if(!$externo){
                $Usuario->create($correo,true);
                $usuarios=$Usuario->read();
                foreach($usuarios as $usr){
                    if ($usr['correo'] == $correo){
                        $id = $usr['id_usuario'];
                    }
                }
                $usroles=array(1,4);
                $cierto=$Usuario->update_roles($id,$usroles);
            }else{
                $Usuario->create($correo,false);
                $usuarios=$Usuario->read();
                foreach($usuarios as $usr){
                    if ($usr['correo'] == $correo){
                        $id = $usr['id_usuario'];
                    }
                }
                $usroles=array(1,4,5);
                $Usuario->update_roles($id,$usroles);
            }  
        }
       $usuarios=$Usuario->read();
                foreach($usuarios as $usr){
                    if ($usr['correo'] == $correo){
                        $id = $usr['id_usuario'];
                    }
                }
       $_SESSION['id_usr'] = $id;
       $_SESSION['roles']= $Meits->roles($correo);
       $_SESSION['permisos']= $Meits->permisos($correo);
       $_SESSION['validado']=true;
        echo '<div class="panel-heading">Bienvenido:</div><div class="panel-body">';
            echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
            echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';

            echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
            if (in_array("Administrador",$_SESSION['roles']) || in_array("Miembro",$_SESSION['roles'])){
                echo '<h3><a href="index.php">Administracion</h3></div>';
            }
            echo '<h3><a href="blog.php" target="_blank">Ir al blog</h3></div>'; 
            echo '<h3><a href="logout.php">Logout</h3></div>'; 
    }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
        </div>
    </div>
</body>

</html>
