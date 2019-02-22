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

namespace Repository;

use Util\IConnection;
use Domain\Availability;

/**
 * Description of ReservaRepository
 *
 * @author braya
 */
class AvailabilityRepository {

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
     * Insertar un registro.
     *
     * @param Availability $entity
     */
    public function add($entity) {

        $sql = "INSERT INTO availability(availability_id, isactive, created, updated, space, days, moth, yeart) "
                . "VALUES(DEFAULT,DEFAULT,DEFAULT,DEFAULT,?,?,?,?);";

        try {
            $this->stmt = $this->contex->getConnection()->prepare($sql);
            $this->stmt->bind_param(
                    'siss',
                    $entity->getSpace(),
                    $entity->getDays(),
                    $entity->getMoth(),
                    $entity->getYeart()
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
     * @param Availability $entity
     * @return Availability
     */
    public function getByEntity($entity) {

        $sql = "SELECT * FROM availability WHERE space = ? AND days = ? AND moth = ? AND yeart = ?;";
        $col1; 
        $col2; 
        $col3; 
        $col4; 
        $col5; 
        $col6; 
        $col7; 
        $col8; 
        $result = null;

        try {
            $this->stmt = $this->contex->getConnection()->prepare($sql);
            $this->stmt->bind_param(
                'siss',
                $entity->getSpace(),
                $entity->getDays(),
                $entity->getMoth(),
                $entity->getYeart()
            );
            
            $this->stmt->execute();
            
             $this->stmt->bind_result($col1, $col2, $col3, $col4, $col5, 
                    $col6, $col7, $col8); 
 
            while ($this->stmt->fetch()) { 
                $inst = new Availability();
                $inst->setAvailabilityId($col1); 
                $inst->setIsActive($col2); 
                $inst->setCreated($col3); 
                $inst->setUpdated($col4); 
                $inst->setSpace($col5); 
                $inst->setDays($col6); 
                $inst->setMoth($col7); 
                $inst->setYeart($col8); 

                $result = $inst;
            }

        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();

        } finally {
            $this->stmt->close();
        }

        return $result;
    }

    /**
     * Obtener un registro
     *
     * @param Reservation $entity
     * @return int
     */
    public function getIDbyEntity($entity) {

        $sql = "SELECT availability_id FROM availability WHERE space = ? AND days = ? AND moth = ? AND yeart = ?;";
        $col1;
        $result = 0;

        try {
            $this->stmt = $this->contex->getConnection()->prepare($sql);
            $this->stmt->bind_param('siss',
                    $entity->getSpace(),
                    $entity->getDays(),
                    $entity->getMoth(),
                    $entity->getYeart()
            );
            $this->stmt->execute();

            $this->stmt->bind_result($col1);

            while ($this->stmt->fetch()) {
                $result = $col1;
            }
            
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->stmt->close();
            
        }

        return $result;
    }

}
