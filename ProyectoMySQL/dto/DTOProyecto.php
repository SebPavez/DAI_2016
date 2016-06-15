<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DTOProyecto
 *
 * @author sebpa
 */
class DTOProyecto {
    private $id_proyecto;
    private $nombre_proyecto;
    private $fecha_inicio;
    private $fecha_termino;
    
    public function __construct($id_proyecto =null, $nom_proy = 'nuevo', $fec_ini = '01/01/1990', $fec_fin = '31/12/2999'){
        $this->id_proyecto = $id_proyecto;
        $this->nombre_proyecto = $nom_proy;
        $this->fecha_inicio = $fec_ini;
        $this->fecha_termino = $fec_fin;        
    }
    public function getNombre_proyecto() {
        return $this->nombre_proyecto;
    }

    public function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    public function getFecha_termino() {
        return $this->fecha_termino;
    }

    public function setNombre_proyecto($nombre_proyecto) {
        $this->nombre_proyecto = $nombre_proyecto;
    }

    public function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFecha_termino($fecha_termino) {
        $this->fecha_termino = $fecha_termino;
    }
    
}
