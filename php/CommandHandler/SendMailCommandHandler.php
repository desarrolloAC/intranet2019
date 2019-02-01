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
        $this->subject = "Eliminar reserva de salas";
    }

    public function handler($handler) {

        $this->to = $handler;

        $this->mailer->send(
            $this->from,
            $this->to,
            $this->subject,
            $this->generateMensager()
        );

        echo $this->key;
    }

    private function generateMensager() {

        return '<div style="width: 100%; margin: 0px; padding: 0px;">

                    <div style="width: 101%; height: 550px; position: relative; top: -22px; left: -8px;">
                        <center>
                            <img style="width: 400px; height: 500px; position: relative; top: 20px;" src="http://172.20.7.36/intranet/assets/image/reserva/LOGO%20INTRANET%20NARANJA-01.png" alt="Alkes Corp"/>
                        </center>
                    </div>

                    <div style="width: 101%; height: 250px; position: relative; top: -44px; left: -8px; display: flex; justify-content: center;">

                        <div style="width: 40%;">
                           <center>
                               <p>Estimado usuario el siguiente codigo es para cancelar la reserva de sala:</p>
                               <h1>'. $this->key .'</h1>
                           </center>
                        </div>

                    </div>

                    <div style="width: 101%; height: 100px; background-color: rgb(241, 129, 3); position: relative; top: -66px; left: -8px;">
                    </div>

                </div>';
    }

    private function generateCode() {
        return substr(md5($this->getRealIP() . rand(1, 1000000)), 0, 6);
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
