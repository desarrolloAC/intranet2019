<?php

/**
 * Description of Publicaciones
 *
 * @author brayan
 */
class Publicaciones implements JsonSerializable {
    
    private $publicacionId;
    private $titulo;
    private $imagen;
    


    public function jsonSerialize() {
        return [
            'publicacion_id' => $this->publicacionId,
            'titulo' => $this->titulo,
            'imagen' => $this->imagen
        ];
    }

}
