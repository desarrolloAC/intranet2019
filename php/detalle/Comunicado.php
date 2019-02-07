<?php

namespace detalle;

class Comunicado implements \JsonSerializable {

    private $organization;
    private $contenido;

    public function __construct() {
        
    }

    public function getOrganization() {
        return $this->organization;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function jsonSerialize() {
        return [
            'org' => $this->organization,
            'content' => $this->contenido
        ];
    }

}
