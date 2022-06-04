<?php
    require_once('../class/rol.class.php');
    $rol=$Rol->validar_rol('Administrador');
    $accion= isset($_GET['accion'])?$_GET['accion']:null;
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id=is_numeric($id)?$id:null;
    $data=isset($_POST['data'])?$_POST['data']:null;
    include('view/header.php');
    switch($accion){
        case 'create':
            if (isset($data['enviar'])){
                $rol = $Rol->create($data);
                if ($rol){ 
                    $Rol->alerta("Rol insertado correctamente","success");
                    $rol = $Rol->read();
                    include("view/roles.php");
                }else{
                    $Rol->alerta("No se insertó el Rol","danger");
                    include("view/roles.php");
                }
            }else{
                include("view/roles.form.php");
            }
            break;
        case 'delete':
            $rol = $Rol->delete($id);
            if ($rol)
                $Rol->alerta("Rol borrado","success");
            else
                $Rol->alerta("El registro no ha sido borrado","danger");
            $rol = $Rol->read();
            include("view/roles.php");
            break;
        case 'update':
            if (isset($data['enviar'])){
                if (!is_null($id)){
                    $rol = $Rol->update($id, $data);
                    if ($rol){
                        $Rol->alerta("Rol actualizado correctamente","success");
                        $rol = $Rol->read();
                        include("view/roles.php");
                    }else{
                        $Rol->alerta("El registro no ha sido actualizado","danger");
                        include("view/roles.form.php");
                    }
                }
            }else{
                if (!is_null($id)){
                    $rol = $Rol->read_One($id);
                    if (isset($rol[0])){
                        $data=$rol[0];
                        include("view/roles.form.php");
                    }else{
                        $Rol->alerta("No existe el Rol","danger");
                        $rol = $Rol->read();
                        include("view/roles.php");
                    }
                }
            }
            
            break;
        default:
            $rol = $Rol->read();
            include('view/roles.php');
            break;
                
    }
    include('view/footer.php');
?>