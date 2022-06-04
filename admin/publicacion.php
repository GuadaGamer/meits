<?php
    require_once('../class/publicaciones.class.php');
    require_once('../class/categorias.class.php');
    $rol=$Publicacion->validar_rol('Estudiante');
    $accion= isset($_GET['accion'])?$_GET['accion']:null;
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id_publ = isset($_GET['id_publ'])?$_GET['id_publ']:null;
    $idrecibe = isset($_SESSION['id_usr'])?$_SESSION['id_usr']:null;
    $idrecibe=is_numeric($idrecibe)?$idrecibe:null;
    $data=isset($_POST['data'])?$_POST['data']:null;
    $categorias = $Categoria->read();
    include('view/header.view.php');
    switch($accion){
        case 'create':
            if (isset($data['enviar'])){
                $publicaciones = $Publicacion->create($data,false,$idrecibe);
                if ($publicaciones){
                    $publicacion = $Publicacion->readLast();
                    $isCorrecto = $Categoria->create($data,$publicacion);
                    if($isCorrecto){
                        $Publicacion->alerta("Publicacion creada correctamente","success");
                        header('location: blog.php');
                    }
                    else{
                        $Publicacion->alerta("No se a agregado la publicacion","danger");
                        include("view/publicaciones.form.php");
                    }
                }else{
                    $Publicacion->alerta("No se a agregado la publicacion","danger");
                    include("view/publicaciones.form.php");
                }
            }else{
                include("view/publicaciones.form.php");
            }
            break;
        case 'delete':
            $borrado = $Comentario->deleteCom($id,$idrecibe);
            $delCategoria = $Categoria->delPC($id);
            $publicaciones = $Publicacion->delete($id,$idrecibe);
            if ($publicaciones){
                $Publicacion->alerta("Publicacion borrada","success");
                header('location: blog.php');
            }
            else{
                $Publicacion->alerta("El registro no a sido borrado","danger");
                $publicaciones = $Publicacion->read();
                include("view/publicaciones.php");
            }
            break;
        case 'deletecom':
            $borrado = $Comentario->deleteOneCom($id_publ,$idrecibe,$id);
            if ($comentarios){
                $Publicacion->alerta("Comentario borrada","success");
                header('location: blog.view.php?id='.$id_publ);
            }
            else{
                $Publicacion->alerta("El registro no a sido borrado","danger");
                header('location: blog.view.php?id='.$id_publ);
            }
            break;
        case 'update':
            if (isset($data['enviar'])){
                if (!is_null($idrecibe)){
                    $publicaciones = $Publicacion->update($idrecibe, $data);
                    if ($publicaciones){
                        $Publicacion->alerta("Atraccion actualizada correctamente","success");
                        $publicaciones = $Publicacion->read();
                        include("view/publicaciones.php");
                    }else{
                        $Publicacion->alerta("No se a actualizado la atraccion","danger");
                        include("view/publicaciones.form.php");
                    }
                }
            }else{
                if (!is_null($idrecibe)){
                    $publicaciones = $Publicacion->readOne($idrecibe);
                    if (isset($publicaciones[0])){
                        $data=$publicaciones[0];
                        include("view/publicaciones.form.php");
                    }else{
                        $Publicacion->alerta("No existe la atracción","danger");
                        $publicaciones = $Publicacion->read();
                        include("view/publicaciones.php");
                    }
                }
            }      
            break;
        case 'reporte':
            ob_clean();
            $publicaciones = $Publicacion->read();
            ob_start();
            include('view/publicaciones.reporte.php');
            $variable=ob_get_clean();
            $Publicacion->pdf('L','A4',$variable,'prueba.pdf');
            break;
        default:
            $publicaciones = $Publicacion->read();
            include("view/publicaciones.php");
            break;
                
    }
?>