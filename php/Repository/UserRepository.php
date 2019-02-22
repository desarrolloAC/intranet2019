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
use Domain\User;

/**
 * Description of UserRepository
 *
 * @author brayan
 */
class UserRepository {
    
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
     * Obtener un registro
     * 
     * @param Availability $entity
     * @return Availability
     */
    public function getUserByCorreo($correo) {
        
        $sql = "SELECT PNombre,SNombre,PApellido,SApellido,Correo FROM `usuario` WHERE Correo = ?;";
        $col1;$col2;$col3;$col4;$col5;
        $result = null;
        
        try {
            $this->stmt = $this->contex->getConnection()->prepare($sql);
            $this->stmt->bind_param(
                's', 
                $correo
            );
            
            $this->stmt->execute();

            $this->stmt->bind_result($col1,$col2,$col3,$col4,$col5);
            
            while ($this->stmt->fetch()) {
                $inst = new User();
                $inst->setPNombre($col1);
                $inst->setSNombre($col2);
                $inst->setPApellido($col3);
                $inst->setSApellido($col4);
                $inst->setCorreo($col5);
                
                $result = $inst;
            }
            
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->stmt->close();
            
        }

        return $result;
    }
}
