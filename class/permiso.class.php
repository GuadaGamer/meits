<?php
require_once('meits.class.php');
class Permisos extends Meits
{
    public function read()
    {
        $linea = $this->db->prepare("SELECT * from permiso");
        $linea->execute();
        $permisos = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $permisos;
    }
    public function read_One($id)
    {
        $linea = $this->db->prepare("SELECT * from permiso where id_permiso=:id_permiso");
        $linea->bindParam(':id_permiso', $id, PDO::PARAM_INT);
        $linea->execute();
        $permisos = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $permisos;
    }
    public function delete($id)
    {
        $borrar = $this->db->prepare("DELETE from permiso where id_permiso=:id_permiso");
        $borrar->bindParam(':id_permiso', $id, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }

    

    public function create($data){
        $cuenta = null;
            $sql="insert into permiso (permiso) values (:permiso)";
            $insertar=$this->db->prepare($sql);
            $insertar->bindParam(':permiso', $data['permiso'], PDO::PARAM_STR);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
        return $cuenta;
    }
    
    public function update($id,$data){
        $sql = "update permiso set permiso=:permiso where id_permiso=:id_permiso";
        $actualizar = $this->db->prepare($sql);
        $actualizar->bindParam(':permiso', $data['permiso'], PDO::PARAM_STR);
        $actualizar->bindParam(':id_permiso', $id, PDO::PARAM_INT);
        $actualizar->execute(); 
        $cuenta = $actualizar->rowCount();
        return $cuenta;
        
    }
}

$Permiso = new Permisos;
$Permiso->conexion();
?>