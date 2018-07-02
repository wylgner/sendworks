<?php

namespace Sendworks\Entidades;

/**
 * Description of Resposta
 *
 * @author wylgner
 */
class Resposta {
    private $id;
    private $algoritmo;
    private $data;
    private $id_problema;
    private $id_usuario;

    function __construct() {
        
    }
    function getId_problema() {
        return $this->id_problema;
    }

    function setId_problema($id_problema) {
        $this->id_problema = $id_problema;
    }

        function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        function getAlgoritmo() {
        return $this->algoritmo;
    }

    function getData() {
        return $this->data;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setAlgoritmo($algoritmo) {
        $this->algoritmo = $algoritmo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}
