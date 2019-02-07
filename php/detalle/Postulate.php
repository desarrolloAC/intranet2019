<?php

namespace detalle;


class Postulate implements \JsonSerializable {

    private $organization;
    private $requisito;
    private $posiciones;
    private $responsabilidades;
    private $correo;
    private $contenido;

    public function __construct() {
        
    }

    public function getOrganization() {
        return $this->organization;
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

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function setRequisito($requisito) {
        $this->requisito = $requisito;
    }

    public function setDepartamento($posiciones) {
        $this->posiciones = $posiciones;
    }

    public function setCargo($responsabilidades) {
        $this->responsabilidades = $responsabilidades;
    }

    public function setFoto($correo) {
        $this->correo = $correo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function jsonSerialize() {
        return [
            'org' => $this->organization,
            'colaborad' => $this->requisito,
            'dpto' => $this->posiciones,
            'carg' => $this->responsabilidades,
            'fot' => $this->correo,
            'cont' => $this->contenido
        ];
    }

}
