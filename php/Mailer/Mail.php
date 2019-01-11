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

namespace Mailer;

use PHPMailer\PHPMailer\PHPMailer;
use Mailer\Correo;

/**
 * Description of Mail
 *
 * @author brayan
 */
class Mail {
    
    const SMTP_DEBUG = 0;
    const SMTP_AUTH = true;
    
    const HOST = "smtp.gmail.com";
    const PORT = 587;
    
    const USERNAME = "reservaintranet@gmail.com";
    const PASSWORD = 'intranet2018';
    

    private $mail;
    
    public function __construct() {
        
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = self::HOST;
        $this->mail->Port = self::PORT;
        $this->mail->SMTPDebug = self::SMTP_DEBUG;
        $this->mail->SMTPAuth = self::SMTP_AUTH;
        $this->mail->Username = self::USERNAME;
        $this->mail->Password = self::PASSWORD;        
        $this->mail->CharSet = PHPMailer::CHARSET_UTF8;
        
    }

    /**
     * enviar un correo.
     * 
     * @param string $from
     * @param string $to
     * @param string $subject
     * @param string $messager
     */
    public function send($from, $to, $subject, $messager) {
        
        $this->mail->setFrom($from);
        $this->mail->addAddress($to);
        $this->mail->Subject = $subject;
        $this->mail->msgHTML($messager);
        
        if (!$this->mail->send()) {
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            
        } else {
            echo 'Message sent!';
            
        }
    }
    
    /**
     * enviar un correo.
     * 
     * @param Correo $correo
     */
    public function sendEmail($correo) {
        
        $this->mail->setFrom($correo->getFrom());
        $this->mail->addAddress($correo->getTo());
        $this->mail->Subject = $correo->getSubject();
        $this->mail->msgHTML($correo->getMessager());
        
        if (!$this->mail->send()) {
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            
        } else {
            echo 'Message sent!';
            
        }
    }
}

