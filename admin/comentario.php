<?php
    require_once('../class/comentarios.class.php');
    $rol=$Comentario->validar_rol('Externo');
    $accion= isset($_GET['accion'])?$_GET['accion']:null;
    $idrecibe = isset($_GET['id'])?$_GET['id']:null;
    $idrecibe=is_numeric($idrecibe)?$idrecibe:null;
    $id_publ = isset($_GET['id_publ'])?$_GET['id_publ']:null;
    $id = isset($_SESSION['id_usr'])?$_SESSION['id_usr']:null;
    $data=isset($_POST['data'])?$_POST['data']:null;
    include('view/header.view.php');
    switch($accion){
        case 'create':
            if (isset($data['enviar'])){
                echo $idrecibe;
                $comentarios = $Comentario->create($data,$idrecibe);
                if ($comentarios){ 
                    $Comentario->alerta("Comentario creado correctamente","success");
                    header('location: blog.view.php?id='.$idrecibe);
                }else{
                    $Comentario->alerta("No se a agregado el comentario","danger");
                    include("view/comentarios.form.php");
                }
            }else{
                include("view/comentarios.form.php");
            }
            break;
        case 'deletecom':
            $borrado = $Comentario->deleteOneCom($id_publ, $id,$idrecibe);
            if ($borrado){
                $Comentario->alerta("Comentario borrado","success");
                header('location: blog.view.php?id='.$id_publ);
            }
            else{
                $Comentario->alerta("El registro no a sido borrado","danger");
                $comentarios = $Comentario->read($id_publ);
                header('location: blog.view.php?id='.$id_publ);
            }
            break;
        case 'update':
            if (isset($data['enviar'])){
                if (!is_null($idrecibe)){
                    $comentarios = $Comentario->update($idrecibe, $data);
                    if ($comentarios){
                        $Comentario->alerta("Atraccion actualizada correctamente","success");
                        $comentarios = $Comentario->read();
                        include("view/comentarios.php");
                    }else{
                        $Comentario->alerta("No se a actualizado la atraccion","danger");
                        include("view/comentarios.form.php");
                    }
                }
            }else{
                if (!is_null($idrecibe)){
                    $comentarios = $Comentario->readOne($idrecibe);
                    if (isset($comentarios[0])){
                        $data=$comentarios[0];
                        include("view/comentarios.form.php");
                    }else{
                        $Comentario->alerta("No existe la atracción","danger");
                        $comentarios = $Comentario->read();
                        include("view/comentarios.php");
                    }
                }
            }
            
            break;
        case 'reporte':
            ob_clean();
            $comentarios = $Comentario->read();
            ob_start();
            include('view/comentarios.reporte.php');
            $variable=ob_get_clean();
            $Comentario->pdf('P','A4',$variable,'prueba.pdf');
            break;
        case 'desc':
            $publicaciones = $Comentario->readdesc();
            break;
        default:
            echo "hasta aca";
            $comentarios = $Comentario->read($id);
            header('location: blog.view.php?id='.$id);
            break;
                
    }
?>