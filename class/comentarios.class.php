<?php
require_once('meits.class.php');

class Comentarios extends Meits{
    public function read($id_publicacion){
        $todo = $this->db->prepare("SELECT * from comentarios where id_publicacion=:id_publicacion");
        $todo->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
        $todo->execute();
        $publicaciones = $todo->fetchAll(PDO::FETCH_ASSOC);
        return $publicaciones;
    }
    public function readdesc(){
        $todo = $this->db->prepare("SELECT * from publicaciones order by id_publicacion desc");
        $todo->execute();
        $publicaciones = $todo->fetchAll(PDO::FETCH_ASSOC);
        return $publicaciones;
    }
    
    public function deleteCom($id_publicacion, $id_usuario){
        $borrar = $this->db->prepare("DELETE from comentarios where EXISTS(SELECT * from comentarios INNER JOIN publicaciones USING (id_publicacion) where comentarios.id_publicacion=:id_publicacion and publicaciones.id_usuario=:id_usuario) and comentarios.id_publicacion=:id_publicacion");
        $borrar->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
        $borrar->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }
    
    public function deleteOneCom($id_publicacion, $id_usuario, $id_comentario){
        $borrar = $this->db->prepare("DELETE from comentarios where id_usuario=:id_usuario and id_publicacion=:id_publicacion and id_comentario=:id_comentario");
        $borrar->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $borrar->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
        $borrar->bindParam(':id_comentario', $id_comentario, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }
    
    public function create($data, $id){
        $cuenta = null;
        $sql="insert into comentarios (comentario, autor, id_publicacion, id_usuario) values (:comentario, :autor, :id_publicacion, :id_usuario)";
        $insertar=$this->db->prepare($sql);
        $insertar->bindParam(':comentario', $data['comentario'], PDO::PARAM_STR);
        $autor = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
        $insertar->bindParam(':autor', $autor, PDO::PARAM_STR);
        $insertar->bindParam(':id_usuario', $_SESSION['id_usr'], PDO::PARAM_INT);
        $insertar->bindParam(':id_publicacion', $id, PDO::PARAM_INT);
        $insertar->execute();
        $cuenta = $insertar->rowCount();
        return $cuenta;
    }
    
    public function update($id,$data){
        $sql = "update comentarios set comentario=:comentario where id_publicacion=:id_publicacion";
        $actualizar = $this->db->prepare($sql);
        $insertar->bindParam(':comentario', $data['comentario'], PDO::PARAM_STR);
        $insertar->bindParam(':id_publicacion', $id, PDO::PARAM_INT);
        $actualizar->execute();
        $cuenta = $actualizar->rowCount();
        return $cuenta;
        
    }
}

$Comentario = new Comentarios;
$Comentario->conexion();
?>