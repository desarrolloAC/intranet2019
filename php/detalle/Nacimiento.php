<?php

namespace detalle;

class Nacimiento implements \JsonSerializable {
    
    private $publicacionId;
    private $organization;
    private $titulo;
    private $colaborador;
    private $contenido;
    private $foto;

    public function __construct() {
        
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

    public function getColaborador() {
        return $this->colaborador;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getFoto() {
        return $this->foto;
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

    public function setColaborador($colaborador) {
        $this->colaborador = $colaborador;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'org' => $this->organization,
            'title' => $this->titulo,
            'colaborated' => $this->colaborador,
            'content' => $this->contenido,
            'image' => $this->foto
        ];
    }

}
