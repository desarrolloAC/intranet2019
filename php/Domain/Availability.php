<?php

namespace Domain;

class Availability implements \JsonSerializable {
    
    private $availabilityId;
    private $isActive;
    private $created;
    private $updated;
    private $space;
    private $days;
    private $moth;
    private $yeart;
            
    function __construct() {
        
    }
    
    public function getAvailabilityId() {
        return $this->availabilityId;
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

    public function getSpace() {
        return $this->space;
    }

    public function getDays() {
        return $this->days;
    }

    public function getMoth() {
        return $this->moth;
    }

    public function getYeart() {
        return $this->yeart;
    }

    public function setAvailabilityId($availabilityId) {
        $this->availabilityId = $availabilityId;
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

    public function setSpace($space) {
        $this->space = $space;
    }

    public function setDays($days) {
        $this->days = $days;
    }

    public function setMoth($moth) {
        $this->moth = $moth;
    }

    public function setYeart($yeart) {
        $this->yeart = $yeart;
    }
    
    public function jsonSerialize() {
        return [
            'availability_id' => $this->availabilityId,
            'isactive' => $this->isActive,
            'created' => $this->created,
            'updated' => $this->updated,
            'space' => $this->space,
            'days' => $this->days,
            'moth' => $this->moth,
            'yeart' => $this->yeart
        ];
    }
    
}

