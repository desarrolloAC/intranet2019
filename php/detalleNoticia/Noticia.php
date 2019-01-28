<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Noticia
 *
 * @author brayan
 */
class Noticia implements JsonSerializable {

    private $organization;
    private $titulo;
    private $contenido;
    private $imagen;

    public function __construct() {

    }

    public function getOrganization() {
        return $this->organization;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function jsonSerialize() {
        return [
            'org' => $this->organization,
            'title' => $this->titulo,
            'content' => $this->contenido,
            'image' => $this->imagen
        ];
    }

}
