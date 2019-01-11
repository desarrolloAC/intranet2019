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

namespace Domain;

/**
 * Description of DisponivilidadRepository
 *
 * @author braya
 */
class Reservation implements \JsonSerializable {
    
    private $reservationId;
    private $isActive;
    private $created;
    private $updated;
    private $cince;
    private $until;
    private $user;
    private $isReserved;
    private $availabilityId;
    
    public function __construct() {
        
    }

    public function getReservationId() {
        return $this->reservationId;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getUpdated() {
        return $this->updated;
    }

    public function getCince() {
        return $this->cince;
    }

    public function getUntil() {
        return $this->until;
    }

    public function getUser() {
        return $this->user;
    }

    public function getIsReserved() {
        return $this->isReserved;
    }

    public function getAvailabilityId() {
        return $this->availabilityId;
    }

    public function setReservationId($reservationId) {
        $this->reservationId = $reservationId;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    public function setCreated($created) {
        $this->created = $created;
    }

    public function setUpdated($updated) {
        $this->updated = $updated;
    }

    public function setCince($cince) {
        $this->cince = $cince;
    }

    public function setUntil($until) {
        $this->until = $until;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setIsReserved($isReserved) {
        $this->isReserved = $isReserved;
    }

    public function setAvailabilityId($availabilityId) {
        $this->availabilityId = $availabilityId;
    }
    
    public function jsonSerialize() {
        return [
            'reservation_id' => $this->reservationId,
            'isactive' => $this->isActive,
            'created' => $this->created,
            'updated' => $this->updated,
            'cince' => $this->cince,
            'until' => $this->until,
            'user' => $this->user,
            'isreserved' => $this->isReserved,
            'availability_id' => $this->availabilityId
        ];
    }

}
