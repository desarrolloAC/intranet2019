<?php

namespace detalle;


class Logros implements \JsonSerializable {

    private $organization;
    private $tipo_logro;
    private $contenido;
    private $colaborador;
    private $departamento;
    private $cargo;
    private $foto;

    public function __construct() {
        
    }

    public function getOrganization() {
        return $this->organization;
    }

    public function getTipo_logro() {
        return $this->tipo_logro;
    }

    public function getContenido() {
        return $this->contenido;
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

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function setTipo_logro($tipo_logro) {
        $this->tipo_logro = $tipo_logro;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setCargo($colaborador) {
        $this->rcolaborador = $colaborador;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function jsonSerialize() {
        return [
            'org' => $this->organization,
            'tipo' => $this->tipo_logro,
            'dpto' => $this->contenido,
            'carg' => $this->colaborador,
            'fot' => $this->departamento,
            'cont' => $this->foto
        ];
    }

}
