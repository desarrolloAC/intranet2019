<?php

namespace detalle;

class CumpleMes implements \JsonSerializable {

    private $publicacionId;
    private $organization;
    private $titulo;
    private $Foto;
    private $colaborador;
    private $contenido;
    private $date;
    private $image;
    private $departamento;
    private $logo;
    private $nombreDepartamento;

    public function __construct() {
        
    }

    public function getPublicacionId() {
        return $this->publicacionId;
    }

    public function getNombreDepartamento() {
        return $this->nombreDepartamento;
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

    public function getColaborador() {
        return $this->colaborador;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getDate() {
        return $this->date;
    }

    public function getFoto() {
        return $this->Foto;
    }
    public function getImage() {
        return $this->image;
    }
    public function setLogo($logo) {
        $this->logo = $logo;
    }
    public function setNombreDepartamento($nombreDepartamento) {
        $this->nombreDepartamento = $nombreDepartamento;
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

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setDate($date) {
        $this->date = $date;
    }
    public function setImage($image) {
        $this->image = $image;
    }

    public function setFoto($Foto) {
        $this->Foto = $Foto;
    }

    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'org' => $this->organization,
            'title' => $this->titulo,
            'photo' => $this->Foto,
            'logo' => $this->logo,
            'image' => $this->image,
            'colaborated' => $this->colaborador,
            'date' => $this->date,
            'namedepartment' => $this->nombreDepartamento
        ];
    }

}
