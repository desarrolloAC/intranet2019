<?php

 namespace detalle;
 
class Invitacion implements JsonSerializable {

    private $organization;
    private $contenido;
    private $contenido1;

    public function __construct() {
        
    }

    public function getOrganization() {
        return $this->organization;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getContenido1() {
        return $this->contenido1;
    }

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setContenido1($contenido1) {
        $this->contenido1 = $contenido1;
    }

    public function jsonSerialize() {
        return [
            'org' => $this->organization,
            'content' => $this->contenido,
            'content1' => $this->contenido1
        ];
    }

}
