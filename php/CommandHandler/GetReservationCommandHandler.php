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
                                                                    
/**
 * Description of AddAvailabilityCommandHandler
 *
 * @author braya
 */
class GetReservationCommandHandler implements ICommandHandler {
    
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
     */
    public function handler($handler) {
        
        $result = $this->service->getReservations($handler);
        echo json_encode($result);
        
    }

}
