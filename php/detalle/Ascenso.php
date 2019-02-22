<?php

namespace detalle;


class Ascenso implements \JsonSerializable {

    private $organization;
    private $colaborador;
    private $departamento;
    private $cargo;
    private $foto;
    private $contenido;

    public function __construct() {
        
    }

    public function getOrganization() {
        return $this->organization;
    }

    public function getColaborador() {
        return $this->colaborador;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function setColaborador($colaborador) {
        $this->colaborador = $colaborador;
    }

    public function setDepartamento($departamento) {
        $this->contenido = $departamento;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function jsonSerialize() {
        return [
            'org' => $this->organization,
            'colaborad' => $this->colaborador,
            'dpto' => $this->departamento,
            'carg' => $this->cargo,
            'fot' => $this->foto,
            'cont' => $this->contenido
        ];
    }

}
