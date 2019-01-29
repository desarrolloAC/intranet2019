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

namespace Repository;

use Util\IConnection;
use Domain\Reservation;

/**
 * Description of DisponivilidadRepository
 *
 * @author braya
 */
class ReservationRepository {
    
    /**
     * Conexion con la base de datos mysql:
     * 
     * @var IConnection 
     */
    private $contex;
    
    /**
     * Resultado de la consulta.
     * 
     * @var \mysqli_stmt 
     */
    private $stmt;
    
    /**
     * Constructor de esta clase.
     * 
     * @param IConnection $contex conexion 
     * con la base de datos.
     */
    function __construct(&$contex) {
        $this->contex = $contex;
    }

    /**
     * Actulizar un registro.
     * 
     * @param Reservation $entity
     */
    public function update($entity) {
        
        $sql = "UPDATE reservation SET isreserved = ?, user = ?  WHERE availability_id = ? AND reservation_id = ?;";

        try {        
            $this->stmt = $this->contex->getConnection()->prepare($sql);
            $this->stmt->bind_param(
                'ssii', 
                $entity->getIsReserved(), 
                $entity->getUser(),
                $entity->getAvailabilityId(),
                $entity->getReservationId()
            );
            
            $this->stmt->execute();
        
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->stmt->close();
            
        }
    }

    /**
     * Obtener un registro
     * 
     * @param int $id
     * @return Reservation
     */
    public function getByID($id) {
        
        $sql = "SELECT * FROM reservation WHERE availability_id = ?;";
        $col1;$col2;$col3;$col4;$col5;$col6;$col7;$col8;$col9;
 
        $result = array();
        
        try {
            $this->stmt = $this->contex->getConnection()->prepare($sql);
            $this->stmt->bind_param('i', $id);
            $this->stmt->execute();
            
             $this->stmt->bind_result($col1,$col2,$col3,$col4,$col5,
                    $col6,$col7,$col8,$col9);
 
            while ($this->stmt->fetch()) {
                $inst = new Reservation();
                $inst->setReservationId($col1); 
                $inst->setIsActive($col2);
                $inst->setCreated($col3);
                $inst->setUpdated($col4);
                $inst->setCince($col5);
                $inst->setUntil($col6);
                $inst->setUser($col7);
                $inst->setIsReserved($col8);
                $inst->setAvailabilityId($col9);
 
                array_push($result, $inst);
            }
        
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->stmt->close();
            
        }

        return $result;
    }

    


}
