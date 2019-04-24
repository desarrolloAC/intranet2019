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
    private $image;
    private $logo;
    private $nombreDepartamento;
    private $nombreCargo;
    public function __construct() {
        
    }

    public function getPublicacionId() {
        return $this->publicacionId;
    }

    public function getNombreDepartamento() {
        return $this->nombreDepartamento;
    }

    public function getNombreCargo() {
        return $this->nombreCargo;
    }
    public function getLogo() {
        return $this->logo;
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
    public function getImage() {
        return $this->image;
    }
    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }
    public function setLogo($logo) {
        $this->logo = $logo;
    }
    public function setNombreDepartamento($nombreDepartamento) {
        $this->nombreDepartamento = $nombreDepartamento;
    }
    public function setNombreCargo($nombreCargo) {
        $this->nombreCargo = $nombreCargo;
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
    
    public function setImage($image) {
        $this->image = $image;
    }

        
    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'org' => $this->organization,
            'title' => $this->titulo,
            'tipo' => $this->tipo_logro,
            'content' => $this->contenido,
            'colaborated' => $this->colaborador,
            'dpto' => $this->departamento,
            'photo' => $this->foto,
            'image' => $this->image,
            'logo' => $this->logo,
            'NameDeparat' => $this->nombreDepartamento,
            'NameCharge' => $this->nombreCargo
        ];
    }

}
