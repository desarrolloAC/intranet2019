<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Publicaciones
 *
 * @author brayan
 */
class Publicaciones implements JsonSerializable {

    private $titulo;
    private $status;
    private $subCategoriaId;
    private $foto;
    private $estado;
    private $motivo;
    private $created;
    private $createdBy;
    private $updated;
    private $updatedBy;
    private $F_Publicacion;
    private $PublicatedBy;

    public function __construct() {
        
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getSubCategoriaId() {
        return $this->subCategoriaId;
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

    public function getCreated() {
        return $this->created;
    }

    public function getCreatedBy() {
        return $this->createdBy;
    }

    public function getUpdated() {
        return $this->updated;
    }

    public function getUpdatedBy() {
        return $this->updatedBy;
    }

    public function getF_Publicacion() {
        return $this->F_Publicacion;
    }

    public function getPublicatedBy() {
        return $this->PublicatedBy;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setSubCategoriaId($subCategoriaId) {
        $this->subCategoriaId = $subCategoriaId;
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

    public function setCreated($created) {
        $this->created = $created;
    }

    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    public function setUpdated($updated) {
        $this->updated = $updated;
    }

    public function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;
    }

    public function setF_Publicacion($F_Publicacion) {
        $this->F_Publicacion = $F_Publicacion;
    }

    public function setPublicatedBy($PublicatedBy) {
        $this->PublicatedBy = $PublicatedBy;
    }

    public function jsonSerialize() {
        return [
            'titulo' => $this->titulo,
            'status' => $this->status,
            ''
        ];
    }

}
