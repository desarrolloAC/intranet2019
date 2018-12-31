<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notificaciones
 *
 * @author brayan
 */
class Notificaciones implements JsonSerializable {

    private $publicacionId;
    private $estadoPublicacion;
    private $mensaje;

    public function __construct() {
        
    }

    public function getPublicacionId() {
        return $this->publicacionId;
    }

    public function getEstadoPublicacion() {
        return $this->estadoPublicacion;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function setEstadoPublicacion($estadoPublicacion) {
        $this->estadoPublicacion = $estadoPublicacion;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    public function jsonSerialize() {
        return [
            'publicacion_id' => $this->publicacionId,
            'estatado_publicacion' => $this->estadoPublicacion,
            'mensaje' => $this->mensaje
        ];
    }

}
