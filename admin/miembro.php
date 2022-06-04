<?php
    require_once('../class/miembro.class.php');
    $rol=$Miembro->validar_rol('Administrador');
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id=is_numeric($id)?$id:null;
    $data=isset($_POST['data'])?$_POST['data']:null;
    $correo = isset($_GET['correo'])?$_GET['correo']:null;
    include('view/header.php');
    if (!isset($data['accion'])){
        $accion= isset($_GET['accion'])?$_GET['accion']:null;
        $data['accion']=$accion;
    }else{
        $accion=$data['accion'];
    }
    switch($accion){
        case 'create':
            if (isset($data['enviar'])){
                $miembro = $Miembro->create($data,$id);
                if ($miembro){ 
                    $Miembro->alerta("Miembro insertado correctamente","success");
                    $miembro = $Miembro->read();
                    include("view/miembros.php");
                }else{
                    $Miembro->alerta("No se insertó el miembro","danger");
                    include("view/miembros.php");
                }
            }else{
                include("view/miembros.form.php");
            }
            break;
        case 'delete':
            $miembro = $Miembro->delete($id);
            if ($miembro)
                $Miembro->alerta("Miembro borrado","success");
            else
                $Miembro->alerta("El registro no ha sido borrado","danger");
                $miembro = $Miembro->read();
                include("view/miembros.php");
            break;
        case 'update':
            if (isset($data['enviar'])){
                if (!is_null($id)){
                        $miembro = $Miembro->update($id, $data, $correo);
                        if ($miembro){
                            $Miembro->alerta("Miembro actualizado correctamente","success");
                            $miembro = $Miembro->read();
                            include("view/miembros.php");
                        }else{
                            $Miembro->alerta("El registro no ha sido actualizado","danger");
                            include("view/miembros.form.php");
                        }
                    
                }
            }else{
                if (!is_null($id)){
                    $miembro = $Miembro->read_One($id);
                    if (isset($miembro[0])){
                        $data=$miembro[0];
                        $data['accion']=$accion;
                        include("view/miembros.form.php");
                    }else{
                        $Miembro->alerta("No existe el permiso","danger");
                        $miembro = $Miembro->read();
                        include("view/miembros.php");
                    }
                }
            }
            break;
        default:
            $miembro = $Miembro->read();
            include('view/miembros.php');
            break;
                
    }
?>