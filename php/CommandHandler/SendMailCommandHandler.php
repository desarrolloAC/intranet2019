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

namespace CommandHandler;

use Mailer\Mail;
use Util\ICommandHandler;

/**
 * Description of SendMailCommandHandler
 *
 * @author brayan
 */
class SendMailCommandHandler implements ICommandHandler {
    
    /**
     * Este es el mailer.
     * @var Mail 
     */
    private $mailer;
    
    public function __construct() {
        $this->mailer = new Mail();
    }

    public function handler($handler) {
        
        $key = substr(md5($this->getRealIP(). rand(1, 1000000)), 0, 8);
        
        $html = "<h1>Codigo de comfirmacion</h1><br>".
                "<p>Estas es una prueba para saber si  puedo enviar correos desde php Jajajajajajajaja. </p><br>".
                "<p>Estas es la clave ".$key." para eliminar </p>";
        
        $this->mailer->send(
            "reservaintranet@gmail.com",
            //"willians.vasquez@alkescorp.com", 
            //"jose.birriel@alkescorp.com",
            //"Ruth.sukerman@alkescorp.com",
            //"vnunez@alkescorp.com",    
            //"brayanmartinez827@gmail.com",  
            //"walquiria.urdaneta@alkescorp.com",
            $handler,    
            "Eliminar reserva",
            $html
        );
        
    }
    
    private function getRealIP() {

        if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }
    }      

}


