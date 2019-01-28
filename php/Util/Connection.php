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

namespace Util;

use Util\IConnection;

/**
 * Description of DisponivilidadRepository
 *
 * @author braya
 */
class Connection implements IConnection {

    private static $instance = null;
    private $connection = null;
    private $host = '192.168.30.90';
    private $port = '3306';
    private $user = 'root';
    private $password = '12345678';
    private $database = 'intranet';

    /**
     * Construstor de esta clase.
     *
     */
    private function __construct() {

        try {
            if (!$this->connection = new \mysqli($this->host, $this->user, $this->password, '', $this->port)) {
                throw new \Exception('Error en la conexion a la base de datos: ' . $this->user . '@' . $this->host . '<br>');
                return;
            }
            if (!$this->connection->select_db($this->database)) {
                throw new \Exception('Error no se encuentra la base de datos: ' . $this->database . '<br>');
                return;
            }

            $this->connection->set_charset("utf8");
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        } finally {

        }
    }

    /**
     * Metodo de factoria que inicializa el objeto.
     *
     * @return Connection retorna la instancia.
     */
    public static function getInstance() {

        if (self::$instance == null) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    /**
     * Devuelve la conexion.
     *
     * @return mysqli objeto de conexion.
     */
    public function getConnection() {
        return $this->connection;
    }

    /**
     * Verifica si esta conectado.
     *
     * @return bool Devuelbe un true si esta todo correcto, o un false en
     * caso de que este cerrada la conexion.
     */
    public function isConnected() {
        return $this->connection->ping();
    }

    /**
     * Cierra la conexion.
     */
    public function close() {
        $this->connection = null;
    }

}
