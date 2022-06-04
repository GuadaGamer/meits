<?php
require_once('meits.class.php');
class Miembros extends Meits
{
    public function read()
    {
        $linea = $this->db->prepare("SELECT * from miembros");
        $linea->execute();
        $miembros = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $miembros;
    }
    public function read_One($id)
    {
        $linea = $this->db->prepare("SELECT * from miembros where id_miembros=:id_miembros");
        $linea->bindParam(':id_miembros', $id, PDO::PARAM_INT);
        $linea->execute();
        $miembros = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $miembros;
    }
    public function delete($id)
    {   
        $borrar = $this->db->prepare("DELETE from miembros where id_miembros=:id_miembro");
        $borrar->bindParam(':id_miembro', $id, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }
    public function delete_us($id)
    {   
        $borrar = $this->db->prepare("DELETE from miembros where id_usuario=:id_usuario");
        $borrar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }

    public function create($data,$id){
        $sinfoto=false;
        $cuenta = null;
        if(!$sinfoto){
            $fotografia=$this->cargarimg("miembro");
        }else{
            $fotografia="imagenes/miembro/img1.jpg";
        }
        if ($fotografia){
            $sql="insert into miembros (nombre, apellidos,num_cont,id_usuario,foto) values (:nombre,:apellidos,:num_cont,:id_usuario,:foto)";
            $insertar=$this->db->prepare($sql);
            $insertar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $insertar->bindParam(':apellidos', $data['apellidos'], PDO::PARAM_STR);
            $insertar->bindParam(':num_cont', $data['num_cont'], PDO::PARAM_INT);
            $insertar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $insertar->bindParam(':foto', $fotografia, PDO::PARAM_STR);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
        }
        return $cuenta;
    }
    
    public function update($id,$data){
        $sinfoto=false;
        $cuenta = null;
        if(!$sinfoto){
            $fotografia=$this->cargarimg("miembro");
        }else{
            $fotografia="imagenes/miembro/img1.jpg";
        }
        if ($fotografia){
            $sql = "update miembros set nombre=:nombre, apellidos=:apellidos, num_cont=:num_cont, foto=:foto where id_miembros=:id_miembro";
            $actualizar = $this->db->prepare($sql);
        }else{
            $sql = "update miembros set nombre=:nombre, apellidos=:apellidos, num_cont=:num_cont where id_miembros=:id_miembro";
            $actualizar = $this->db->prepare($sql);
        }
        $actualizar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $actualizar->bindParam(':apellidos', $data['apellidos'], PDO::PARAM_STR);
        $actualizar->bindParam(':num_cont', $data['num_cont'], PDO::PARAM_INT);
        $actualizar->bindParam(':id_miembro', $id, PDO::PARAM_INT);
        if ($fotografia){
            $actualizar->bindParam(':foto', $fotografia, PDO::PARAM_STR);
        }
        $actualizar->execute();
        $cuenta = $actualizar->rowCount();
        return $cuenta;
    }
    
    public function agregar_rol($id){
            $sql = "insert into usuario_rol (id_usuario, id_rol) values (:id_usuario, 3)";
            $insertar=$this->db->prepare($sql);
            $insertar->bindParam(':id_usuario',  $id, PDO::PARAM_INT);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
            return $cuenta;
    }
}

$Miembro = new Miembros;
$Miembro->conexion();
?>