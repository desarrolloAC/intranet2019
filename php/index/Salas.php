<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Salas
 *
 * @author brayan
 */
class Salas implements JsonSerializable {

    private $dia;
    private $mes;
    private $a;
    private $salas;
    private $horaInicio;
    private $horaFinal;
    private $usuario;
    private $reservado;
    
    function __construct() {
        
    }

    public function getDia() {
        return $this->dia;
    }

    public function getMes() {
        return $this->mes;
    }

    public function getA() {
        return $this->a;
    }

    public function getSalas() {
        return $this->salas;
    }

    public function getHoraInicio() {
        return $this->horaInicio;
    }

    public function getHoraFinal() {
        return $this->horaFinal;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getReservado() {
        return $this->reservado;
    }

    public function setDia($dia) {
        $this->dia = $dia;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }

    public function setA($a) {
        $this->a = $a;
    }

    public function setSalas($salas) {
        $this->salas = $salas;
    }

    public function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }

    public function setHoraFinal($horaFinal) {
        $this->horaFinal = $horaFinal;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setReservado($reservado) {
        $this->reservado = $reservado;
    }

    public function jsonSerialize() {
        return [
            'dia' => $this->dia,
            'mes' => $this->mes,
            'ano' => $this->a,
            'salas' => $this->salas,
            'hora_inicio' => $this->horaInicio,
            'hora_final' => $this->horaFinal,
            'usuario' => $this->usuario,
            'reservado' => $this->reservado
        ];
    }

}
