<?php
require_once('meits.class.php');

class Publicaciones extends Meits{
    public function read(){
        $todo = $this->db->prepare("SELECT * from publicaciones");
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
    
    public function readLast(){
        $todo = $this->db->prepare("SELECT * FROM publicaciones ORDER by id_publicacion DESC LIMIT 1;");
        $todo->execute();
        $publicaciones = $todo->fetchAll(PDO::FETCH_ASSOC);
        return $publicaciones;
    }
    
    public function readOne($id){
        $linea = $this->db->prepare("SELECT * from publicaciones where id_publicacion=:id_publicacion");
        $linea->bindParam(':id_publicacion', $id, PDO::PARAM_INT);
        $linea->execute();
        $publicaciones = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $publicaciones;
    }
    
    public function delete($id,$idusuario){
        $borrar = $this->db->prepare("delete from publicaciones where id_publicacion=:id_publicacion and id_usuario=:id_usuario");
        $borrar->bindParam(':id_publicacion', $id, PDO::PARAM_INT);
        $borrar->bindParam(':id_usuario', $idusuario, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }
    
    public function create($data, $sinfoto=false, $id){
        $cuenta = null;
        if(!$sinfoto){
            $fotografia=$this->cargarimg("publicacion");    
        }else{
            $fotografia="imagenes/publicacion/img1.jpg";
        }
        if ($fotografia){
            $sql="insert into publicaciones (titulo, descripcion, foto, id_usuario, autor) values (:titulo, :descripcion, :foto, :id_usuario, :autor)";
            $insertar=$this->db->prepare($sql);
            $insertar->bindParam(':titulo', $data['titulo'], PDO::PARAM_STR);
            $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
            $insertar->bindParam(':foto', $fotografia, PDO::PARAM_STR);
            $insertar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $autor = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
            $insertar->bindParam(':autor', $autor, PDO::PARAM_STR);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
        }
        return $cuenta;
    }
    
    public function update($id,$data,$sinfoto=false){
        if(!$sinfoto){
            $fotografia = $this->cargarimg("publicacion");
        }else{
            $fotografia = "images/publicacion/img1.jpg";
        }
        if ($fotografia){
            $sql = "update publicaciones set titulo=:titulo, descripcion=:descripcion, foto=:foto where id_publicacion=:id_publicacion";
            $actualizar = $this->db->prepare($sql);
        }else{
            $sql = "update publicaciones set titulo=:titulo, descripcion=:descripcion, where id_publicacion=:id_publicacion";
            $actualizar = $this->db->prepare($sql);
        }
        $insertar->bindParam(':titulo', $data['titulo'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        if  ($fotografia){
            $actualizar->bindParam(':foto', $fotografia, PDO::PARAM_STR);
        }
        $actualizar->execute();
        $cuenta = $actualizar->rowCount();
        return $cuenta;
        
    }
}

$Publicacion = new Publicaciones;
$Publicacion->conexion();
?>