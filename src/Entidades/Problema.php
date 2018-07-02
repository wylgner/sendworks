<?php

namespace Sendworks\Entidades;

/**
 * Description of Problema
 *
 * @author wylgner
 */
class Problema {

    private $id;
    private $titulo;
    private $entrada;
    private $saida;
    private $enunciado;
    private $id_usuario;

    function __construct($id, $titulo, $entrada, $saida, $enunciado) {
        $this->titulo = $titulo;
        $this->entrada = $entrada;
        $this->saida = $saida;
        $this->enunciado = $enunciado;
        $this->id = $id;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    
    function getTitulo() {
        return $this->titulo;
    }

    function getEntrada() {
        return $this->entrada;
    }

    function getSaida() {
        return $this->saida;
    }

    function getEnunciado() {
        return $this->enunciado;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setEntrada($entrada) {
        $this->entrada = $entrada;
    }

    function setSaida($saida) {
        $this->saida = $saida;
    }

    function setEnunciado($enunciado) {
        $this->enunciado = $enunciado;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}
