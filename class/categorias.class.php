<?php
require_once('meits.class.php');
class Categorias extends Meits
{
    public function read()
    {
        $linea = $this->db->prepare("SELECT * from categoria");
        $linea->execute();
        $categorias = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $categorias;
    }
    public function read_One($id)
    {
        $linea = $this->db->prepare("SELECT * from categoria where id_categoria=:id_categoria");
        $linea->bindParam(':id_categoria', $id, PDO::PARAM_INT);
        $linea->execute();
        $categorias = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $categorias;
    }
    public function delete($id)
    {
        $borrar = $this->db->prepare("DELETE from categoria where id_categoria=:id_categoria");
        $borrar->bindParam(':id_categoria', $id, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }

    public function create($data, $publicacion){
        $cuenta = null;
        $sql="insert into categoria (categoria) values (:categoria)";
        $insertar=$this->db->prepare($sql);
        $insertar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $insertar->execute();
        $cuenta = $insertar->rowCount();
        if ($cuenta){
            $cuenta = $this->crPC($data['id_categoria'],$publicacion[0]['id_publicacion']);
        }
        return $cuenta;
    }
    
    public function update($id,$data){
        $sql = "update categoria set categoria=:categoria where id_categoria=:id_categoria";
        $actualizar = $this->db->prepare($sql);
        $actualizar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $actualizar->bindParam(':id_categoria', $id, PDO::PARAM_INT);
        $actualizar->execute(); 
        $cuenta = $actualizar->rowCount();
        return $cuenta;
    }
    
    public function crPC($id_categoria, $id_publicacion){
        $sql = "insert into categoria_publicacion (id_categoria,id_publicacion) values (:id_categoria,:id_publicacion)";
        $insertar=$this->db->prepare($sql);
        $insertar->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        $insertar->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
        $insertar->execute();
        $cuenta = $insertar->rowCount();
        return $cuenta;
    }
    
    public function delPC($id_publicacion){
        $sql = "delete from categoria_publicacion where id_publicacion=:id_publicacion";
        $insertar=$this->db->prepare($sql);
        $insertar->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
        $insertar->execute();
        $cuenta = $insertar->rowCount();
        return $cuenta;
    }
}

$Categoria = new Categorias;
$Categoria->conexion();
?>