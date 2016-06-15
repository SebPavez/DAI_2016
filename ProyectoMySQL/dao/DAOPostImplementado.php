<?php

class DAOPostImplementado implements DAOPost {
     public function actualizarPost(\DTOPost $postActualizado) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();            
        try {                  
            
            $n_titulo = $conexion->real_escape_string(trim($postActualizado->getTitulo()));
            $n_texto = $conexion->real_escape_string(trim($postActualizado->getTexto_post()));            
            $n_id_post = $conexion->real_escape_string(trim($postActualizado->getId_post()));
            
            $query = "UPDATE post SET "
                . "titulo = '$n_titulo', "
                . "texto_post = '$n_texto', "                
                . "WHERE id_post = '$n_id_post'";
            
            $resultado = $conexion->getConexion()->query($query);          
                       
        } catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }                
    }

    public function buscarPost(int $idPost) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();            
        try {                              
            $n_id_post = $conexion->real_escape_string(trim($postActualizado->getId_post()));
            
            $query = "SELECT * FROM post WHERE id_post = '$n_id_post'";
            
            $resultado = $conexion->getConexion()->query($query);          
                       
        } catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }                
    }
    //TODO desde acá hasta abajo, modificar código para implementar como corresponde
    public function buscarPostAutor(int $idAutor) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();            
        try {                              
            $n_id_post = $conexion->real_escape_string(trim($postActualizado->getId_post()));
            
            $query = "SELECT * FROM post WHERE id_post = '$n_id_post'";
            
            $resultado = $conexion->getConexion()->query($query);          
                       
        } catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }                
    }

    public function buscarTagsAsociados(int $idPost) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();            
        try {                              
            $n_id_post = $conexion->real_escape_string(trim($postActualizado->getId_post()));
            
            $query = "SELECT * FROM post WHERE id_post = '$n_id_post'";
            
            $resultado = $conexion->getConexion()->query($query);          
                       
        } catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }                
    }

    public function crearPost(\DTOPost $nuevoPost) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();            
        try {                              
            $n_id_post = $conexion->real_escape_string(trim($postActualizado->getId_post()));
            
            $query = "SELECT * FROM post WHERE id_post = '$n_id_post'";
            
            $resultado = $conexion->getConexion()->query($query);          
                       
        } catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }                
    }

    public function eliminarPost(int $idPost) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();            
        try {                              
            $n_id_post = $conexion->real_escape_string(trim($postActualizado->getId_post()));
            
            $query = "SELECT * FROM post WHERE id_post = '$n_id_post'";
            
            $resultado = $conexion->getConexion()->query($query);          
                       
        } catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }                
    }

    public function listarUltimosCincoPost() {
        $conexion = new ConexionMySQL();
        $conexion->conectar();            
        try {                              
            $n_id_post = $conexion->real_escape_string(trim($postActualizado->getId_post()));
            
            $query = "SELECT * FROM post WHERE id_post = '$n_id_post'";
            
            $resultado = $conexion->getConexion()->query($query);          
                       
        } catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }                
    }

}