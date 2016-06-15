<?php #DTOPost.php 

/**
 * Description of DTOPost
 *
 * @author sebpa
 */
class DTOPost {
    private $id_post;
    private $titulo;
    private $texto_post;
    private $fecha_post;
    private $tags;
    
    function __construct($id_post=null, $titulo=null, $texto_post=null, $fecha_post=null, $tags=null) {
        $this->id_post = $id_post;
        $this->titulo = $titulo;
        $this->texto_post = $texto_post;
        $this->fecha_post = $fecha_post;
        $this->tags = $tags;             
    }
    
    public function getId_post() {
        return $this->id_post;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getTexto_post() {
        return $this->texto_post;
    }

    public function getFecha_post() {
        return $this->fecha_post;
    }

    public function getTags() {
        return $this->tags;
    }

    public function setId_post($id_post) {
        $this->id_post = $id_post;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setTexto_post($texto_post) {
        $this->texto_post = $texto_post;
    }

    public function setFecha_post($fecha_post) {
        //Split para recuperación de datos desde MySQL
        //$splitDate = explode("-", $inDatePosted);
        //$this->fecha_post = $splitDate[1] . "/" . $splitDate[2] . "/" . $splitDate[0];

        $this->fecha_post = $fecha_post;
    }

    public function setTags($tags) {        
        $this->tags = $tags;
    }    
}
