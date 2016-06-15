<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author sebpa
 */
interface DAOProyecto {
    function agregarProyecto(DTOProyecto $nuevoProyecto);
    function eliminarProyecto(int $id_proyecto);
    function listarProyectos();
    function modificarProyecto(DTOProyecto $proyectoModificado);
}
