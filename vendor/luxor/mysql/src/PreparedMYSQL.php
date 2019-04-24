<?php

/*
 * Copyright 2017 Ing Brayan Martinez.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Luxor\MYSQL;

use Luxor\SQL\ListParam;
use Luxor\SQL\IPreparedStatement;
use Luxor\SQL\IResultSet;
use Luxor\MYSQL\ResultSetMYSQL;


/**
 * La clase PreparedMYSQL sirve para manejar los string de codigo <b>SQL</b> a ejecutar.
 * @link http://php.net/manual/es/ documentacion.
 * @link http://github.con/Ing-Brayan-Martinez perfil del autor.
 * @author Ing Brayan Martinez.
 * @version PreparedMYSQL 1.0
 */
class PreparedMYSQL implements IPreparedStatement {
    
    /**
     * @var mysqli
     */
    private $conect;
    
    /**
     * @var string
     */
    private $sql;
    
    /**
     * @var ListParam
     */
    private $list;
    
    /**
     * @var int
     */
    private $cima;
    
    /**
     * @var int
     */
    private $int;
    
    /**
     * @var string
     */
    private $generate;


    
    /**
     * Inisializacion de los atributos de la clase <b>PreparedStatement</b>.
     * @param mysqli $conexion resive un objeto de typo mysqli que representa la conexion a la base de datos.
     * @param string $sql resibe un string con una sentencia SQL.
     */
    public function __construct(\mysqli &$conect, string $sql) {
        $this->conect =& $conect;
        $this->sql    = strlen($sql) > 0 && is_string($sql) ? $sql : null;
   
        $this->cima   = 0;
        $this->int    = 0;
        $this->generate = "";
        
        $this->list   = new ListParam();
    }

    /**
     * @deprecated since metodo en construccion 1.0
     * @param type $index
     * @param array $data
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setArray($index, array $data): IPreparedStatement {
        
    }
    
    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param boolean $data resive un valor booleano <b>true</b> o <b>false</b> para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setBoolean($index, bool $data): IPreparedStatement {
        
        if ($data == 'SI' ||$data == 'Si' || $data == 'si' || $data == true || $data == 1) {
            
            $this->list->push("'".true."'");

            if ($index > $this->cima) {
                $this->cima = $index;
            }
            
        } elseif ($data == 'NO' || $data == 'No' || $data == 'no' || $data == false || $data == 0) {
            
            $this->list->push("'".false."'");

            if ($index > $this->cima) {
                $this->cima = $index;
            }
        }
        return $this;
    }

    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param Date $data resive un objeto de tipo Date que representa una fecha y asi poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setDate($index, $data): IPreparedStatement {
        
        $this->list->push("'".$data."'");

        if ($index > $this->cima) {
            $this->cima = $index;
        }
        return $this;
    }

    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param float $data resive un numero decimal para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setFloat($index, float $data): IPreparedStatement {
        $this->list->push($data);
        
        if ($index > $this->cima) {
            $this->cima = $index;
        }
        return $this;
    }
    
    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param int $data resive un numero entero para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setInt($index, int $data): IPreparedStatement {
        $this->list->push($data);
        
        if ($index > $this->cima) {
            $this->cima = $index;
        }
        return $this;
    }
    
    /**
     * Almacena el valor a sustituir.
     * @param int $index recibe un numero entero que representa la posicion a sustituir.
     * @param string $data resive una cadena para poder sustituir.
     * @return IPreparedStatement Se retorna un objeto de tipo <b>IPreparedStatement</b> para encadenar metodos.
     */
    public function setString($index, string $data): IPreparedStatement {
        
        if (strlen($data) > 0 && is_string($data)) {
            $this->list->push("'".$data."'");
        } else {
            $this->list->push("''");
        }

        if ($index > $this->cima) {
            $this->cima = $index;
        }
        return $this;
    }
    
    /**
     * Obtiene la cedena construida con la sentencia <b>SQL</b>.
     * @return string retorna la sentencia <b>SQL</b> generada.
     */
    public function getSQLGenerated(): string {
        return $this->generate;
    }

    /**
     * Permite haser una escritura de los datos.
     * @return boolean retorna un true si es todo correcto y false en caso de errores.
     */
    public function executeUpdate(): bool {
        $temp = false;
        
        if ($this->build()) {
            $this->conect->query($this->generate);
            $this->generate = "";
            $temp = true;
        }
        return $temp;           
    }  
    
    /**
     * Construlle y ejecuta la sentencia <b>SQL</b> retorna un resultado de la consulta.
     * @return boolean retorna un objeto de typo mixed si es todo correcto y null en caso de errores.
     */
    public function executeQuery(): IResultSet {
        $temp = null;
        
        if (!$this->build()) {
            throw new \Exception('Error no se pudo construir la sentencia sql');
        }
        
        $temp = $this->conect->query($this->generate);
        $this->generate = "";
        
        if ($temp == null) {
            throw new \Exception('Error no se pudo encontrar nada en la base de datos');
        }
       
        return new ResultSetMYSQL($temp);
    }
    
    
    /**
     * Metodo privado que construlle la sentencia <b>SQL</b>.
     * @return boolean retorna <b>true</b> si es todo correcto y <b>false</b> en caso de errores.
     */
    private final function build() {
        $temp = false;
        $str  = "";
        $tok  = explode("?", $this->sql);        

        try {
            //saber si la longitud de paramtros ? si son mayores que cero.
            $this->int = count($tok)-1 > 0 ? count($tok)-1 : 0;
               
            //saber si la longitud de interrogantes es igual a la longitud de parametros.
            if ($this->cima <= $this->int && $this->cima >= 0 && $this->list->lenght() <= $this->int) {

                //reemplasar interrogantes por parametros.
                for ($i = 0; $i <= $this->cima; $i++) {
                    $str = $str.$tok[$i].$this->list->shift().' ';
                }

                //saber si el remplaso fue exitoso.
                if (strlen($str) > 0) {
                    $this->generate  = $str;
                    $temp = true;
                }

            } else {
                die('Error longitud no admitida. ');
            }
            
        } catch (\Exception $exc) {
            $temp = false;
            
        } finally {
            return $temp;
            
        }
    }

}

