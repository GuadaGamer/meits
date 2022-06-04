<?php
    include_once('../class/meits.class.php');
    include_once('../class/publicaciones.class.php');
    $accion = $_SERVER['REQUEST_METHOD'];
    $datos = array();
    switch($accion){
        case 'POST':
            $data = file_get_contents("php://input");
            if(strlen($data)>5){
                $data = json_decode($data, true);
            }else{
                $data[0]=$_POST;
            }
            if(isset($_GET['id_publicacion'])){
                $id = $_GET['id_publicacion'];
                foreach($data as $publicacion){
                    $publicaciones = $Publicacion->update($id,$publicacion,true);
                    $status=200;
                    $msj="se ha actualizado con exito";
                }
            }else{
                foreach($data as $publicacion){
                    $publicaciones = $Publicacion->create($publicacion, true);
                    $status = 200;
                    $msj = "Se ha dado de alta una nueva publicacion";
                }
            }
            break;
        case 'DELETE':
            if (isset($_GET['id_publicacion'])){
                $id_publicacion = $_GET['id_publicacion'];
                $cantidad= $Publicacion->delete($id_publicacion);
                $status=200;
                $msj= "se han eliminado: ".$cantidad." con exito" ;
            }else{
                $status= 404;
                $msj ="No se ah encontrado el recurso";
            }
            break;
        case 'GET':
        default:
            $datos= null;
            if (isset($_GET['id_publicacion'])){
                $id_publicacion = $_GET['id_publicacion'];
                $datos= $Publicacion->readOne($id_publicacion);
            }else{
                $datos=$Publicacion->read();
            }
            $status = 200;
            $mensaje = "Se an procesado con exito las acciones";
    }
    $Meits->json($datos, $status, $mensaje);
?>