<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioActual
 *
 * @author brayan
 */
class UsuarioActual implements JsonSerializable {

    private $correo;
    private $cargo;
    private $org;

    public function __construct() {
        
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getOrg() {
        return $this->org;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setOrg($org) {
        $this->org = $org;
    }

    public function jsonSerialize() {
        return [
            'correo' => $this->correo,
            'cargo' => $this->cargo,
            'org' => $this->org
        ];
    }

}
