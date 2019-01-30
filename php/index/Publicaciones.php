<?php

/**
 * Description of Publicaciones
 *
 * @author brayan
 */
class Publicacion implements JsonSerializable {
    
    private $publicacionId;
    private $titulo;
    private $imagen;
    private $estatus;
    private $subcategoriaId;
    private $foto;
    private $estado;
    private $motivo;
    private $create;
    private $createBy;
    private $update;
    private $updateBy;
    private $fechaPublicacion;
    private $publicateBy;
    
    public function __construct() {
        
    }

    public function getPublicacionId() {
        return $this->publicacionId;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getEstatus() {
        return $this->estatus;
    }

    public function getSubcategoriaId() {
        return $this->subcategoriaId;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getMotivo() {
        return $this->motivo;
    }

    public function getCreate() {
        return $this->create;
    }

    public function getCreateBy() {
        return $this->createBy;
    }

    public function getUpdate() {
        return $this->update;
    }

    public function getUpdateBy() {
        return $this->updateBy;
    }

    public function getFechaPublicacion() {
        return $this->fechaPublicacion;
    }

    public function getPublicateBy() {
        return $this->publicateBy;
    }

    public function setPublicacionId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

    public function setSubcategoriaId($subcategoriaId) {
        $this->subcategoriaId = $subcategoriaId;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setMotivo($motivo) {
        $this->motivo = $motivo;
    }

    public function setCreate($create) {
        $this->create = $create;
    }

    public function setCreateBy($createBy) {
        $this->createBy = $createBy;
    }

    public function setUpdate($update) {
        $this->update = $update;
    }

    public function setUpdateBy($updateBy) {
        $this->updateBy = $updateBy;
    }

    public function setFechaPublicacion($fechaPublicacion) {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    public function setPublicateBy($publicateBy) {
        $this->publicateBy = $publicateBy;
    }

    public function jsonSerialize() {
        return [
            'publicacion_id' => $this->publicacionId,
            'titulo' => $this->titulo,
            'estatus' => $this->estatus,
            'subcategoria_id' => $this->subcategoriaId,
            'foto' => $this->foto,
            'estado' => $this->estado,
            'motivo' => $this->motivo,
            'create' => $this->create,
            'createBy' => $this->createBy,
            'update' => $this->update,
            'updateBy' => $this->updateBy,
            'F_Publicacion' => $this->fechaPublicacion,
            'PublicatedBy' => $this->publicateBy

        ];
    }

}
