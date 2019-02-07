<?php

namespace detalle;

class BoletinInformativo implements \JsonSerializable {

    private $publicacionId;
    private $organization;
    private $titulo;
    private $contenido;
    private $imagen1;
    private $imagen2;
    private $imagen3;
    private $imagen4;

    public function __construct() {
        
    }

    public function getOrganization() {
        return $this->organization;
    }

    public function getPublicacionId() {
        return $this->publicacionId;
    }

    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getImagen1() {
        return $this->imagen1;
    }

    public function getImagen2() {
        return $this->imagen2;
    }

    public function getImagen3() {
        return $this->imagen3;
    }

    public function getImagen4() {
        return $this->imagen4;
    }

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setImagen1($imagen1) {
        $this->imagen1 = $imagen1;
    }

    public function setImagen2($imagen2) {
        $this->imagen2 = $imagen2;
    }

    public function setImagen3($imagen3) {
        $this->imagen3 = $imagen3;
    }

    public function setImagen4($imagen4) {
        $this->imagen4 = $imagen4;
    }

    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'org' => $this->organization,
            'titulo' => $this->titulo,
            'content' => $this->contenido,
            'image1' => $this->imagen1,
            'image2' => $this->imagen2,
            'image3' => $this->imagen3,
            'image4' => $this->imagen4
        ];
    }

}
