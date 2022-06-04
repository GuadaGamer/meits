<?php
require_once('meits.class.php');
require_once('rol.class.php');
require_once('permiso.class.php');
class Usuarios extends Meits
{
    public function read()
    {
        $linea = $this->db->prepare("SELECT * from usuario");
        $linea->execute();
        $usuarios = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }
    public function read_One($id)
    {
        $linea = $this->db->prepare("SELECT * from usuario where id_usuario=:id_usuario");
        $linea->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $linea->execute();
        $usuarios = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }
    public function read_One_mail($mail)
    {
        $linea = $this->db->prepare("SELECT * from usuario where correo=:mail");
        $linea->bindParam(':mail', $mail, PDO::PARAM_STR);
        $linea->execute();
        $usuarios = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }
    public function delete($id)
    {   
        $borrado = $this->delete_ur($id);
        $borrar = $this->db->prepare("DELETE from usuario where id_usuario=:id_usuario");
        $borrar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }

    public function create($correo,$externo){
        $cuenta = null;
            $sql="insert into usuario (correo, externo) values (:correo,:externo)";
            $insertar=$this->db->prepare($sql);
            $insertar->bindParam(':correo', $correo, PDO::PARAM_STR);
            $insertar->bindParam(':externo', $externo, PDO::PARAM_BOOL);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
        return $cuenta;
    }
    
    public function delete_ur($id_usuario){
        $borrar = $this->db->prepare("delete from usuario_rol where id_usuario=:id_usuario");
        $borrar->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }
    public function delete_pr($id_rol){
        $borrar = $this->db->prepare("delete from permiso_rol where id_rol=:id_rol");
        $borrar->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }
    
    public function update($id,$data,$correo){
            $roles = isset($_POST['rolch'])?$_POST['rolch']:array();
            $permisos = isset($_POST['permisoch'])?$_POST['permisoch']:array();
            if($roles /*&& $permisos*/){
                $cuenta = $this->update_roles_admin($id, $roles);
                $roles=$this->roles($correo);
                $this->update_permisos($roles, $permisos);
                return $cuenta;
            } else{
                $sql = "update usuario set correo=:correo, contrasena=md5(:contrasena) where id_usuario=:id_usuario";
                $actualizar = $this->db->prepare($sql);
                $actualizar->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
                $actualizar->bindParam(':contrasena', $data['contrasena'], PDO::PARAM_STR);
                $actualizar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
                $actualizar->execute();
                $cuenta = $actualizar->rowCount();
                return $cuenta;
            }
    }
    
    public function update_roles($id,$susRoles){
            $borrado =$this->delete_ur($id);
            $sql = "insert into usuario_rol (id_usuario, id_rol) values (:id_usuario, :id_rol)";
            $insertar=$this->db->prepare($sql);
            foreach ($susRoles as $id_rol){
                $insertar->bindParam(':id_usuario',  $id, PDO::PARAM_INT);
                $insertar->bindParam(':id_rol',    $id_rol, PDO::PARAM_INT);
                $insertar->execute();
            }
            $cuenta = $insertar->rowCount();
            return $cuenta;
    }
    
    public function update_roles_admin($id,$susRoles){
            $borrado =$this->delete_ur($id);
            $sql = "insert into usuario_rol (id_usuario, id_rol) values (:id_usuario, :id_rol)";
            $insertar=$this->db->prepare($sql);
            foreach ($susRoles as $key => $rol){
                $insertar->bindParam(':id_usuario',  $id, PDO::PARAM_INT);
                $insertar->bindParam(':id_rol',    $key, PDO::PARAM_INT);
                $insertar->execute();
            }
            $cuenta = $insertar->rowCount();
            return $cuenta;
    }
    public function update_permisos($roles,$susPermisos){
            foreach($roles as $key => $rol){
                $borrado =$this->delete_pr($key);
            }
            $sql = "insert into permiso_rol (id_rol, id_permiso) values (:id_rol, :id_permiso)";
            $insertar=$this->db->prepare($sql);
            foreach ($susPermisos as $key2 =>   $permiso){
                foreach($roles as $key3 => $rol){
                    $insertar->bindParam(':id_rol',  $key3, PDO::PARAM_INT);
                    $insertar->bindParam(':id_permiso',    $key2, PDO::PARAM_INT);
                    $insertar->execute();
                }
            }
    }
}

$Usuario = new Usuarios;
$Usuario->conexion();
?>