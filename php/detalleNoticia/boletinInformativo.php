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
    private $contenido;
    private $imagen1;
    private $imagen2;
    private $imagen3;
    private $imagen4;

    public function __construct() {

    }

    public
            function getOrganization() {
        return $this->organization;
    }

    public
            function getContenido() {
        return $this->contenido;
    }

    public
            function getImagen1() {
        return $this->imagen1;
    }

    public
            function getImagen2() {
        return $this->imagen2;
    }

    public
            function getImagen3() {
        return $this->imagen3;
    }

    public
            function getImagen4() {
        return $this->imagen4;
    }

    public
            function setOrganization($organization) {
        $this->organization = $organization;
    }

    public
            function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public
            function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public
            function setImagen1($imagen1) {
        $this->imagen1 = $imagen1;
    }

    public
            function setImagen2($imagen2) {
        $this->imagen2 = $imagen2;
    }

    public
            function setImagen3($imagen3) {
        $this->imagen3 = $imagen3;
    }

    public
            function setImagen4($imagen4) {
        $this->imagen4 = $imagen4;
    }

    public
            function jsonSerialize() {
        return [
            'org' => $this->organization,
            'content' => $this->contenido,
            'image1' => $this->imagen1,
            'image2' => $this->imagen2,
            'image3' => $this->imagen3,
            'image4' => $this->imagen4
        ];
    }

}
