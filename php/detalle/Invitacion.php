<?php

 namespace detalle;
 
class Invitacion implements \JsonSerializable {

    private $publicacionId;
    private $organization;
    private $foto;
    private $titulo;
    private $contenido;
    private $contenido1;

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

    public function getOrganization() {
        return $this->organization;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getContenido1() {
        return $this->contenido1;
    }

    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setContenido1($contenido1) {
        $this->contenido1 = $contenido1;
    }

    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'org' => $this->organization,
            'title' => $this->titulo,
            'photo' => $this->foto,
            'content' => $this->contenido,
            'content1' => $this->contenido1
        ];
    }

}
