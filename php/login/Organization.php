<?php

class Organization implements JsonSerializable {

    private $key;
    private $name;

    public function __construct() {

    }

    public function getKey() {
        return $this->key;
    }

    public function getName() {
        return $this->name;
    }

    public function setKey($key) {
        $this->key = $key;
    }

    public function setName($neme) {
        $this->name = $neme;
    }

    public function jsonSerialize() {
        return [
            'key' => $this->key,
            'name' => $this->name
        ];
    }

}

?>
