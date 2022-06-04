<?php
    require_once('../class/permiso.class.php');
    $rol=$Permiso->validar_rol('Administrador');
    $accion= isset($_GET['accion'])?$_GET['accion']:null;
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id=is_numeric($id)?$id:null;
    $data=isset($_POST['data'])?$_POST['data']:null;
    include('view/header.php');
    switch($accion){
        case 'create':
            if (isset($data['enviar'])){
                $permiso = $Permiso->create($data);
                if ($permiso){ 
                    $Permiso->alerta("Permiso insertado correctamente","success");
                    $permiso = $Permiso->read();
                    include("view/permisos.php");
                }else{
                    $Permiso->alerta("No se insertó el permiso","danger");
                    include("view/permisos.php");
                }
            }else{
                include("view/permisos.form.php");
            }
            break;
        case 'delete':
            $permiso = $Permiso->delete($id);
            if ($permiso)
                $Permiso->alerta("permiso borrado","success");
            else
                $Permiso->alerta("El registro no ha sido borrado","danger");
            $permiso = $Permiso->read();
            include("view/permisos.php");
            break;
        case 'update':
            if (isset($data['enviar'])){
                if (!is_null($id)){
                    $permiso = $Permiso->update($id, $data);
                    if ($permiso){
                        $Permiso->alerta("permiso actualizado correctamente","success");
                        $permiso = $Permiso->read();
                        include("view/permisos.php");
                    }else{
                        $Permiso->alerta("El registro no ha sido actualizado","danger");
                        include("view/permisos.form.php");
                    }
                }
            }else{
                if (!is_null($id)){
                    $permiso = $Permiso->read_One($id);
                    if (isset($permiso[0])){
                        $data=$permiso[0];
                        include("view/permisos.form.php");
                    }else{
                        $Permiso->alerta("No existe el permiso","danger");
                        $permiso = $Permiso->read();
                        include("view/permisos.php");
                    }
                }
            }
            
            break;
        default:
            $permiso = $Permiso->read();
            include('view/permisos.php');
            break;
                
    }
    include('view/footer.php');
?>