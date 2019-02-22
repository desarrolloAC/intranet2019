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

namespace CommandHandler;

use Util\ICommandHandler;
use Util\Connection;
use UnitOfWork\ReservationUnitOfWork;
use Domain\Availability;

/**
 * Description of AddReservationCommandHandler
 *
 * @author braya
 */
class AddAvailabilityCommandHandler implements ICommandHandler {

    /**
     * Unidad de trabajo para reservas.
     * 
     * @var ReservationUnitOfWork 
     */
    private $service;
    
    /**
     * Constructor de esta clase.
     */
    function __construct() {
        $this->service = new ReservationUnitOfWork(Connection::getInstance());
    }

    /**
     * Ejecutar la accion.
     * 
     * @param Availability $action
     */
    public function handler($action) {
        
        /**
         * Devolver un error 404 siesta desconectado 
         * de la base de datos.
         */
        if ($this->service->isConnect()) {
            header("HTTP/1.0 404 Not Found");
            return;
        }
        
    
        $this->service->beginTransaction();
        

        if (!$this->service->existAvailability($action)) {
            
            $this->service->createAvailability($action);
            $this->service->commint();
            
            $result = $this->service->getAvailability($action);
            echo json_encode($result);
            return;
        }
        
        if ($this->service->existAvailability($action)) {

            $result = $this->service->getAvailability($action);
            echo json_encode($result);
        }
    }

}
