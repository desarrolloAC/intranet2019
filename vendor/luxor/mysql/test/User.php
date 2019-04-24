<?php

namespace Luxor\Test;

/**
 * Clase de prueva para determinar un usuario usando
 * el patron Data Transfer Object.
 */
class User {
    
    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    
    function __construct($id, $nombre, $apellido, $cedula) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCedula() {
        return $this->cedula;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

}
