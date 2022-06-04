<?php
require_once('meits.class.php');
class Roles extends Meits
{
    public function read()
    {
        $linea = $this->db->prepare("SELECT * from rol");
        $linea->execute();
        $roles = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    }
    public function read_One($id)
    {
        $linea = $this->db->prepare("SELECT * from rol where id_rol=:id_rol");
        $linea->bindParam(':id_rol', $id, PDO::PARAM_INT);
        $linea->execute();
        $roles = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    }
    public function delete($id)
    {
        $borrar = $this->db->prepare("DELETE from rol where id_rol=:id_rol");
        $borrar->bindParam(':id_rol', $id, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }

    public function create($data){
        $cuenta = null;
            $sql="insert into rol (rol) values (:rol)";
            $insertar=$this->db->prepare($sql);
            $insertar->bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
        return $cuenta;
    }
    
    public function update($id,$data){
        $sql = "update rol set rol=:rol where id_rol=:id_rol";
        $actualizar = $this->db->prepare($sql);
        $actualizar->bindParam(':rol', $data['rol'], PDO::PARAM_STR);
        $actualizar->bindParam(':id_rol', $id, PDO::PARAM_INT);
        $actualizar->execute(); 
        $cuenta = $actualizar->rowCount();
        return $cuenta;
        
    }
}

$Rol = new Roles;
$Rol->conexion();
?>