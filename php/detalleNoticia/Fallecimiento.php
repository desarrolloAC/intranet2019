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
class Fallecimiento implements JsonSerializable {

    private $organization;
    private $contenido;

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
            function setOrganization($organization) {
        $this->organization = $organization;
    }

    public
            function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public
            function jsonSerialize() {
        return [
            'org' => $this->organization,
            'content' => $this->contenido
        ];
    }

}
