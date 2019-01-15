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

use Mailer\EMailManager;
use Util\ICommandHandler;

/**
 * Description of SendMailCommandHandler
 *
 * @author brayan
 */
class SendMailCommandHandler implements ICommandHandler {
    //"brayanmartinez827@gmail.com"
    //"reservaintranet@gmail.com",
    //"willians.vasquez@alkescorp.com",
    //"jose.birriel@alkescorp.com",
    //"Ruth.sukerman@alkescorp.com",
    //"vnunez@alkescorp.com",
    //"walquiria.urdaneta@alkescorp.com",

    /**
     * Este es el mailer.
     * @var Mail
     */
    private $mailer;
    private $key;
    private $from;
    private $to;
    private $subject;

    public function __construct() {
        $this->mailer = new EMailManager();
        $this->key = $this->generateCode();
        $this->from = "reservaintranet@gmail.com";
        $this->to = "";
        $this->subject = "Eliminar reserva";
    }

    public function handler($handler) {

        $this->to = $handler;

        $this->mailer->send(
                $this->from,
                $this->to,
                $this->subject,
                $this->generateMensager()
        );
    }

    private function generateMensager() {
        return "<h1>Codigo de comfirmacion</h1><br>" .
                "<p>Estas es una prueba para saber si  puedo enviar correos desde php Jajajajajajajaja. </p><br>" .
                "<p>Estas es la clave " . $this->key . " para eliminar </p>";
    }

    private function generateCode() {
        return substr(md5($this->getRealIP() . rand(1, 1000000)), 0, 8);
    }

    private function getRealIP() {

        if (isset($_SERVER["HTTP_CLIENT_IP"])) {

            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {

            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {

            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {

            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {

            return $_SERVER["HTTP_FORWARDED"];
        } else {

            return $_SERVER["REMOTE_ADDR"];
        }
    }

}
