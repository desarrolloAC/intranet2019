<?php

namespace index;

class Publicaciones implements \JsonSerializable {
    
    private $publicacionId;
    private $subcategoriaId;
    private $titulo;
    private $foto;
    
    public function __construct() {
        
    }

    public function getPublicacionId() {
        return $this->publicacionId;
    }

    public function getSubcategoriaId() {
        return $this->subcategoriaId;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function setSubcategoriaId($subcategoriaId) {
        $this->subcategoriaId = $subcategoriaId;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    
    
    public function jsonSerialize() {
        return [
            'publicacion_id' => $this->publicacionId,
            'subcategoria_id' => $this->subcategoriaId,
            'titulo' => $this->titulo,
            'foto' => $this->foto
        ];
    }

}
