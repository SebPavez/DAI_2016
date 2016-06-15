<?php

/**
 * Description of ConexionMySQL
 *
 * @author sebpa
 */
class ConexionMySQL {
    private $conexion;
    
    public function __construct($conexion=null) {
        $this->conexion = $conexion;
    }
    
    public function getConexion() {
        return $this->conexion;
    }
        
    public function conectar(){
        try {
            $this->conexion = new MySQLi('localhost', 'root', '', 'bd_arduino');            
        } catch (Exception $ex) {
            echo "Error en la conexión a BD".$ex->getMessage();
        }
    }
        
    public function desconectar(){
        try {
            if(empty(!$this->conexion)){
                $this->conexion->close();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
            
}
