<?php #DTOAutor.php


class DTOAutor{
    private $id_autor;
    private $nombre;
    private $correo;
    private $pass;
    
    function __construct($id_autor=null, $nombre=null, $correo=null, $pass=null) {
        $this->id_autor = $id_autor;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->pass = $pass;
    }
    
    function getId_autor() {
        return $this->id_autor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getPass() {
        return $this->pass;
    }

    function setId_autor($id_autor) {       
        $this->id_autor = $id_autor;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }
    
    
        
}
