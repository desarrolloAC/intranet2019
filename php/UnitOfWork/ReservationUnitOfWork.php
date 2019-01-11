<?php

/*
 * Copyright (C) 2018 braya
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

namespace UnitOfWork;

use Util\IConnection;
use Util\IUnitOfWork;
use Repository\ReservationRepository;
use Repository\AvailabilityRepository;
use Repository\UserRepository;
use Domain\Availability;
use Domain\Reservation;
use Domain\User;




/**
 * Description of Reservation
 *
 * @author braya
 */
class ReservationUnitOfWork implements IUnitOfWork {
    
    /**
     * Conexion con la base de datos mysql:
     * 
     * @var IConnection 
     */
    private $contex;
    
    /**
     * Repositorio para la reserva.
     * 
     * @var ReservationRepository 
     */
    private $reservation;
    
    /**
     * Repositorio para la reserva.
     * 
     * @var UserRepository 
     */
    private $user;
    
    /**
     * Repositorio para la disponivilidad.
     * 
     * @var AvailabilityRepository 
     */
    private $availability;
    
    function __construct(&$contex) {
        $this->contex = $contex;
        $this->reservation = new ReservationRepository($contex);
        $this->availability = new AvailabilityRepository($contex);
        $this->user = new UserRepository($contex);

    }
    
    /**
     * Crea una disponivilidar.
     * 
     * @param Availability $entity
     */
    public function createAvailability($entity) {
        $this->availability->add($entity);
    }
    
    /**
     * Verifica si existe una disponivilidad.
     * 
     * @param Availability $entity
     * @return bool
     */
    public function existAvailability($entity) {
        return $this->availability->getIDbyEntity($entity) != 0;
    }

    /**
     * Consultar la disponivilidad.
     * 
     * @param Availability $entity
     * @return Availability
     */
    public function getAvailability($entity) {
        return $this->availability->getByEntity($entity);
    }
    
   
    /**
     * Consultar las reservaciones dada el id 
     * de una disponivilidad.
     * 
     * @param int $id
     */
    public function getReservations($id) {
        return $this->reservation->getByID($id);
    }
    
    
    /**
     * Consultar la reservacion.
     * 
     * @param Reservation $entity
     */
    public function updateReservation($entity) {
        $this->reservation->update($entity);
    }
    
    
    /**
     * Consultar las reservaciones dada el id 
     * de una disponivilidad.
     * 
     * @param string $correo
     */
    public function getUsers($correo) {
        return $this->user->getUserByCorreo($correo);
    }

    /**
     * Empiesa un Begin Trasaction
     */
    public function beginTransaction() {
        $this->contex->getConnection()->begin_transaction();
    }
    
    /**
     * Realiza un commint de la transaccion.
     */
    public function commint() {
        $this->contex->getConnection()->commit();
    }
        
    /**
     * Realiza un rollback de la transaccion.
     */
    public function rollback() {
        $this->contex->getConnection()->rollback();
    }
    /**
     * Establese si un se va a realizar autocommint
     * @param bool Recibe un true para activar el autocommint
     */
    public function setAutoCommit($autoComming) {
        $this->contex->getConnection()->autocommit($autoComming);
    }
    
    /**
     * Saber si esta conectado.
     */
    public function isConnect() {
        $this->contex->isConnected();
    }
}
