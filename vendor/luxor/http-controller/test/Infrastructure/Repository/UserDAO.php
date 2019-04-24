<?php

namespace Luxor\Test\Infrastructure\Repository;

use Luxor\SQL\CRUD;
use Luxor\Test\Infrastructure\Config\Connection;


/**
 * Clase de prueva para estableser los metodos de administracion de la tabla de usuarios
 * usando el patron Data Transfer Object.
 */
class UserDAO implements CRUD {
    
    /**
     * @var Connection 
     */
    private $con;
    
    /**
     * @var IPreparedStatement
     */
    private $pre;
            
    /**
     * @var IResultSet
     */
    private $res;
    
    /**
     * Constructor
     */
    function __construct() {
        $this->con = Connection::getInstance();
    }

    /**
     * metodo para insertar
     * @param User $data
     */
    public function create($data) {
        
        $SQL_INSERT = "INSERT INTO usuario (nombre, apellido, cedula) VALUES (?, ?, ?);";
        
        try {            
            $this->con->getConnection()->prepareStatement($SQL_INSERT)
                ->setString(1, $data->getNombre())
                ->setString(2, $data->getApellido())
                ->setString(3, $data->getCedula())
                ->executeUpdate();
            
            
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->con->close();
        }

    }
    
    /**
     * metodo para actualizar
     * @param User $data
     */
    public function update($data) {

        $SQL_UPDATE = "UPDATE usuario SET nombre = ?, apellido = ?, cedula = ? WHERE usuario.id = ?;";
        
        try {
            $this->pre = $this->con->getConnection()->prepareStatement($SQL_UPDATE)
                ->setString(1, $data->getNombre())
                ->setString(2, $data->getApellido())
                ->setString(3, $data->getCedula())
                ->setInt(4, $data->getId())
                ->executeUpdate();

            
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->con->close();
        }
    }
    
    /**
     * metodo para eliminar
     * @param User $data
     */
    public function delete($data) {
        
        $SQL_DELETE = "DELETE FROM usuario WHERE usuario.id = ?;";
        
        try {
            $this->con->getConnection()->prepareStatement($SQL_DELETE)
                ->setInt(1, $data)
                ->executeUpdate();
            
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->con->close();
        }
    }
    
    /**
     * metodo para consultar uno
     * @param User $data
     */
    public function read($data) {
        
        $SQL_SELECT = "SELECT * FROM usuario WHERE usuario.id = ?;";
        
        try {
            $this->res = $this->con->getConnection()->prepareStatement($SQL_SELECT)
                ->setInt(1, $data)
                ->executeQuery()
                ->fetchAll()
                ->each(function($param) {
                    echo $param['nombre']." - ". $param['apellido']." - ". $param['cedula']."</br>";
                });

        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->con->close();
        }
    }

    /**
     * metodo para consultar todo
     * @param User $data
     */
    public function readAll() {
        
        $SQL_SELECT_ALL = "SELECT * FROM usuario;";
        
        try {
            $this->con->getConnection()->prepareStatement($SQL_SELECT_ALL)
                ->executeQuery()
                ->fetchAll()
                ->each(function($param) {
                    echo $param['nombre']." - ". $param['apellido']." - ". $param['cedula']."</br>";
                });
            
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            
        } finally {
            $this->con->close();
        }
    }

}
