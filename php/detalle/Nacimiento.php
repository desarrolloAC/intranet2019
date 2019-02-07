<?php

namespace detalle;

class Nacimiento implements \JsonSerializable {

    private $organization;
    private $colaborador;
    private $contenido;
    private $foto;

    public function __construct() {
        
    }

    public function getOrganization() {
        return $this->organization;
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

    public function setOrganization($organization) {
        $this->organization = $organization;
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
            'org' => $this->organization,
            'colabo' => $this->colaborador,
            'content' => $this->contenido,
            'fot' => $this->foto
        ];
    }

}
