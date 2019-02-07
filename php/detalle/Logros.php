<?php

namespace detalle;


class Logros implements \JsonSerializable {

    private $publicacionId;
    private $organization;
    private $titulo;
    private $tipo_logro;
    private $contenido;
    private $colaborador;
    private $departamento;
    private $cargo;
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

    public function getTipo_logro() {
        return $this->tipo_logro;
    }

    public function getContenido() {
        return $this->contenido;
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

    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setTipo_logro($tipo_logro) {
        $this->tipo_logro = $tipo_logro;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setColaborador($colaborador) {
        $this->colaborador = $colaborador;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
    
    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'org' => $this->organization,
            'title' => $this->titulo,
            'tipo' => $this->tipo_logro,
            'dpto' => $this->contenido,
            'carg' => $this->colaborador,
            'fot' => $this->departamento,
            'cont' => $this->foto
        ];
    }

}
