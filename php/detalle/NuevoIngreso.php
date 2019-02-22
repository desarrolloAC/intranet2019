<?php

namespace detalle;

class NuevoIngreso implements \JsonSerializable {

    private $publicacionId;
    private $organization;
    private $titulo;
    private $colaborador;
    private $departamento;
    private $cargo;
    private $foto;
    private $image;
    private $contenido;

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

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
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
    
    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    
    
    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'org' => $this->organization,
            'title' => $this->titulo,
            'colaborated' => $this->colaborador,
            'dpto' => $this->departamento,
            'chargue' => $this->cargo,
            'photo' => $this->foto,
            'image' => $this->image,
            'content' => $this->contenido
        ];
    }

}
