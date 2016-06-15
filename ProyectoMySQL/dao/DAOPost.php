<?php #DAOPost.php

/**
 *
 * @author sebpa
 */
interface DAOPost {
    function crearPost(DTOPost $nuevoPost);
    function buscarPost(int $idPost);
    function actualizarPost(DTOPost $postActualizado);
    function eliminarPost(int $idPost);
    function buscarTagsAsociados(int $idPost);  
    function buscarPostAutor(int $idAutor);
    function listarUltimosCincoPost();
    
}
