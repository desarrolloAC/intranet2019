<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Directorio
 *
 * @author brayan
 */
class Directorio implements JsonSerializable {

    private $foto;
    private $nombreCompleto;
    private $sexo;
    private $organizacion;
    private $departamento;
    private $cargo;
    private $telefono;
    private $correo;
    private $direccion;

    public function __construct() {
        
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getNombreCompleto() {
        return $this->nombreCompleto;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getOrganizacion() {
        return $this->organizacion;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setNombreCompleto($nombreCompleto) {
        $this->nombreCompleto = $nombreCompleto;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setOrganizacion($organizacion) {
        $this->organizacion = $organizacion;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function jsonSerialize() {
        return [
            'foto' => $this->foto,
            'nc' => $this->nombreCompleto,
            'sexo' => $this->sexo,
            'org' => $this->organizacion,
            'departamento' => $this->departamento,
            'cargo' => $this->cargo,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'direccion' => $this->direccion
        ];
    }

}
