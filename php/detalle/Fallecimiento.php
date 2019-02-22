<?php

namespace detalle;


class Fallecimiento implements \JsonSerializable {

    private $publicacionId;
    private $foto;
    private $contenido;

    public function __construct() {
        
    }
    
    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getPublicacionId() {
        return $this->publicacionId;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'photo' => $this->foto,
            'content' => $this->contenido
        ];
    }

}
