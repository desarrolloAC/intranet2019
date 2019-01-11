<?php

/*
 * Copyright (C) 2018 brayan
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Domain;

/**
 * Description of User
 *
 * @author brayan
 */
class User implements \JsonSerializable {
    
    private $pNombre;
    private $sNombre;
    private $pApellido;
    private $sApellido;
    private $correo;
    
    public function __construct() {
        
    }

    public function getPNombre() {
        return $this->pNombre;
    }

    public function getSNombre() {
        return $this->sNombre;
    }

    public function getPApellido() {
        return $this->pApellido;
    }

    public function getSApellido() {
        return $this->sApellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setPNombre($pNombre) {
        $this->pNombre = $pNombre;
    }

    public function setSNombre($sNombre) {
        $this->sNombre = $sNombre;
    }

    public function setPApellido($pApellido) {
        $this->pApellido = $pApellido;
    }

    public function setSApellido($sApellido) {
        $this->sApellido = $sApellido;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    
    public function jsonSerialize() {
        
        return [
            'pNombre' => $this->pNombre,
            'sNombre' => $this->sNombre,
            'pApellido' => $this->pApellido,
            'sApellido' => $this->sApellido,
            'correo' => $this->correo,
        ];
        
    }

}
