<?php

//require ('ConexionMySQL.php');

class DAOAutorImplementadoMySQL implements DAOAutor{
    
    public function actualizarAutor(\DTOAutor $autorActualizado) {
               
        $conexion = new ConexionMySQL();
        $conexion->conectar();            
        try {                  
            
            $n_nombre = $conexion->real_escape_string(trim($autorActualizado->getNombre()));
            $n_correo = $conexion->real_escape_string(trim($autorActualizado->getCorreo()));
            $n_pass = $conexion->real_escape_string(trim($autorActualizado->getPass()));       
            $n_id_autor = $conexion->real_escape_string(trim($autorActualizado->getId_autor()));
            
            $query = "UPDATE autor SET "
                . "nombre = '$n_nombre', "
                . "correo = '$n_correo', "
                . "password = '$n_pass' "
                . "WHERE id_autor = '$n_id_autor'";
            
            $resultado = $conexion->getConexion()->query($query);          
                       
        } catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }                
    }

    public function buscarAutor(int $id_autor) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();
        
        try{
            $n_id_autor = $conexion->real_escape_string(trim($id_autor));
            
            $query= "SELECT * FROM autor where id_autor = '$n_id_autor'";
            
            $resultado = $conexion->getConexion()->query($query);            
        }catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }
    }

    public function eliminarAutor(int $id_autor) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();
        
        try{
            $n_id_autor = $conexion->real_escape_string(trim($id_autor));
            
            $query= "DELETE FROM autor WHERE id_autor = '$n_id_autor'";
            
            $resultado = $conexion->getConexion()->query($query);            
        }catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }
    }

    public function ingresarNuevoAutor(\DTOAutor $nuevoAutor) {
        $conexion = new ConexionMySQL();
        $conexion->conectar();
        
        try{
            $n_nombre = $conexion->real_escape_string(trim($nuevoAutor->getNombre()));
            $n_correo = $conexion->real_escape_string(trim($nuevoAutor->getCorreo()));
            $n_pass =   $conexion->real_escape_string(trim($nuevoAutor->getPass()));                   
            
            $query= "INSERT INTO autor(nombre, correo, pass) VALUES ('$n_nombre','$n_correo', '$n_pass')";
            
            $resultado = $conexion->getConexion()->query($query);            
        }catch (Exception $exc) {            
            echo $exc->getTraceAsString();
            $resultado = false;
        } finally {
            $conexion->desconectar();
            return $resultado;
        }
    }

//put your code here
}
