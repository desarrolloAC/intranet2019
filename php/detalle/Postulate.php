<?php

namespace detalle;


class Postulate implements \JsonSerializable {

    private $publicacionId;
    private $organization;
    private $titulo;
    private $requisito;
    private $posiciones;
    private $responsabilidades;
    private $correo;
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

    public function getRequisito() {
        return $this->requisito;
    }

    public function getPosiciones() {
        return $this->posiciones;
    }

    public function getResponsabilidades() {
        return $this->responsabilidades;
    }

    public function getCorreo() {
        return $this->correo;
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

    public function setRequisito($requisito) {
        $this->requisito = $requisito;
    }

    public function setPosiciones($posiciones) {
        $this->posiciones = $posiciones;
    }

    public function setResponsabilidades($responsabilidades) {
        $this->responsabilidades = $responsabilidades;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function jsonSerialize() {
        return [
            'n' => $this->publicacionId,
            'org' => $this->organization,
            'title' => $this->titulo,
            'requirement' => $this->requisito,
            'positions' => $this->posiciones,
            'chargue' => $this->responsabilidades,
            'image' => $this->correo,
            'content' => $this->contenido
        ];
    }

}
