<?php #DAOAutor.php

/**
 *
 * @author sebpa
 */
interface DAOAutor {
    function buscarAutor(int $id_autor);
    function ingresarNuevoAutor(DTOAutor $nuevoAutor);
    function eliminarAutor(int $id_autor);
    function actualizarAutor(DTOAutor $autorActualizado);
}
