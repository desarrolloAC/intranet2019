<?php

/**
 * Description of Publicaciones
 *
 * @author brayan
 */
class Publicaciones implements JsonSerializable {
    
    private $publicacionId;
    private $titulo;
    private $imagen;
    
    public function __construct() {
        
    }

    public function getPublicacionId() {
        return $this->publicacionId;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function jsonSerialize() {
        return [
            'publicacion_id' => $this->publicacionId,
            'titulo' => $this->titulo,
            'imagen' => $this->imagen
        ];
    }

}
